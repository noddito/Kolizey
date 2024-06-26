<?php
declare(strict_types=1);

namespace App\Http\Controllers\AdminSide;

use App\Http\Controllers\Controller;
use App\Models\ModelHasRoles;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(): View
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.users.index', [
                'users' => $users,
                'projects' => $projects
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $rolesArray = Role::query()->get();
        return view('admin.users.create', [
            'all_roles' => $rolesArray
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'name' => 'required|string',
            'new_password' => 'nullable|string|max:30|min:8',
            'email' => 'required|email',
            'phone' => 'nullable|numeric|size:11',
            'site_url' => 'string|nullable',
            'description' => 'string|nullable',
            'file' => 'nullable|image',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();

        $user->name = $request->input('name');

        $user->email = $request->input('email');

        $user->savePhotos($request, $user , '/user_logos');

        if ($request->password !== null) {
            $user->password = password_hash($request->new_password, PASSWORD_BCRYPT);
        }

        $user->save();

        if ($request->role_id !== null) {
            DB::update(
                'update model_has_roles set role_id = ' . $request->role_id . ' where model_id = ' . $user->id
            );
        } else {
            $user_role = new ModelHasRoles();
            $user_role->role_id = 2; // 2 - customer_role_id
            $user_role->model_id = $user->id;
            $user_role->model_type = 'App\Models\User';
            $user_role->save();
        }

        return redirect()
            ->route('users.index')
            ->with('success', 'Пользователь успешно создан');
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
    public function edit(User $user): View
    {
        $role_id = ModelHasRoles::where('model_id', $user->id)->get();
        $curennt_role = Role::where('id', $role_id[0]->role_id)->get();
        $rolesArray = Role::query()->get();

        return view('admin.users.edit', [
            'user' => $user,
            'curennt_role' => $curennt_role[0],
            'all_roles' => $rolesArray
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $rules = [
            'name' => 'required|string',
            'new_password' => 'nullable|string|max:30|min:8',
            'email' => 'required|email',
            'phone' => 'nullable|numeric|size:11',
            'site_url' => 'string|nullable',
            'description' => 'string|nullable',
            'file' => 'nullable|image',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where(['id' => $request->id])->first();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->site_url = $request->input('site_url');
        $user->description = $request->input('description');
        $user->savePhotos($request, $user , '/user_logos');

        if ($request->new_password !== null) {
            $user->password = password_hash($request->new_password, PASSWORD_BCRYPT);
        }

        if ($request->role_id !== null) {
            DB::update(
                'update model_has_roles set role_id = ' . $request->role_id . ' where model_id = ' . $request->id
            );
        }
        $user->save();

        return redirect()
            ->route('users.index')
            ->with('success', 'Данные пользователя были обновлены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        if ($user->id !== 1) {
            $user->delete();
        }

        return redirect()
            ->route('users.index')
            ->with('success', 'Пользователь успешно удален');
    }
}
