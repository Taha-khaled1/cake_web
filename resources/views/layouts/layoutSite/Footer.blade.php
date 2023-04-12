
    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- footer area start -->
    <footer dir="rtl">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-12 d-flex align-items-center flex-column">
                        <a href="{{route('viewHomePage')}}">
                            <img src="{{asset('storage/users/'. $header_logo )}}" alt=" logo">
                        </a>
                        <p style="
                                font-size: 14px;
                                color: #975d8d;
                                margin: 10px 0 20px;
                            ">{{__('We are Limoges Foundation for Cake and Sweets, we are distinguished by the best skilled hands in making cakes, decorating them and extracting the best international flavors in the world of cakes')}}</p>
                    </div>
                    {{-- <div class="text-end col-lg-3 col-md-4 col-6">
                        <ul class="list-unstyled">
                            <li>@if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl') {!!$address!!} @else {!!$addressen!!} @endif </li>
                        </ul>
                    </div> --}}
                    <div class="text-end col-lg-3 col-md-4 col-6">
                        <ul class="list-unstyled">
                            <li><a href="{{route('questions')}}" class="text-decoration-none">{{__('Common questions')}}</a></li>
                            <li><a href="{{route('register')}}" class="text-decoration-none">{{__('Register')}}</a></li>
                            <li><a href="{{route('login')}}" class="text-decoration-none">{{__('Sign In')}}</a></li>
                            <li><a href="{{route('about')}}" class="text-decoration-none">{{__('About Us')}}</a></li>
                        </ul>
                    </div>
                    <div class="text-end col-lg-3 col-md-4 col-6 mb-3">
                        <ul class="list-unstyled">
                            <li><a href="{{route('Shipping')}}" class="text-decoration-none">{{__('Shipping and receiving')}}</a></li>
                            <li><a href="{{route('policy')}}" class="text-decoration-none">{{__('Privacy policy')}}</a></li>
                            <li><a href="{{route('conditions')}}" class="text-decoration-none">{{__('Terms and Conditions')}}</a></li>
                            <li><a href="{{route('viewContact')}}" class="text-decoration-none">{{ __('Contact Us') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-4 text-end row">
                        <ul class="list-unstyled col-6 col-md-12">
                            <li>
                                <a class="text-decoration-none fs-6">{{__('Newsletter subscription')}}</a>
                            </li>
                            <li class="mt-2">
                                <form name="subscriber" id="subscriber" enctype="multipart/form-data" method="post" action="" class="newsletter-inner"  >
                                @csrf
                                <input type="email" class="news-field" id="mc-email" type="email" name="email" maxlength="90" id="a1" placeholder="{{__('Enter email')}}">
                                <div id="success_message_subscriber d-none"></div>
                                </form>
                            </li>
                        </ul>
                        
                        <div class="d-flex justify-content-start mb-3 col-6  col-md-12">
                            <ul class="icon list-unstyled d-flex gap-2 ">
                                <li>
                                    <a href="{{$facebook_link}}"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="{{$twitter_link}}"><i class="fa fa-twitter"></i></a>&nbsp; 
                                </li>
                                <li>
                                    <a href="{{$instagram_link}}"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
                <div class="line"></div>
                <div class="mt-4">
                    <p class="text-center" style="margin: -20px 0px 3px;">Copyright © <a target="_blank" href="https://instagram.com/nanots.ae?igshid=Yzg5MTU1MDY=" class="text-decoration-none">{{__('NTS')}} </a></p>
                </div>
    </footer>
    <!-- footer area end -->
