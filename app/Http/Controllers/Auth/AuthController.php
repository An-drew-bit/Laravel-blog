<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(AuthRequest $request)
    {
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            session()->flash('success', 'Вы успешно вошли');

            if (auth()->user()->is_admin) {
                return redirect()->route('admin.index');

            } else {
                return redirect()->home();
            }
        }

        return redirect()->back()->with('error', 'Не привильно введен Логин или Пароль');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login.create');
    }
}
