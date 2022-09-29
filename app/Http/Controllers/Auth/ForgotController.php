<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotRequest;
use App\Jobs\ForgotUserEmailJob;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class ForgotController extends Controller
{
    public function showForgotForm(): Application|Factory|View
    {
        return view('auth.forgot');
    }

    public function forgot(ForgotRequest $request): Application|RedirectResponse|Redirector
    {
        $user = User::where(['email' => $request->get('email')])->firstOrFail();

        $password = uniqid();

        $user->password = bcrypt($password);
        $user->update();

        dispatch(new ForgotUserEmailJob($user, $password));

        return redirect(route('login.create'))->with('message', 'Вам на почту отправлено письмо');
    }
}
