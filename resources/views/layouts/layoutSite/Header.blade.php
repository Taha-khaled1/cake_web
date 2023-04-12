
<div class="top-head d-flex flex-wrap">
    <div class="dropdown">
        <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="color: #975d8d;">
        {{ LaravelLocalization::getCurrentLocaleNative() }}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li><a a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
            {{ $properties['native'] }}
            </a></li>
            @endforeach
        </ul>
    </div>
    <div class="">
        <form class="" action="{{ route('search_property')}}" method="GET">
            <input type="text" name="title" placeholder="{{__('Search entire store hire')}}" class="fs-6">
            <button type="submit" class=""><i class="pe-7s-search"></i></button>
        </form>
    </div>
    @if(Auth::user())@else
    <div class="login me-4">
        <a href="{{route('login')}}" style="color:#975D8D" >
            {{ __('Sign In') }}
        </a>  &nbsp;
            / &nbsp; 
        <a  href="{{route('register')}}" style="color:#975D8D">
            {{ __('Register') }}
        </a>  
        
        
        {{-- <ul class="nav align-items-center justify-content-end">
            <li class="language">
                {{ LaravelLocalization::getCurrentLocaleNative() }}
                <i class="fa fa-angle-down"></i>
                <ul class="dropdown-list curreny-list">
                
                    </ul>
            </li>
            <li>   
            </li>
            <li> 
            </li>
            <li> 
            </li>
        </ul> --}}
    </div>
    @endif
