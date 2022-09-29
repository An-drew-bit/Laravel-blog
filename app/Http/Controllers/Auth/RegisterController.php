<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class RegisterController extends Controller
{
    public function showRegisterForm(): Application|Factory|View
    {
        return view('auth.create');
    }

    public function createUser(RegisterRequest $request): Application|RedirectResponse|Redirector
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($user) {
            event(new Registered($user));

            auth()->login($user);

            return redirect(route('verification.notice'));
        }

        session()->flash('success', 'Вы успешно зарегистрировались');

        return redirect()->home();
    }
}
