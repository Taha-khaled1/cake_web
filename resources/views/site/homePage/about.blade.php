@extends('layouts.layoutSite.SitePage')
@section('content')
 
<!-- breadcrumb area start -->
<link href="{{asset('/assets/new_assets/css/who-us.css?'. time() )}}" rel="stylesheet" />

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
                                    <li class="breadcrumb-item active" aria-current="page">{{__('About us')}}</li>
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
                <h1 class="text-end mb-4">{{__('About Us')}}</h1>
                <p class="text-end">
                    {{__('limoges cake provides cakes all over /UAE. We can custom bake all types of cakes that cater for all special events such as birthdays, weddings and all your special occasions. We have special cakes that are suitable for all tastes, dietary requirements and ages. Our cakes can be made from over 39 flavors and styles. Beside this, we have almost 45 designs suited for children which are perfect for fun and happy times. Cake Talk wedding cakes are unique and one of a kind, they are delicately made, and we ensure that they follow all your requirements to have that perfect cake for your special day.')}}
                </p>
                <p class="text-end">
                    {{__('limoges cake has experienced cake designers and bakers who pride themselves in making all sorts of cakes, small to large and suiting all dietary requirements to ensure ultimate satisfaction.')}}
                </p>
                <p class="text-end">
                    {{__('Why choose us?')}}
                </p>
                <p class="text-end">
                    {{__('limoges cake makes custom cakes and according to the requirement of our customers. Our cakes are unique in taste and in look. We take special care of customers and that is why we strive to meet high expectations and create a wow factor on a daily basis. We have a talented team of bakers that make cakes with special care. All our cakes are made fresh and to order, so you do not need to worry about their freshness. Our bakers use the highest quality of ingredients to ensure a mouthwatering and tasty sensation from the first bite.')}}
                </p>
                <p class="text-end">
                    {{__('We always try to make your event more special by our delightful and delicious cakes. We have cakes for our customers for special events such as weddings, birthday, baby showers, graduation parties and all other happy events. We are professional and always take care of our customer that is why we have a special team of cake makers that utilize their experience and their professional skills to make cakes more delicious and more eye-catching. All types of cakes served at Pandora cake are made fresh daily by using healthy, quality and fresh ingredients. We use dozens of ingredients to make our cake more delicious such as chocolate, fresh butter, vanilla beans, and high quality cream.')}}
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

