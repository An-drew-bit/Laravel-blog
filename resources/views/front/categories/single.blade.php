@extends('front.layouts.layout')

@section('title', 'Wordsmith :: Categories')

@section('content')
    <section class="s-content s-content--top-padding">

        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                <h1 class="display-1 display-1--with-line-sep">Category: {{ $category->title }}</h1>
                <p class="lead">Dolor similique vitae. Exercitationem quidem occaecati iusto. Id non vitae enim quas error dolor maiores ut. Exercitationem earum ut repudiandae optio veritatis animi nulla qui dolores.</p>
            </div>
        </div>

        <div class="row entries-wrap add-top-padding wide">
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
                                    <a href="{{ route('categories.single', ['slug' => $category->slug]) }}">{{ $category->title }}</a>
                                </div>

                                <h1 class="item-entry__title"><a href="single-standard.html">{!! $post->desc !!}</a></h1>

                                <div class="item-entry__date">
                                    <a href="single-standard.html">
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
