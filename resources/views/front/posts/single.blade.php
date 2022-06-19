@extends('front.layouts.layout')

@section('title', 'Wordsmith :: Article')

@section('content')
    <section class="s-content s-content--top-padding s-content--narrow">

        <article class="row entry format-standard">

            <div class="entry__media col-full">
                <div class="entry__post-thumb">
                    <img src="{{ asset('assets/front/images/thumbs/single/standard/standard-1000.jpg') }}"
                         srcset="{{ asset('assets/front/images/thumbs/single/standard/standard-2000.jpg') }} 2000w,
                                 {{ asset('assets/front/images/thumbs/single/standard/standard-1000.jpg') }} 1000w,
                                 {{ asset('assets/front/images/thumbs/single/standard/standard-500.jpg') }} 500w"
                         sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                </div>
            </div>

            <div class="entry__header col-full">
                <h1 class="entry__header-title display-1">
                    {{ $post->title }}
                </h1>
                <ul class="entry__header-meta">
                    <li class="date">{{ $post->getPostDate() }}</li>
                    <li class="byline">
                        By
                        <a href="#0">{{ $post->users->name }}</a>
                    </li>
                </ul>
            </div>

            <div class="col-full entry__main">

                <p class="lead drop-cap">Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat
                    dolor sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit id fugiat enim
                    mollit amet anim veniam dolor dolor irure velit commodo cillum sit nulla ullamco magna amet magna
                    cupidatat qui labore cillum sit in tempor veniam consequat non laborum adipisicing aliqua ea nisi
                    sint.</p>

                <p>{!! $post->content !!}</p>

                <p>
                    <img src="{{ asset('assets/front/images/wheel-1000.jpg') }}"
                         srcset="{{ asset('assets/front/images/wheel-2000.jpg') }} 2000w, {{ asset('assets/front/images/wheel-1000.jpg') }} 1000w, images/wheel-500.jpg 500w"
                         sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                </p>

                <div class="entry__taxonomies">
                    <div class="entry__cat">
                        <h5>Posted In: </h5>
                        <span class="entry__tax-list">
                            <a href="{{ route('categories.single', ['slug' => $post->category->slug]) }}">{{ $post->category->title }}</a>
                        </span>
                    </div>

                    <div class="entry__cat">
                        <h5>Views: </h5>
                        <span class="entry__tax-list">
                            <p>Watched: {{ $post->view }}</p>
                        </span>
                    </div>

                    @if($post->tags->count())
                        <div class="entry__tags">
                            <h5>Tags: </h5>
                            <span class="entry__tax-list entry__tax-list--pill">
                                @foreach($post->tags as $tag)
                                    <a href="{{ route('tags.single', ['slug' => $tag->slug]) }}">{{ $tag->title }}</a>
                                @endforeach
                            </span>
                        </div>
                    @endif
                </div>

                <div class="entry__author">
                    <img src="{{ asset('assets/front/images/avatars/user-03.jpg') }}" alt="">

                    <div class="entry__author-about">
                        <h5 class="entry__author-name">
                            <span>Posted by</span>
                            <a href="#0">{{ $post->users->name }}</a>
                        </h5>

                        <div class="entry__author-desc">
                            <p>
                                Alias aperiam at debitis deserunt dignissimos dolorem doloribus, fuga fugiat
                                impedit laudantium magni maxime nihil nisi quidem quisquam sed ullam voluptas
                                voluptatum. Lorem ipsum dolor sit.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </article>

        <div class="s-content__entry-nav">
            <div class="row s-content__nav">
                <div class="col-six s-content__prev">
                    <a href="#0" rel="prev">
                        <span>Previous Post</span>
                        The Pomodoro Technique Really Works.
                    </a>
                </div>
                <div class="col-six s-content__next">
                    <a href="#0" rel="next">
                        <span>Next Post</span>
                        3 Benefits of Minimalism In Interior Design.
                    </a>
                </div>
            </div>
        </div>

        <div class="comments-wrap">

            <div id="comments" class="row">
                <div class="col-full">

                    @if($post->comments->count())
                        <h3 class="h2">{{ $post->comments->count() }} Comments</h3>

                        @foreach($post->comments as $comment)
                            <ol class="commentlist">

                            <li class="depth-1 comment">

                                <div class="comment__avatar">
                                    @if($post->users->avatar)
                                        <img class="avatar" src="{{ Storage::url($post->users->avatar) }}" alt="" width="50" height="50">
                                    @else
                                        <img class="avatar" src="{{ asset('no-image.png') }}" alt="" width="50" height="50">
                                    @endif
                                </div>

                                <div class="comment__content">

                                    <div class="comment__info">
                                        <div class="comment__author">{{ $post->users->name }}</div>

                                        <div class="comment__meta">
                                            <div class="comment__time">{{ $comment->getPostDateSmall() }}</div>
                                            <div class="comment__reply">
                                                <a class="comment-reply-link" href="#0">Reply</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="comment__text">
                                        <p>{{ $comment->comment }}</p>
                                    </div>

                                </div>

                            </li>
                        </ol>
                        @endforeach
                    @endif

                </div>
            </div>

            @auth()
                <div class="row comment-respond">
                    <div id="respond" class="col-full">
                        <h3 class="h2">Add Comment</h3>

                        <form name="contactForm" id="contactForm" method="post" action="{{ route('front.comments.store') }}"
                              autocomplete="off">
                            @csrf

                            <fieldset>
                                <input type="hidden" name="post_id" value="{{ $post->id }}">

                                <div class="form-field">
                                    <input name="title" id="cEmail" class="full-width" placeholder="Your Title*" value=""
                                           type="text">
                                </div>

                                <div class="message form-field">
                                    <textarea name="comment" id="cMessage" class="full-width"
                                              placeholder="Your Message*"></textarea>
                                </div>

                                <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large full-width"
                                       value="Add Comment" type="submit">

                            </fieldset>
                        </form>

                    </div>
                </div>
            @endauth
        </div>
    </section>
@endsection
