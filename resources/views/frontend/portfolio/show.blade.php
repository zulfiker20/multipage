@extends('frontend.frontend_master')
@section('content')
 <!-- breadcrumb-area -->
            <section class="breadcrumb__wrap">
                <div class="container custom-container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <div class="breadcrumb__wrap__content">
                                <h2 class="title">Portfolio Details</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Details</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb__wrap__icon">
                    <ul>
                        <li><img src="assets/img/icons/breadcrumb_icon01.png" alt=""></li>
                        <li><img src="assets/img/icons/breadcrumb_icon02.png" alt=""></li>
                        <li><img src="assets/img/icons/breadcrumb_icon03.png" alt=""></li>
                        <li><img src="assets/img/icons/breadcrumb_icon04.png" alt=""></li>
                        <li><img src="assets/img/icons/breadcrumb_icon05.png" alt=""></li>
                        <li><img src="assets/img/icons/breadcrumb_icon06.png" alt=""></li>
                    </ul>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- portfolio-details-area -->
            <section class="services__details">
                <div class="container">
                    <div class="row">
                       <div class="col-lg-8">
    <!-- পোর্টফোলিও ইমেজ -->
    <div class="services__details__thumb">
        @if($portfolio->image)
            <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->name ?? $portfolio->title }}">
        @else
            <img src="{{ asset('assets/img/images/services_details01.jpg') }}" alt="Default Image">
        @endif
    </div>

    <div class="services__details__content">
        <!-- পোর্টফোলিও টাইটেল -->
        <h2 class="title">{{ $portfolio->title ?? $portfolio->name }}</h2>
        
        <!-- পোর্টফোলিও ডেসক্রিপশন (যদি টেক্সট এডিটর বা HTML ফরম্যাটে থাকে) -->
        @if($portfolio->desc)
            {!! $portfolio->desc !!}
        @else
            <p>No description available for this portfolio item.</p>
        @endif
        
        {{-- 
            নোট: আপনার ডাটাবেজে শুধুমাত্র একটি ইমেজ কলাম (`image`) এবং একটি ডেসক্রিপশন কলাম (`desc`) আছে।
            নিচের অংশগুলো (মাল্টিপল ইমেজ বা এক্সট্রা সাব-টাইটেল) যদি আপনি ডেসক্রিপশন বক্সের (যেমন: TinyMCE, CKEditor) 
            ভেতর থেকে ইনপুট দেন, তাহলে উপরের `{!! $portfolio->desc !!}` কোডটিই পুরোটা সুন্দরভাবে রেন্ডার করবে।
            
            কিন্তু আপনি যদি স্ট্যাটিক ডিজাইনটি দেখতে চান, তবে নিচের অংশটি এভাবেই রেখে দিতে পারেন:
        --}}
        <div class="services__details__img">
            <div class="row">
                <div class="col-sm-6">
                    <img src="{{ asset('assets/img/images/services_details02.jpg') }}" alt="">
                </div>
                <div class="col-sm-6">
                    <img src="{{ asset('assets/img/images/services_details03.jpg') }}" alt="">
                </div>
            </div>
        </div>
        
        <h2 class="small-title">Nature of Business Strategy</h2>
        <p>A business strategy is a combination of proactive actions on the part of management...</p>
    </div>
</div>

                        <div class="col-lg-4">
                            <aside class="services__sidebar">
                                <div class="widget">
                                    <h5 class="title">Get in Touch</h5>
                                    <form action="#" class="sidebar__contact">
                                        <input type="text" placeholder="Enter name*">
                                        <input type="email" placeholder="Enter your mail*">
                                        <textarea name="message" id="message" placeholder="Massage*"></textarea>
                                        <button type="submit" class="btn">send massage</button>
                                    </form>
                                </div>
                                <div class="widget">
                                    <h5 class="title">Project Information</h5>
                                    <ul class="sidebar__contact__info">
                                        <li><span>Date :</span> January, 2021</li>
                                        <li><span>Location :</span> East Meadow NY 11554</li>
                                        <li><span>Client :</span> American</li>
                                        <li class="cagegory"><span>Category :</span>
                                            <a href="portfolio.html">Photo,</a>
                                            <a href="portfolio.html">UI/UX</a>
                                        </li>
                                        <li><span>Project Link :</span> <a href="portfolio-details.html">https://www.yournews.com/</a></li>
                                    </ul>
                                </div>
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
            <!-- portfolio-details-area-end -->

@endsection
