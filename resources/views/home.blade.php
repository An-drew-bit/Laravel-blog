@extends('front.layouts.layout')

@section('title', 'Wordsmith :: Home')

@section('content')
    <section class="s-featured">
        <div class="row">
            <div class="col-full">

                <div class="featured-slider featured" data-aos="zoom-in">

                    <div class="featured__slide">
                        <div class="entry">

                            <div class="entry__background" style="background-image:url('{{ asset('assets/front/images/thumbs/featured/featured-guitarman.jpg') }}');"></div>

                            <div class="entry__content">
                                <span class="entry__category"><a href="#">Music</a></span>

                                <h1><a href="#0" title="">What Your Music Preference Says About You and Your Personality.</a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="{{ asset('assets/front/images/avatars/user-05.jpg') }}" alt="">
                                    </a>
                                    <ul class="entry__meta">
                                        <li><a href="#">Jonathan Smith</a></li>
                                        <li>June 02, 2018</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="featured__slide">

                        <div class="entry">

                            <div class="entry__background" style="background-image:url('{{ asset('assets/front/images/thumbs/featured/featured-watch.jpg') }}');"></div>

                            <div class="entry__content">
                                <span class="entry__category"><a href="#0">Management</a></span>

                                <h1><a href="#0" title="">The Pomodoro Technique Really Works.</a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="{{ asset('assets/front/images/avatars/user-03.jpg') }}" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li><a href="#">John Doe</a></li>
                                        <li>June 13, 2018</li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="featured__slide">

                        <div class="entry">

                            <div class="entry__background" style="background-image:url('{{ asset('assets/front/images/thumbs/featured/featured-beetle.jpg') }}');"></div>

                            <div class="entry__content">
                                <span class="entry__category"><a href="#0">LifeStyle</a></span>

                                <h1><a href="#" title="">The difference between Classics, Vintage & Antique Cars.</a></h1>

                                <div class="entry__info">
                                    <a href="#" class="entry__profile-pic">
                                        <img class="avatar" src="{{ asset('assets/front/images/avatars/user-03.jpg') }}" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li><a href="#">John Doe</a></li>
                                        <li>June 12, 2018</li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="s-content">

        <div class="row entries-wrap wide">
            <div class="entries">
                @foreach($posts as $post)
                    <article class="col-block">

                        <div class="item-entry" data-aos="zoom-in">
                            <div class="item-entry__thumb">
                                <a href="{{ route('posts.single', ['slug' => $post->slug]) }}" class="item-entry__thumb-link">
                                    <img src="{{ asset("uploads/{$post->thumbnail}") }}"
                                         srcset="{{ asset("uploads/{$post->thumbnail_400}") }} 1x, {{ asset("uploads/{$post->thumbnail}") }} 2x" alt="">
                                </a>
                            </div>

                            <div class="item-entry__text">
                                <div class="item-entry__cat">
                                    <a href="{{ route('categories.single', ['slug' => $post->category->slug]) }}">{{ $post->category->title }}</a>
                                </div>

                                <h1 class="item-entry__title"><a href="#">{!! $post->desc !!}</a></h1>

                                <div class="item-entry__date">
                                    <a href="#">
                                        {{ $post->getPostDate() }}
                                    </a>
                                </div>
                            </div>
                        </div>

                    </article>
                @endforeach
            </div>
        </div>

        <div class="row pagination-wrap">
            <div class="col-full">
                {{ $posts->links('vendor.pagination.paginate') }}
            </div>
        </div>

    </section>
@endsection
