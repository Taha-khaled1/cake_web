@extends('layouts.layoutSite.SitePage')
@section('title','نتائج البحث')

@section('content')
<link href="{{asset('/assets/new_assets/css/ourcake.css?'. time() )}}" rel="stylesheet" />

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
                                    <li class="breadcrumb-item active" aria-current="page"> {{__('Our products')}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- breadcrumb area end -->
             <!-- page main wrapper start -->
             <div class="shop-main-wrapper section-padding">
            <div class="container">
                <div class="row">
                @if( $products->count() == 0 ) <h3 class="mb-30 text-center">    {{__('No results found.')}} </h3>@endif

                    <!-- shop main wrapper start -->
                    <div class="col-lg-12" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
                        <div class="shop-product-wrapper">
                            <!-- shop product top wrap start -->
                            {{-- <div class="shop-top-bar">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode">
                                                <a class="active" href="#" data-target="grid-view" data-bs-toggle="tooltip" title="Grid View"><i class="fa fa-th"></i></a>
                                                <a href="#" data-target="list-view" data-bs-toggle="tooltip" title="List View"><i class="fa fa-list"></i></a>
                                            </div>
                                             
                                        </div>
                                    </div>
                                     
                                </div>
                            </div> --}}
                            <!-- shop product top wrap start -->

                            <!-- product item list wrapper start -->
                            <div class="sorts">
                                <div class="container">
                                    <h1 class="text-center mb-5">{{__('Our products')}}</h1>
                                    <div class="photos d-flex flex-wrap gap-5 justify-content-center">
                                        @foreach($products as $product)
            
                                            <!-- product single item start -->
                                            <div class="sort text-center relative">
                                                <!-- product grid start -->
                                                    <a href="{{route('viewProperty',$product->id)}}">
                                                        <img class="pri-img" src="{{asset('/storage/property/'.$product->image)}}" alt="product">
                                                    </a> 
                                                    <h4 >
                                                        @if($product->name_en != null)
                                                        @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                                        {{$product->name}}
                                                        @else
                                                        {{$product->name_en}}
                                                        @endif @else
                                                        {{$product->name}}
                                                        @endif
                                                    </h4>
                                                    <div class="d-flex justify-content-between mt-3 px-5 buttons-dev">
                                                        <p class="price-regular">{{$product->price}} {{__('AED')}}</p>
                                                        <a class="btn btn-cart add_cart" product_id="{{$product->id}}" href="#">{{__('Add to cart')}}</a>
                                                        <a class="add-wishlist liked"  property="{{$product->id}}" value="1" name="like" >
                                                            <i class="pe-7s-like" @if(Auth::user()) @if( Auth::user()->like->where('property_id', $product->id)->first() ) style="color:red;" onclick="style.color = 'black' "@else onclick="style.color = 'red' "  @endif  @else onclick="style.color = 'red' "  @endif   ></i>
                                                        </a>
                                                    </div>
                                                
                                            </div>
                                            @endforeach
                                    </div>
                                </div>
                                    <!-- product grid end -->
                                        {{--
                                            <div class="product-list-item">
                                                <figure class="product-thumb">
                                                    <a href="{{route('viewProperty',$product->id)}}">
                                                        <img class="pri-img" src="{{asset('/storage/property/'.$product->image)}}" alt="product">
                                                        <img class="sec-img" src="{{asset('/storage/property/'.$product->image)}}" alt="product">
                                                    </a>
                                                    
                                                    <div class="button-group">
                                                    <a class="add-wishlist liked"  property="{{$product->id}}" value="1" name="like" >
                                                              <i class="pe-7s-like" @if(Auth::user()) @if( Auth::user()->like->where('property_id', $product->id)->first() ) style="color:red;" onclick="style.color = 'black' "@else onclick="style.color = 'red' "  @endif  @else onclick="style.color = 'red' "  @endif   ></i>
                                                            </a>                                             </div>
                                                    <div class="cart-hover">
                                                    <button class="btn btn-cart add_cart" product_id="{{$product->id}}" href="#">{{__('Add to cart')}}</button>
                                                    </div>
                                                </figure>
                                                <div class="product-content-list"> 
                                                    <h5 class="product-name"><a href="{{route('viewProperty',$product->id)}}">@if($product->name_en != null)
                                                        @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                                        {{$product->name}}
                                                        @else
                                                        {{$product->name_en}}
                                                        @endif @else
                                                        {{$product->name}}
                                                        @endif</a></h5>
                                                    <div class="price-box">
                                                        <span class="price-regular">{{$product->price}} {{__('AED')}}</span>
                                                     </div>
                                                    <p>@if($product->description_en != null)
                                                      @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                                      {{$product->description}}
                                                      @else
                                                      {{$product->description_en}}
                                                      @endif @else
                                                      {{$product->description}}
                                                      @endif</p>
                                                </div>
                                            </div>
                                            --}}
                                    <!-- product list item end -->
                                    <!-- product list item end -->
                                </div>
                                <!-- product single item start -->

                                
                            </div>
                            <!-- product item list wrapper end -->

                            {{-- <!-- start pagination area -->
                            <div class="paginatoin-area text-center">
                            @if (isset($products) && $products->lastPage() > 1)
                                <ul class="pagination justify-content-center">
                                    @php
                                    $interval = isset($interval) ? abs(intval($interval)) : 3 ;
                                    $from = $products->currentPage() - $interval;
                                    if($from < 1){
                                        $from = 1;
                                    }

                                    $to = $products->currentPage() + $interval;
                                    if($to > $products->lastPage()){
                                        $to = $products->lastPage();
                                    }
                                    @endphp
                                    <!-- first/previous -->
                                    @if($products->currentPage() > 1)
                                
                                    <li class="page-item ">
                                    <a href="{{ $products->url(1) }}" class="page-link"   >
                                    <span >&laquo;</span>
                                    </a>
                                    </li> 
                                    <li class="page-item ">
                                    <a href="{{ $products->url($products->currentPage() - 1) }}"  class="page-link">
                                    <span >&lsaquo;</span>
                                    </a>
                                    </li>
                                    @endif
                                    <!-- links -->
                                    @for($i = $from; $i <= $to; $i++)
                                    @php
                                    $isCurrentPage = $products->currentPage() == $i;
                                    @endphp
                                    <li class="page-item {{ $isCurrentPage ? 'active ' : '' }}" aria-current="{{ $isCurrentPage ? 'page ' : '' }}">
                                    <a href="{{ !$isCurrentPage ? $products->url($i) : '#' }}" class="page-link">
                                    {{ $i }}
                                    </a>
                                    </li>
                                    @endfor
                                    <!-- next/last -->
                                    @if($products->currentPage() < $products->lastPage())
                                    <li class="page-item ">
                                    <a href="{{ $products->url($products->currentPage() + 1) }}" class="page-link" >
                                    <span >&rsaquo;</span>
                                    </a>
                                    </li>
                                    <li class="page-item ">
                                    <a href="{{ $products->url($products->lastpage()) }}" class="page-link">
                                    <span >&raquo;</span>
                                    </a>
                                    </li>
                                    @endif
                                </ul>
                            @endif 
                            </div> --}}
                            <!-- end pagination area -->
                        </div>
                    </div>
                    <!-- shop main wrapper end -->
                </div>
            </div>
        </div>
    <!--== End Product Area Wrapper ==-->

 <!-- end boards -->
@stop
@push('js') 

  <script>
$('.liked').click(function(anyothername) {
              //  e.preventDefault();
               
         var id = $(this).attr('property');
         var val = $(this).val();
         
         $.ajax({
                type: "post",
                url: "{{ route('property.like') }}",
                data: { _token: '{{ csrf_token() }}',
                     "id" : id 
                      },
                    dataType: 'json',              // let's set the expected response format
                    success: function (data) {
                         
                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#success_message_notifications').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });   
          
    });

    
$('.add_cart').on("click", function (e) {
            e.preventDefault();
               
         var id = $(this).attr('product_id');
         
         
         $.ajax({
                type: "post",
                url: "{{ route('cart.store') }}",
                data: { _token: '{{ csrf_token() }}',
                     "product_id" : id,
                     "quantity" : 1},
                    dataType: 'json',              // let's set the expected response format
                    success: function (data) {
                      flashBox('success', 'تمت الاضافة الى السلة');
                       
                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#success_message_notifications').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });   
          
    });
</script>
@endpush

