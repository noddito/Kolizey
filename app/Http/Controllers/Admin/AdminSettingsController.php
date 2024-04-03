<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Termwind\Components\Dd;
use Validator;

class AdminSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index ()
    {
        return view('admin.settings');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|string',
            'old_password' => 'required|string|max:30|min:8',
            'new_password' => 'nullable|string|max:30|min:8',
            'email' => 'required|email',
            'file' => 'nullable|image',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $user = User::where(['id' => Auth::user()->id])->first();
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
        if(password_verify( $request->old_password , $user->password ) === false)
        {
            return redirect()->back()->withErrors(['error' => 'Введен не правильный текущий пароль']);
        }
        if(password_verify( $request->old_password , $user->password ) === true && $request->new_password !== null){
            $user->password = password_hash($request->new_password , PASSWORD_BCRYPT);
            $user->save();
            return redirect()->back()->with('success','Данные пользователя были обновлены');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
