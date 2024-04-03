<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelHasRoles;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\AssignOp\Mod;
use Validator;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at' , 'desc')->get();
        return view('admin.users.index',[
            'users' => $users,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $role_id = ModelHasRoles::where('model_id',$user->id)->get();
        $curennt_role = Role::where('id',$role_id[0]->role_id)->get();
        $rolesArray = Role::query()->get();

        return view('admin.users.edit' , [
            'user' => $user,
            'curennt_role' => $curennt_role[0],
            'all_roles' => $rolesArray
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|string',
            'new_password' => 'nullable|string|max:30|min:8',
            'email' => 'required|email',
            'file' => 'nullable|image',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where(['id' => $request->id])->first();

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if($request->file('file') !== null){
            $path = $request->file('file')->store('images' , 'public');
            if ($user->logo_path !== null) {
                Storage::disk('public')->delete($user->logo_path);
            }
            $user->logo_path = $path;
            $user->save();
        }

        if ($request->new_password !== null) {
            $user->password = password_hash($request->new_password , PASSWORD_BCRYPT);
        }

        if ($request->role_id !== null) {
            DB::update(
                'update model_has_roles set role_id = ' . $request->role_id . ' where model_id = ' . $request->id
            );
        }
        $user->save();
        return redirect()->back()->with('success','Данные пользователя были обновлены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if($user->id !== 1) {
            $user->delete();
        }

        return redirect()->back()->with('success','Пользователь успешно удален');
    }
}
