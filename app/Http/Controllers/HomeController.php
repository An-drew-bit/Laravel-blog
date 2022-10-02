<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Jobs\SubscribeEmailJob;
use App\Models\User;
use App\Queries\PostBuilder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    public function index(PostBuilder $builder): Application|Factory|View
    {
        return view('home', [
            'posts' => $builder->getPostAllWithRelation()
        ]);
    }

    public function subscribe(User $user, SubscribeRequest $request): RedirectResponse
    {
        $user = $user->where(['email' => $request->get('email')])->firstOrFail();
        $formData = 'Вы успешно подписались на рассылку';

        dispatch(new SubscribeEmailJob($user, $formData));

        return back()->with('success', 'Вы успешно пoдписались на рассылку');
    }
}