</div>
      
      {{-- dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" --}}

        <!-- main header start -->
        
            <!-- header top start -->
            <!-- <div class="header-top bdr-bottom">
                <div class="container">
                    <div class="row align-items-center">
                    <div class="col-lg-6">
                          
                          </div>
                        <div class="col-lg-6 text-right">
                            <div class="header-top-settings">
                                <ul class="nav align-items-center justify-content-end">
                                    <li class="language">
                                       {{ LaravelLocalization::getCurrentLocaleNative() }}
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="dropdown-list curreny-list">
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                          <li><a a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                          {{ $properties['native'] }}
                                          </a></li>
                                          @endforeach

                                         </ul>
                                    </li>
                                    <li>   
                                    </li>
                                    <li> 
                                    </li>
                                    <li> 
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- header top end -->

            <!-- header middle area start -->
            <header class="header-main-area sticky">
                <div class="d-flex justify-content-between">
                   

                        <!-- start logo area -->
                        <div class="icons">
                            <ul class="list-unstyled d-flex fs-3">
                                <li>
                                    <a href="{{route('cart.index')}}" >
                                        <i class="fas fa-bag-shopping"></i> 
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('wishlist')}}">
                                        <i class="far fa-heart"></i> 
                                    </a> 
                                </li>
                                <li >
                                    <a href="{{route('viewMyAccount')}}">
                                        <i class="fas fa-user-circle"></i> 
                                    </a>
                                </li>
                            </ul>
                            {{-- <div class="logo">
                                <a href="{{route('viewHomePage')}}">
                                    <img src="{{asset('storage/users/'. $header_logo )}}" alt=" logo">
                                </a> 
                            </div> --}}
                        </div>
                        <!-- start logo area -->

                        <!-- main menu area start -->
                        <div class="links">
                            <ul class="list-unstyled d-flex">
                            
                                <li><a href="{{ url('/'. LaravelLocalization::getCurrentLocale() .'')  }}"class="text-decoration-none">{{__('Home')}}</a></li> 
                                            @foreach($categories as $category)
                                            <li><a href="{{route('category_property',$category->id)}}" class="text-decoration-none">@if($category->name_en != null)
                                                @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                                {{$category->name}}
                                                @else
                                                {{$category->name_en}}
                                                @endif @else
                                                {{$category->name}}
                                                @endif</a></li>
                                             
                                            @endforeach
                                             
                                        </li>
                                        <li>
                                            <div class="logo">
                                                <a href="{{route('viewHomePage')}}">
                                                    <img src="{{asset('storage/users/'. $header_logo )}}" alt=" logo"  class="m-0">
                                                </a>
                                            </div>
                                        </li>
                                        <!-- <li><a href="{{route('products')}}">{{__('Our products')}}</a></li> -->
                                        <li><a href="{{route('specialorder')}}" class="text-decoration-none">{{__('Special order')}}</a></li> 
                                        <li><a href="{{route('viewContact')}}" class="text-decoration-none">{{ __('Contact Us') }}</a></li> 
                            </ul>
                            {{-- <div class="main-menu-area">
                                <div class="main-menu">
                                    <!-- main menu navbar start -->
                                    <nav class="desktop-menu">
                                        <ul>
                                            <li><a href="{{route('viewHomePage')}}"></a></li>
                                            
                                                @foreach($categories as $category)
                                                <li><a href="{{route('category_property',$category->id)}}">@if($category->name_en != null)
                                                    @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                                    {{$category->name}}
                                                    @else
                                                    {{$category->name_en}}
                                                    @endif @else
                                                    {{$category->name}}
                                                    @endif</a></li>
                                                 
                                                @endforeach
                                                 
                                            </li>
                                            <!-- <li><a href="{{route('products')}}">{{__('Our products')}}</a></li> -->
                                            <li><a href="{{route('specialorder')}}">{{__('Special order')}}</a></li> 
                                                 
                                        </ul>
                                    </nav>
                                    <!-- main menu navbar end -->
                                </div>
                            </div> --}}
                        </div>
                        <div class="logo2">
                                <a href="{{route('viewHomePage')}}">
                                    <img src="{{asset('storage/users/'. $header_logo )}}" alt=" logo" class="mt-4">
                                </a>
                        </div>
                        <!-- main menu area end -->
                        <!-- mini cart area start -->
                        {{-- <div class="list-unstyled d-flex">
                            <div class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                                <div class="header-search-container">
                                    <button class="search-trigger d-xl-none d-lg-block"><i class="pe-7s-search"></i></button>
                                    <form class="header-search-box d-lg-none d-xl-block" action="{{ route('search_property')}}" method="GET">
                                        <input type="text" name="title" placeholder="{{__('Search entire store hire')}}" class="header-search-field bg-white">
                                        <button type="submit" class="header-search-btn"><i class="pe-7s-search"></i></button>
                                    </form>
                                </div>
                                <div class="header-configure-area">
                                    <ul class="nav justify-content-end">
                                    <li >
                                            <a href="{{route('viewMyAccount')}}">
                                            <i class="pe-7s-user"></i>&nbsp; 
                                            </a> &nbsp; 
                                        </li>
                                        <li>
                                            <a href="{{route('wishlist')}}">
                                                <i class="pe-7s-like"></i> 
                                             </a> 
                                        </li>
                                        <li>
                                            <a href="{{route('cart.index')}}" >
                                                <i class="pe-7s-shopbag"></i> 
                                             </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                        <!-- mini cart area end -->

                    
                </div>
                <!-- mobile menu start  -->
                    <div class="fix-head px-2 position-fixed">
                        <ul class="list-unstyled d-flex justify-content-center gap-3 {{ LaravelLocalization::getCurrentLocaleDirection() == 'ltr' ? 'flex-row-reverse' : '' }}">
                        <li class="text-center">
                                <a href="{{route('viewHomePage')}}">
                                    <i class="fas fa-home"></i>
                                    <p>{{__('Home')}}</p>
                                </a>
                            </li>
                            <!-- <li class="text-center">
                                <a href="our-cake.html">
                                    <i class="	far fa-heart">
                                    </i>
                                    <p>Cake</p>
                                </a>
                            </li> -->
                                @foreach($categories as $category)
                                <li class="text-center">
                                    <a href="{{route('category_property',$category->id)}}">@if($category->name_en != null)
                                        <i class="far fa-heart">
                                            </i><p>@if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl') {{$category->name}} @else {{$category->name_en}} @endif @else {{$category->name}} @endif</p>
                                    </a>
                                </li>
                                    @endforeach
                            
                            <li class="text-center">
                                <a href="{{route('specialorder')}}">
                                    <i class="	fas fa-phone-alt"></i>
                                    <p>{{__('Special order')}}</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                <!-- mobile menu end  -->
            </header>
            <!-- header middle area end -->
        
        <!-- main header start -->

        <!-- mobile header start -->
        <!-- mobile header start -->
        {{-- <div class="mobile-header d-lg-none d-md-block sticky">
            <!--mobile header top start -->
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="mobile-main-header">
                            <div class="mobile-logo">
                                <a href="{{route('viewHomePage')}}">
                                    <img src="{{asset('storage/users/'. $header_logo )}}" alt="Brand Logo">
                                </a>
                            </div>
                            <div class="mobile-menu-toggler">
                                <div class="mini-cart-wrap">
                                    <a href="{{route('cart.index')}}">
                                        <i class="pe-7s-shopbag"></i>&nbsp; &nbsp; 
                                     </a>
                                   
                                            <a href="{{route('viewMyAccount')}}">  
                                            <i class="pe-7s-user"></i> &nbsp; 
                                            </a> 
                                      
                                            <a href="{{route('wishlist')}}">
                                                <i class="pe-7s-like"></i> &nbsp; 
                                             </a> 
                                    
                                </div>
                                <button class="mobile-menu-btn">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile header top start -->
        </div> --}}


        
        <!-- mobile header end -->
        <!-- mobile header end -->

        <!-- offcanvas mobile menu start -->
        <!-- off-canvas menu start -->
        {{-- <aside class="off-canvas-wrapper">
            <div class="off-canvas-overlay"></div>
            <div class="off-canvas-inner-content">
                <div class="btn-close-off-canvas">
                    <i class="pe-7s-close"></i>
                </div>

                <div class="off-canvas-inner">
                    <!-- search box start -->
                    <div class="search-box-offcanvas">
                        <form action="{{ route('search_property')}}" method="GET">
                            <input type="text"  name="title" placeholder="{{__('Search entire store hire')}}">
                            <button type="submit" class="search-btn"><i class="pe-7s-search"></i></button>
                        </form>
                    </div>
                    <!-- search box end -->

                    <!-- mobile menu start -->
                    <div class="mobile-navigation">

                        <!-- mobile menu navigation start -->
                        <nav>
                            <ul class="mobile-menu">
                            <li><a href="{{route('viewHomePage')}}"> {{__('Home')}} </a></li> 
 
                                    @foreach($categories as $category)
                                    <li><a href="{{route('category_property',$category->id)}}">@if($category->name_en != null)
                                    @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                    {{$category->name}}
                                    @else
                                    {{$category->name_en}}
                                    @endif @else
                                    {{$category->name}}
                                    @endif</a></li>
                                    @endforeach 
                                <li><a href="{{route('specialorder')}}">{{__('Special order')}}</a></li> 

                                <!-- <li><a href="{{route('products')}}">{{__('Our products')}}</a></li> -->
                                <li><a href="{{route('about')}}">{{__('About Us')}}</a></li> 
                                
                                
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->

                    <div class="mobile-settings">
                        <ul class="nav">
                            <li>
                                <div class="dropdown mobile-top-dropdown">
                                    <a href="#" class="dropdown-toggle" id="currency" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ LaravelLocalization::getCurrentLocaleNative() }}

                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="currency">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a class="dropdown-item" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                                        @endforeach   
                                    </div>
                                </div>
                            </li>
                            
                        </ul>
                    </div>

                    <!-- offcanvas widget area start -->
                    <div class="offcanvas-widget-area">
                        <!-- <div class="off-canvas-contact-widget">
                            <ul>
                                <li><i class="fa fa-mobile"></i>
                                    <a href="#">0123456789</a>
                                </li>
                                <li><i class="fa fa-envelope-o"></i>
                                    <a href="#">info@yourdomain.com</a>
                                </li>
                            </ul>
                        </div>
                        <div class="off-canvas-social-widget">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div> -->
                    </div>
                    <!-- offcanvas widget area end -->
                </div>
            </div>
        </aside> --}}
        <!-- off-canvas menu end -->
        <!-- offcanvas mobile menu end -->
    <!-- end Header Area -->
    