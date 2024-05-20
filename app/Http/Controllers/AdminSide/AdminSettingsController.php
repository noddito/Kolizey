<?php
declare(strict_types=1);

namespace App\Http\Controllers\AdminSide;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AdminSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index(): View
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
    public function update(Request $request, User $user): RedirectResponse
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
        $user->verifyPassword($request, $user);
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
