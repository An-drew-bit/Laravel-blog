<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function showLoginForm(): Application|Factory|View
    {
        return view('auth.login');
    }

    public function login(AuthRequest $request): RedirectResponse
    {
        $attempt = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($attempt) {
            session()->flash('success', 'Вы успешно вошли');

            if (auth()->user()->is_admin) {
                return redirect()->route('admin.index');

            } else {
                return redirect()->home();
            }
        }

        return redirect()->back()->with('error', 'Не привильно введен Логин или Пароль');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('login.create');
    }
}
