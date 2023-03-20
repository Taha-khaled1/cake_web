@extends('layouts.layoutSite.SitePage')
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
                                    <li class="breadcrumb-item active" aria-current="page">{{__('Thanks')}}</li>
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
    <div class="row text-center"> 
    <div class="col-3">
 
    </div>
    <div class="col-6">
    <img src="{{asset('/assets/img/tnx.png')}}"  width="500"></div>
    <div class="section-title text-center">
      <h2 >{{__('Thank you, we hope to be as good as you think')}}</h2>
    </div>
    </div>

    <div class="col-3">
 
    </div>
</div>
</div>
</section> 

@stop

@section('script')

<script src="{{asset('SitePage/js/plugins.js ')}}"></script>
<script src="{{asset('SitePage/js/main.js')}}"></script>

@stop

