@extends('layouts.layoutSite.SitePage')
@section('title','تسجيل الدخول')
@section('content')

 
<!-- breadcrumb area start -->
{{-- <br>
<div class="breadcrumb-area" >
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                <div style=" position:absolute; left: 80%;">
                                <img src="{{asset('/assets/img/nav.png')}}"  width="100"></div>
                                    <li class="breadcrumb-item"><a href="{{route('viewHomePage')}}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('Create an account')}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<br> --}}
<section class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-10 col-10 text-center">
                <h1> {{__('Create an account')}}</h1>
                <form method="POST" action="{{ route('register') }}" class="ltn__form-box contact-form-box">
                    @csrf
                    @error('email')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                @if (\Session::has('error'))
                                <small class="form-text text-danger">
                                    {{ \Session::get('error')}}
                                </small>
                                @endif
                    <input type="text" name="email" class="w-100 text-end p-2" id="user-name-or-email"  value="{{old('email')}}" placeholder="{{__('Email')}}">
                    @error('phone')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    <input type="text" name="phone"  class="w-100 text-end p-2 my-2" id="user-mobile"  value="{{old('phone')}}" placeholder="{{__('Mobile number')}}">
                    @error('password')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror                
                    <input type="password" class="w-100 text-end p-2 my-2" name="password" aria-label="user-password" aria-describedby="user-password" placeholder="{{__('Password')}}">
                    @error('password_confirmation')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    <input type="password" class="w-100 text-end p-2 my-2" name="password_confirmation" aria-label="user-password" aria-describedby="user-password" placeholder="{{__('Confirm password')}}">
                    <a >
                        <button type="submit">{{__('Create an account')}}</button>
                    </a>
                </form>
                <p class="h6 pb-10"> {{__('or')}} </p>
                <a href="{{route('login')}}" class="btn"> {{__('Return to the login page')}}</a>
                    
            </div>

        </div>
    </div>
</section>

@stop

 

