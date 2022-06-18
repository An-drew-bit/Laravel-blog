<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\{AuthRequest, RegisterRequest};
use App\Models\User;

class UserController extends Controller
{
    public function showRegisterForm()
    {
        return view('user.create');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($user) {
            //event(new Registered($user));

            auth()->login($user);

            //return to_route('verification.notice');
        }
        session()->flash('success', 'Вы успешно зарегистрировались');

        return redirect()->home();
    }

    public function showLoginForm()
    {
        return view('user.login');
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
