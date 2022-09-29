<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Routing\Redirector;

class VerificationController extends Controller
{
    public function getVerifyForm(): Application|Factory|View
    {
        return view('auth.verify-email');
    }

    public function verifycationRequest(EmailVerificationRequest $request): Application|RedirectResponse|Redirector
    {
        $request->fulfill();

        return redirect(route('home'));
    }

    public function repeatSendToMail(Request $request): RedirectResponse
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Письмо отправлено повторно');
    }
}
