<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Jobs\SubscribeEmailJob;
use App\Models\User;
use App\Queries\PostBuilder;

class HomeController extends Controller
{
    public function index(PostBuilder $builder)
    {
        return view('home', [
            'posts' => $builder->getPostAllWithRelation()
        ]);
    }

    public function subscribe(User $user, SubscribeRequest $request)
    {
        $user = $user->where(['email' => $request->get('email')])->firstOrFail();
        $formData = 'Вы успешно подписались на рассылку';

        dispatch(new SubscribeEmailJob($user, $formData));

        return back()->with('success', 'Вы успешно пoдписались на рассылку');
    }
}
