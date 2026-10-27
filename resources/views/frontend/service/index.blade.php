@extends('frontend.frontend_master')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">Services</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Services</li>
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


    <!-- services-area -->
    <section class="services">
        <div class="container">
            <div class="row gx-0 services__active">

                @forelse ($services as $service)
                    <div class="col-xl-3">
                        <div class="services__item">

                            {{-- Service Image --}}
                            <div class="services__thumb">
                                <a href="{{ route('service.show.slug', $service->slug) }}">
                                    <img src="{{ $service->big_image
                                        ? asset('storage/' . $service->big_image)
                                        : asset('frontend/assets/img/images/services_img03.jpg') }}"
                                        alt="{{ $service->title ?? 'Service Image' }}">
                                </a>
                            </div>

                            <div class="services__content">

                                {{-- Service Icon / Small Image --}}
                                <div class="services__icon">
                                    <img class="light"
                                        src="{{ $service->small_image
                                            ? asset('storage/' . $service->small_image)
                                            : asset('frontend/assets/img/images/services_light_icon03.png') }}"
                                        alt="{{ $service->title ?? 'Service Light Icon' }}">

                                    <img class="dark"
                                        src="{{ $service->small_image
                                            ? asset('storage/' . $service->small_image)
                                            : asset('frontend/assets/img/images/services_icon03.png') }}"
                                        alt="{{ $service->title ?? 'Service Dark Icon' }}">
                                </div>

                                {{-- Title --}}
                                <h3 class="title">
                                    <a href="{{ route('service.show.slug', $service->slug) }}">
                                        {{ $service->title ?? '' }}
                                    </a>
                                </h3>

                                {{-- Description --}}
                                <p>{{ $service->desc ?? '' }}</p>

                                {{-- Subtitle --}}
                                @if ($service->sub_title)
                                    <ul class="services__list">
                                        @foreach (preg_split('/\r\n|\r|\n|,/', $service->sub_title) as $item)
                                            @if (trim($item) !== '')
                                                <li>{{ trim($item) }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif

                                {{-- Read More --}}
                                <a href="{{ route('service.show.slug', $service->slug) }}" class="btn border-btn">
                                    Read more
                                </a>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p>No services available.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </section>
    <!-- services-area-end -->
@endsection
