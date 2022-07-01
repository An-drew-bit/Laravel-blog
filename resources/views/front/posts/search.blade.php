@extends('front.layouts.layout')

@section('title', 'Wordsmith :: Search')

@section('content')
    <section class="s-content s-content--top-padding">

        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                <h1 class="display-1 display-1--with-line-sep">Search: {{ $s }}</h1>
            </div>
        </div>

        <div class="row entries-wrap add-top-padding wide">
            <div class="entries">
                @if($posts->count())
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

                                    <h1 class="item-entry__title"><a href="{{ route('front.posts.index') }}">{!! $post->desc !!}</a></h1>

                                    <div class="item-entry__date">
                                        <a href="{{ route('front.posts.index') }}">
                                            {{ $post->getPostDate() }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </article>
                    @endforeach
                @else
                    <p class="lead" style="margin: 0 auto">По вашему запросу ничего не найдено</p>
                @endif
            </div>
        </div>

        <div class="row pagination-wrap">
            <div class="col-full">
                {{ $posts->appends(['s' => request()->s])->links('vendor.pagination.paginate') }}
            </div>
        </div>

    </section>
@endsection
