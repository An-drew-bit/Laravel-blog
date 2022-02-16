@extends('front.layouts.layout')

@section('title', 'Wordsmith :: About')

@section('content')
    <section class="s-content s-content--top-padding s-content--narrow">

        <div class="row narrow">
            <div class="col-full s-content__header">
                <h1 class="display-1 display-1--with-line-sep">About Wordsmith. </h1>
                <p class="lead">
                    Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor
                    sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit id fugiat enim
                    mollit amet anim veniam dolor dolor irure velit commodo.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-full s-content__main">
                <p>
                    <img src="{{ asset('assets/front/images/thumbs/about/about-1000.jpg') }}"
                         srcset="{{ asset('assets/front/images/thumbs/about/about-2000.jpg') }} 2000w,
                             {{ asset('assets/front/images/thumbs/about/about-1000.jpg') }} 1000w,
                             {{ asset('assets/front/images/thumbs/about/about-500.jpg') }} 500w"
                         sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                </p>

                <h2>This Is Our Story</h2>

                <p>
                    Odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti
                    dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique
                    sunt in culpa. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis

                <p>
                    Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor
                    sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit id fugiat enim
                    mollit amet anim veniam dolor dolor irure velit commodo cillum sit nulla ullamco. Lorem
                    ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat aute.
                </p>

                <hr>

                <div class="row block-1-2 block-tab-full">
                    <div class="col-block">
                        <h4 class="quarter-top-margin">Who We Are.</h4>
                        <p>Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui sit ex occaecat et eu mollit nisi pariatur fugiat deserunt dolor veniam reprehenderit aliquip magna nisi consequat aliqua veniam in aute ullamco Duis laborum ad non pariatur sit.</p>
                    </div>

                    <div class="col-block">
                        <h4 class="quarter-top-margin">Our Mission.</h4>
                        <p>Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui sit ex occaecat et eu mollit nisi pariatur fugiat deserunt dolor veniam reprehenderit aliquip magna nisi consequat aliqua veniam in aute ullamco Duis laborum ad non pariatur sit.</p>
                    </div>

                    <div class="col-block">
                        <h4 class="quarter-top-margin">Our Vision.</h4>
                        <p>Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui sit ex occaecat et eu mollit nisi pariatur fugiat deserunt dolor veniam reprehenderit aliquip magna nisi consequat aliqua veniam in aute ullamco Duis laborum ad non pariatur sit.</p>
                    </div>

                    <div class="col-block">
                        <h4 class="quarter-top-margin">Our Core Values.</h4>
                        <p>Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui sit ex occaecat et eu mollit nisi pariatur fugiat deserunt dolor veniam reprehenderit aliquip magna nisi consequat aliqua veniam in aute ullamco Duis laborum ad non pariatur sit.</p>
                    </div>

                </div>

                <div class="row half-bottom">

                    <div class="col-six tab-full">

                        <h3 class="add-bottom">Responsive Image</h3>

                        <p><img style="margin-top: 0" src="{{ asset('assets/front/images/wheel-500.jpg') }}"
                                srcset="{{ asset('assets/front/images/wheel-1000.jpg') }} 1000w,
                                {{ asset('assets/front/images/wheel-500.jpg') }} 500w"
                                sizes="(max-width: 500px) 100vw, 500px" alt=""></p>

                    </div>

                    <div class="col-six tab-full">

                        <h3 class="add-bottom">Responsive video</h3>

                        <div class="video-container">
                            <iframe src="http://player.vimeo.com/video/14592941?title=0&amp;byline=0&amp;portrait=0&amp;color=F64B39" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </section>
@endsection
