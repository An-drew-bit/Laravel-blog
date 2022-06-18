<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.create');
    }

    public function createUser(RegisterRequest $request)
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
}
