@extends('layouts.layoutSite.SitePage')
@section('title','تواصل معنا')
@section('content')

<link href="{{asset('/assets/new_assets/css/contact.css?'. time() )}}" rel="stylesheet" />

    <!-- BREADCRUMB AREA START -->
    {{-- <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bg="{{asset('SitePage/img/bg/14.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">تواصل معنا</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{route('viewHomePage')}}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> الصفحة الرئيسية</a></li>
                                <li>تواصل معنا</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- BREADCRUMB AREA END -->

    <!-- CONTACT ADDRESS AREA START -->
    <section class="contact">
        <div class="hero">
            <div class="overlay"></div>
            <h1 class="text-light">{{ __('Contact Us') }}</h1>
        </div>
    </section>
    {{-- 
        <div class="ltn__contact-address-area mb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                            <div class="ltn__contact-address-icon">
                                <img src="{{ url('/') }}/sitePage/img/icons/10.png" alt="Icon Image">
                            </div>
                            <h3>عنوان البريد الإلكتروني</h3>
                            <p>{{$email}} </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                            <div class="ltn__contact-address-icon">
                                <img src="{{ url('/') }}/sitePage/img/icons/11.png" alt="Icon Image">
                            </div>
                            <h3>رقم الهاتف</h3>
                            <p>{{$phone}} </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                            <div class="ltn__contact-address-icon">
                                <img src="{{ url('/') }}/sitePage/img/icons/12.png" alt="Icon Image">
                            </div>
                            <h3>عنوان المكتب</h3>
                            <p>{{$address}}  </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        --}}
    <!-- CONTACT ADDRESS AREA END -->

    <!-- CONTACT MESSAGE AREA START -->
    <div class="container">
        <section class="details">
        <div class="row">
            <div class="address mt-5 text-lg-center text-center col-lg-8 col-md-6">
                <img src="{{asset('storage/users/'. $header_logo )}}" alt="" style="width: 300px;height: 175px;">
                <div class="infoos">
                    <h4 class="text-secondary"> {{ __('Contact Us') }}</h4>
                    <div class="flex align-items-center flex-column">
                        <h5><i class="fa-solid fa-envelope"></i> {{ __('Email') }}: </h5>
                        <span>{{ $setting->where('key','email')->first()->value }}</span>
                    </div>
                    <div class="flex align-items-center flex-column">
                        <h5><i class="fa-solid fa-phone"></i> {{ __('phone') }}: </h5>
                        <span>{{ $setting->where('key','phone1')->first()->value }}</span>
                    </div>
                    <div class="flex align-items-center flex-column">
                        <h5><i class="fa-solid fa-location-dot"></i> {{ __('Address') }}: </h5>
                        <span>{{ strip_tags($setting->where('key','address')->first()->value) }}</span>
                    </div>
                </div>
                <ul class="list-unstyled d-flex gap-2 justify-content-lg-center justify-content-center">
                    <li>
                        <a href="{{ $setting->where('key','facebook_link')->first()->value }}">
                            <i class="fab fa-facebook mt-3"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $setting->where('key','twitter_link')->first()->value }}">
                            <i class="fab fa-twitter mt-3"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $setting->where('key','instagram_link')->first()->value }}">
                            <i class="fab fa-instagram mt-3"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $setting->where('key','Linkedin_link')->first()->value }}">
                            <i class="fa-brands fa-linkedin mt-3"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $setting->where('key','youtube_link')->first()->value }}">
                            <i class="fa-brands fa-youtube mt-3"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6">
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{session::get('success')}}
                    </div>
                @endif
                <form id="#" action="{{route('storeMessage')}}" method="post">
                        @csrf
                    <div class="d-flex gap-2 mb-2">
                        <div class="relative mb-4">
                            @error('name')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                            <input class="p-2 w-100 text-end" type="text" name="name" maxlength="100" placeholder="{{ __('Name') }}" value="{{old('name')}}">
                        </div>
                        <div class="relative mb-4">
                            @error('email')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                            <input class="p-2 w-100 text-end" type="email" name="email" maxlength="100" placeholder="{{ __('Email') }}" value="{{old('email')}}">
                        </div>
                    </div>
                    <div class="relative mb-4">
                        @error('type_id')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                        <select class="select-2 w-100 p-2 mb-4 text-end" name="city">
                            <option>{{ __('Choose the region') }}</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->name }}">{{ $city->name }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="relative mb-4 w-100 d-flex flex-column">
                        @error('phone')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                        <div class="w-100 mb-2 d-flex">
                            <input class="p-2 w-100" type="text" name="phone" maxlength="80" placeholder="{{ __('phone') }}"  value="{{old('phone')}}">
                        </div>
                    </div>
                    <div class="relative mb-4">
                        @error('message')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                        <textarea name="message" rows="10" class="p-2 w-100" maxlength="300" placeholder=" {{ __('Message') }}">{{old('message')}}</textarea>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-secondary w-25 mt-3" type="submit">{{ __('Send') }}</button>
                    </div>
                    <p class="form-messege mb-0 mt-20"></p>
                </form>
            </div>
        </div>
        </section>
    </div>
    
    <!-- CONTACT MESSAGE AREA END -->
    
    <!-- GOOGLE MAP AREA START -->
    <div class="map" style="margin-top: 120px;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9334.271551495209!2d-73.97198251485975!3d40.668170674982946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25b0456b5a2e7:0x68bdf865dda0b669!2sBrooklyn%20Botanic%20Garden%20Shop!5e0!3m2!1sen!2sbd!4v1590597267201!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- GOOGLE MAP AREA END -->

@stop

@section('script')   

<script src="{{asset('SitePage/js/plugins.js ')}}"></script>
<script src="{{asset('SitePage/js/main.js')}}"></script>

@stop

