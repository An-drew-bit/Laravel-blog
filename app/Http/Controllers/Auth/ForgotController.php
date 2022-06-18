<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotRequest;
use App\Jobs\ForgotUserEmailJob;
use App\Models\User;

class ForgotController extends Controller
{
    public function showForgotForm()
    {
        return view('auth.forgot');
    }

    public function forgot(ForgotRequest $request)
    {
        $user = User::where(['email' => $request->get('email')])->firstOrFail();

        $password = uniqid();

        $user->password = bcrypt($password);
        $user->update();

        dispatch(new ForgotUserEmailJob($user, $password));

        return redirect(route('login.create'))->with('message', 'Вам на почту отправлено письмо');
    }
}
