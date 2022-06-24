<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFromRequest;
use App\Jobs\ContactFormJob;
use App\Models\User;

class ContactController extends Controller
{
    public function index()
    {
        return view('front.contact');
    }

    public function contactForm(ContactFromRequest $request, User $user)
    {
        $user = $user->where(['email' => $request->get('email')])->firstOrFail();
        $formData = 'Мы получили от вас письмо и обязательно с вами свяжемся';

        dispatch(new ContactFormJob($user, $formData));

        return back();
    }
}
