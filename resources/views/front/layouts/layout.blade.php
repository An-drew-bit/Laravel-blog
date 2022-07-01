<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ asset('assets/front/css/styles.css') }}">

    <script src="{{ asset('assets/front/js/modernizr.js') }}"></script>

    <link rel="shortcut icon" href="{{ asset('assets/front/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/front/favicon.ico')}}" type="image/x-icon">

</head>

<body id="top">

    <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

<header class="s-header header">

    <div class="header__logo">
        <a class="logo" href="{{ route('home') }}">
            <img src="{{ asset('assets/front/images/logo.svg') }}" alt="Homepage">
        </a>
    </div>

    <a class="header__search-trigger" href="#0"></a>
    <div class="header__search">

        <form role="search" method="get" class="header__search-form" action="{{ route('search') }}">
            <label>
                <span class="hide-content">Search for:</span>
                <input type="search" class="search-field @error('s') is-invalid @enderror" placeholder="Type Keywords" value="" name="s"
                       title="Search for:" autocomplete="off" required>
            </label>
            <input type="submit" class="search-submit" value="Search">
        </form>

        <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

    </div>

    <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
    <nav class="header__nav-wrap">

        <h2 class="header__nav-heading h6">Navigate to</h2>

        <ul class="header__nav">
            <li class="current"><a href="{{ route('home') }}" title="">Home</a></li>
            <li class="has-children">
                <a href="#0" title="">Categories</a>
                <ul class="sub-menu">
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ route('categories.single', ['slug' => $category->slug]) }}">{{ $category->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>

            @auth
                <li class="has-children">
                    <a href="#0" title="">Blog</a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('video') }}">Video Post</a></li>
                        <li><a href="{{ route('audio') }}">Audio Post</a></li>
                        <li><a href="{{ route('front.posts.index') }}">Standard Post</a></li>
                    </ul>
                </li>

                <li><a href="{{ route('about') }}" title="">About</a></li>
                <li><a href="{{ route('contact') }}" title="">Contact</a></li>
                <li class="li_margin"><a href="{{ route('logout') }}" title="">Выйти</a></li>
            @endauth

            @guest
                <li class="li_margin"><a href="{{ route('login.create') }}" title="">Войти</a></li>
                <li><a href="{{ route('register.create') }}" title="">Регистрация</a></li
            @endguest
        </ul>

        <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

    </nav>

</header>

@yield('content')

<section class="s-extra">

    <div class="row">

        <div class="col-seven md-six tab-full popular">
            <h3>Popular Posts</h3>

            <div class="block-1-2 block-m-full popular__posts">
                @foreach($posts as $post)
                    <article class="col-block popular__post">
                        <a href="{{ route('posts.single', ['slug' => $post->slug]) }}" class="popular__thumb">
                            <img src="{{ asset("assets/front/images/thumbs/small/{$post->thumbnail_small}") }}" alt="">
                        </a>
                        <h5>{{ $post->desc }}</h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0">{{ $post->author }}</a></span>
                            <span class="popular__date"><span>on</span> <time
                                    datetime="{{ $post->created_at }}">{{ $post->getPostDateSmall() }}</time></span>
                        </section>
                    </article>
                @endforeach
            </div>
        </div>

        <div class="col-four md-six tab-full end">
            <div class="row">
                <div class="col-six md-six mob-full categories">
                    <h3>Categories</h3>

                    <ul class="linklist">
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ route('categories.single', ['slug' => $category->slug]) }}">{{ $category->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-six md-six mob-full sitelinks">
                    <h3>Site Links</h3>

                    <ul class="linklist">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="#0">Blog</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li><a href="#0">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</section>

<footer class="s-footer">

    <div class="s-footer__main">
        <div class="row">

            <div class="col-six tab-full s-footer__about">

                <h4>About Wordsmith</h4>

                <p>Fugiat quas eveniet voluptatem natus. Placeat error temporibus magnam sunt optio aliquam. Ut ut
                    occaecati placeat at.
                    Fuga fugit ea autem. Dignissimos voluptate repellat occaecati minima dignissimos mollitia
                    consequatur.
                    Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et
                    enim exercitationem ipsam. Culpa error
                    temporibus magnam est voluptatem.</p>

            </div>

            <div class="col-six tab-full s-footer__subscribe">

                <h4>Our Newsletter</h4>

                <p>Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et
                    enim exercitationem ipsam. Culpa consequatur occaecati.</p>

                <div class="subscribe-form">
                    <form id="mc-form2" action="{{ route('subscribe') }}" method="post" class="group">
                        @csrf

                        <label for="email" class="visually-hidden"></label>
                        <input type="email" class="email @error('email') is-invalid @enderror" name="email"
                               placeholder="Email Address">

                        <input type="submit" name="subscribe" value="Send">

                    </form>
                </div>

            </div>

        </div>
    </div>

    <div class="s-footer__bottom">
        <div class="row">

            <div class="col-six">
                <ul class="footer-social">
                    <li>
                        <a href="#0"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-youtube"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-pinterest"></i></a>
                    </li>
                </ul>
            </div>

            <div class="col-six">
                <div class="s-footer__copyright">
                    <span>Copyright &copy; by Andrew Makarov {{ date('Y') }}</span>
                </div>
            </div>

        </div>
    </div>

    <div class="go-top">
        <a class="smoothscroll" title="Back to Top" href="#top"></a>
    </div>

</footer>

<script src="{{ asset('assets/front/js/app.js') }}"></script>

</body>
</html>
