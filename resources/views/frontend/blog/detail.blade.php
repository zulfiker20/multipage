@extends('frontend.frontend_master')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">Recent Article</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__wrap__icon">
            <ul>
                <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon01.png') }}" alt=""></li>
                <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon02.png') }}" alt=""></li>
                <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon03.png') }}" alt=""></li>
                <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon04.png') }}" alt=""></li>
                <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon05.png') }}" alt=""></li>
                <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon06.png') }}" alt="">
            </ul>
        </div>
    </section>
    <!-- breadcrumb-area-end -->


    <!-- blog-area -->
    <section class="standard__blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="standard__blog__post">
                        <div class="standard__blog__thumb">
                            <a href="{{ route('frontend.blog.details', $blog?->id) }}"><img
                                    src="{{ asset('storage/' . $blog->image) }}" alt=""></a>
                            <a href="{{ route('frontend.blog.details', $blog?->id) }}" class="blog__link"><i
                                    class="far fa-long-arrow-right"></i></a>
                        </div>
                        <div class="standard__blog__content">
                            <div class="blog__post__avatar">
                                <div class="thumb"><img src="{{ asset('frontend/assets/img/blog/blog_avatar.png') }}"
                                        alt=""></div>
                                <span class="post__by">By : <a href="#">Halina Spond</a></span>
                            </div>
                            <h2 class="title"><a
                                    href="{{ route('frontend.blog.details', $blog?->id) }}">{{ $blog?->title }}</a></h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, by injected humour, or randomised words which don't
                                look even slightly believable</p>
                            <ul class="blog__post__meta">
                                <li><i class="fal fa-calendar-alt"></i> {{ $blog?->created_at?->format('d F Y') }}</li>
                                <li><i class="fal fa-comments-alt"></i> <a href="#">Comment (08)</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="blog__sidebar">
                        <div class="widget">
                            <form action="#" class="search-form">
                                <input type="text" placeholder="Search">
                                <button type="submit"><i class="fal fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Recent Blog</h4>
                            <ul class="rc__post">
                                @foreach ($latestBlogs as $latestBlog)
                                    <li class="rc__post__item">
                                        <div class="rc__post__thumb">
                                            <a href="{{ route('frontend.blog.details', $latestBlog?->id) }}"><img
                                                    src="{{ asset('storage/' . $latestBlog->image) }}" alt=""></a>
                                        </div>
                                        <div class="rc__post__content">
                                            <h5 class="title"><a
                                                    href="{{ route('frontend.blog.details', $latestBlog?->id) }}">{{ $latestBlog?->title }}</a>
                                            </h5>
                                            <span class="post-date"><i
                                                    class="fal fa-calendar-alt"></i>{{ $latestBlog?->created_at?->format('d F Y') }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Categories</h4>
                            <ul class="sidebar__cat">
                                @foreach ($categories as $category)
                                    <li class="sidebar__cat__item"><a
                                            href="{{ route('frontend.blog.index', ['category_id' => $category->id]) }}">{{ $category->name }}
                                            ({{ $category->blogs_count }})
                                        </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->


    <!-- contact-area -->
    <section class="homeContact homeContact__style__two">
        <div class="container">
            <div class="homeContact__wrap">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section__title">
                            <span class="sub-title">07 - Say hello</span>
                            <h2 class="title">Any questions? Feel free <br> to contact</h2>
                        </div>
                        <div class="homeContact__content">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form</p>
                            <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="homeContact__form">
                            <form action="{{ route('subscribe.store') }}" method="POST">
                                @csrf

                                <input type="text" name="name" placeholder="Enter name*" value="{{ old('name') }}"
                                    required>

                                <input type="email" name="email" placeholder="Enter mail*" value="{{ old('email') }}"
                                    required>

                                <input type="text" name="number" placeholder="Enter number*"
                                    value="{{ old('number') }}" required>

                                <button type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->
@endsection
