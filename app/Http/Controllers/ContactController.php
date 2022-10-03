<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFromRequest;
use App\Jobs\ContactFormJob;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function index(): Application|Factory|View
    {
        return view('front.contact');
    }

    public function contactForm(ContactFromRequest $request, User $user): RedirectResponse
    {
        $user = $user->where(['email' => $request->get('email')])->firstOrFail();
        $formData = 'Мы получили от вас письмо и обязательно с вами свяжемся';

        dispatch(new ContactFormJob($user, $formData));

        return back();
    }
}
