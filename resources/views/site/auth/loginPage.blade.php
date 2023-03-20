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
                                    <li class="breadcrumb-item active" aria-current="page">{{__('Sign In')}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<br> --}}
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-10 col-10 text-center">
                    <h1>{{__('Sign In')}}</h1>

                    <form method="POST" action="{{route('login')}}" class="ltn__form-box contact-form-box">
                        @csrf
                            <!-- <label for="user-name-or-email" class="form-label"> {{__('Email')}}</label> -->
                            <input type="text" name="email" value="{{old('email')}}" class="w-100 text-end p-2" id="user-name-or-email" placeholder="{{__('Email')}}">
                            @error('email')
                            <small class="form-text text-danger">{{__('The password or email does not match our records.')}} </small>
                            @enderror
                            <div class="p-0">
                                <input type="password" name="password" class="w-100 text-end p-2 my-2" aria-label="user-password" aria-describedby="user-password" placeholder="{{__('Password')}}">
                                @error('password')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <a ><button type="submit">{{__('Sign In')}}</button> </a>
                            <p class="h6 pb-10"> {{__('or')}} </p>
                            <a href="{{route('register')}}" class="btn"> {{__('Register')}}</a>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>

@stop

 

