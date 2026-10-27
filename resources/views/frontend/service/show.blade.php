@extends('frontend.frontend_master')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <!-- ডাইনামিক সার্ভিস টাইটেল -->
                        <h2 class="title">{{ $service->title ?? 'Service Details' }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Service Details</li>
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
                <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon06.png') }}" alt=""></li>
            </ul>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- services-details-area -->
    <section class="services__details__area" style="padding: 120px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- সার্ভিস বিগ ইমেজ -->
                    <div class="services__details__thumb">
                        <img src="{{ $service->big_image ? asset('storage/' . $service->big_image) : asset('frontend/assets/img/images/services_details01.jpg') }}"
                            alt="{{ $service->title ?? '' }}">
                    </div>

                    <div class="services__details__content">
                        <!-- সার্ভিস মেইন টাইটেল -->
                        <h2 class="title">{{ $service->title ?? '' }}</h2>

                        <!-- সার্ভিস মেইন ডেসক্রিপশন (HTML এডিটর সাপোর্ট সহ) -->
                        @if ($service->desc)
                            {!! $service->desc !!}
                        @else
                            <p>No description available for this service.</p>
                        @endif

                        <!-- সাব-টাইটেল বা ফিচারের লিস্ট (কমা বা নিউলাইন দিয়ে আলাদা করা টেক্সট) -->
                        @if ($service->sub_title)
                            <ul class="services__details__list">
                                @foreach (preg_split('/\r\n|\r|\n|,/', $service->sub_title) as $item)
                                    @if (trim($item) !== '')
                                        <li>{{ trim($item) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif


                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="services__sidebar">
                        
                        <div class="widget">
                            <h5 class="title">Contact Information</h5>
                            <ul class="sidebar__contact__info">
                                <li><span>Address :</span> 8638 Amarica Stranfod, <br> Mailbon Star</li>
                                <li><span>Mail :</span> yourmail@gmail.com</li>
                                <li><span>Phone :</span> +7464 0187 3535 645</li>
                                <li><span>Fax id :</span> +9 659459 49594</li>
                            </ul>
                            <ul class="sidebar__contact__social">
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- services-details-area-end -->
    <!-- contact-area -->
    <section class="homeContact">
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
