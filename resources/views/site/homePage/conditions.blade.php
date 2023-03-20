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
                                    <li class="breadcrumb-item"><a href="{{route('viewHomePage')}}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('Terms and Conditions')}}</li>
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
        <h1 class="text-end mb-4">{{__('Refund Policy | www.limogesd.com')}}</h1>
        <p>
            {{__('The companies refund policies are applied to only those orders for which a payment has been made to the www.limogesd.com In order to ensure provision of in-time delivery and quality of bakery items, we accept only those orders that are possible to process according to the requirements of the customers and in the time allowed. In this regard, we may decline certain orders. Moreover, we also spend lots of time in understanding customers’ orders. This involves working with customers on tasting, designing, researching, matching cake design with venue and ordering materials for the cake. For these reasons, it is not possible for us to refund any money that customers have deposited at any time. We thank you for your understanding.')}}
        </p>
        <p>
            {{__('In many instances, for customize orders, we have to make decorative elements beforehand. Generally, these decorative items are made at least 3 days before the order so that these items can have proper drying and setting time. In this regard, we follow the following cancellation and refund policy.')}}
        </p>
        <p>
            {{__('If a customer cancels an order, at least 2 days before the actual delivery of the order, 100 % of the deposited money is returned to the customers; refunds will be made back to the payment solution used initially by the customer. Please allow for up to 45 days for the refund transfer to be completed.')}}
        </p>
        <p>
            {{__('Refunds will be made onto the original mode of payment and will be processed within 10 to 45 days depends on the issuing bank of the credit card.')}}
        </p>
        <p>
            {{__('If a customer cancels an order, within 6 hours of the actual delivery of the order, no part of the deposited money is returned to the customers as store credit. There is no exception to this policy and we sincerely apologize you for this. You can still collect your processed order on the promised time and date of delivery and are obliged to pay the balance due to you.')}}
        </p>
        <p>
            {{__('If because of any reason, customer requests a reschedule of an order, then we will handle this on case-to-case basis. However, such requests are required to be given at least 24 hours before actual delivery. We try our best to accommodate such request, yet it is always depending on the availability of resources and our schedule so there is no guarantee that we will be able to meet the deadline that you award us. A reschedule may require customer to help us in accommodating the customers’ requests.')}}
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

