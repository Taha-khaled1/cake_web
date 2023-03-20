@extends('layouts.layoutSite.SitePage')
@section('content')
<link href="{{asset('/assets/new_assets/css/who-us.css?'. time() )}}" rel="stylesheet" />

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
                                    <li class="breadcrumb-item active" aria-current="page">{{__('Shipping and receiving')}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<br> --}}
<!-- start boards -->
<section dir="{{LaravelLocalization::getCurrentLocaleDirection()}}" >
<div class="container pr-60 pl-60">
    <div class="row"> 
    {{-- @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        {!!$data!!}
        @else
        {!!$data_en!!}
        @endif --}}
        <div class="about">
            <div class="container">
                <h1 class="text-end mt-4">{{__('Delivery Policy')}}</h1>
                <p>
                    {{__('Method used for delivery We use chiller car delivery any place in UAE, not accept same day order (need order at least one day advance)')}}
                </p>
                <p>
                    {{__('Delivery Locations We do delivery all over UAE | Dubai, Abu Dhabi, Sharjah, Ajman, Al Ain, Ras Al Khaimah, Fujairah, Umm al Quwain.')}}
                </p>
                <p>
                    {{__('Delivery Fees')}}
                </p>
                <p>
                    {{__('Delivery cost to the customer')}}
                </p>
            </div>
        </div>
</div>
</div>
</section> 

@stop

@section('script')

<script src="{{asset('SitePage/js/plugins.js ')}}"></script>
<script src="{{asset('SitePage/js/main.js')}}"></script>

@stop

