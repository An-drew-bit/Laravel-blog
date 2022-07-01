@extends('front.layouts.layout')

@section('title', 'Wordsmith :: Standart')

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
                    This Is A Standard Format Post.
                </h1>
            </div>

            <div class="col-full entry__main">

                <p class="lead drop-cap">Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit id fugiat enim mollit amet anim veniam dolor dolor irure velit commodo cillum sit nulla ullamco magna amet magna cupidatat qui labore cillum sit in tempor veniam consequat non laborum adipisicing aliqua ea nisi sint.</p>

                <p>Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit id fugiat enim mollit amet anim veniam dolor dolor irure velit commodo cillum sit nulla ullamco magna amet magna cupidatat qui labore cillum sit in tempor veniam consequat non laborum adipisicing aliqua ea nisi sint ut quis proident ullamco ut dolore culpa occaecat ut laboris in sit minim cupidatat ut dolor voluptate enim veniam consequat occaecat fugiat in adipisicing in amet Ut nulla nisi non ut enim aliqua laborum mollit quis nostrud sed sed.
                </p>

                <p>
                    <img src="{{ asset('assets/front/images/wheel-1000.jpg') }}"
                         srcset="{{ asset('assets/front/images/wheel-2000.jpg 2000w') }},
                        {{ asset('assets/front/images/wheel-1000.jpg 1000w') }},
                        {{ asset('assets/front/images/wheel-500.jpg 500w') }}"
                         sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                </p>

            </div> <!-- s-entry__main -->

        </article> <!-- end entry/article -->

        <div class="comments-wrap">

            <div class="row comment-respond">

                <!-- START respond -->
                <div id="respond" class="col-full">

                    <h3 class="h2">Create Post <span>Your email address will not be published</span></h3>

                    <form name="contactForm" id="contactForm" method="post" action="{{ route('front.posts.store') }}"
                          enctype="multipart/form-data">
                        @csrf

                        <fieldset>

                            <div class="form-field">
                                <input name="title" id="cName" class="full-width @error('title') is-invalid @enderror"
                                       placeholder="Title*" value="" type="text">
                            </div>

                            <div class="form-field">
                                <input name="desc" id="cWebsite" class="full-width @error('desc') is-invalid @enderror"
                                       placeholder="Description" value="" type="text">
                            </div>

                            <div class="message form-field">
                                <textarea name="content" id="cMessage" class="full-width @error('content') is-invalid @enderror"
                                          placeholder="Content*"></textarea>
                            </div>

                            <div class="form-field">
                                <input type="file" class="full-width" name="thumbnail">
                            </div>

                            <div class="form-field">
                                <select style="width: 100%" id="category_id" name="category_id"
                                        class="@error('category_id') is-invalid @enderror">
                                    @foreach($categories as $key => $values)
                                        <option value="{{ $key }}">{{ $values }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-field">
                                <input name="email" id="cEmail" class="full-width @error('email') is-invalid @enderror"
                                       placeholder="Email*" value="" type="text">
                            </div>

                            <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large full-width" value="Add Post" type="submit">

                        </fieldset>
                    </form> <!-- end form -->

                </div>
                <!-- END respond-->

            </div> <!-- end comment-respond -->

        </div> <!-- end comments-wrap -->

    </section> <!-- end s-content -->
@endsection
