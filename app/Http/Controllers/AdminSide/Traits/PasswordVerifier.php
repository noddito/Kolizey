<?php
declare(strict_types=1);

namespace App\Http\Controllers\AdminSide\Traits;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

trait PasswordVerifier
{
    public function verifyPassword(Request $request , User $user): RedirectResponse
    {
        if (password_verify($request->old_password, $user->password) === false) {
            return redirect()->back()->withErrors(['error' => 'Введен не правильный текущий пароль']);
        }

        if (password_verify($request->old_password, $user->password) === true && $request->new_password !== null) {
            $user->password = password_hash($request->new_password, PASSWORD_BCRYPT);
            $user->savePhotos($request, $user , '/user_logos');
            $user->save();
            return redirect()->back()->with('success', 'Данные пользователя были обновлены');
        }
        return redirect()->back();
    }
}
