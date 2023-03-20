@extends('layouts.layoutSite.SitePage')
@section('content')
<!-- hero slider area start -->
<div style="width: 96%;margin: auto;">
    <section class="slider">
        <div class="hero-slider-active">
        @foreach($carousels as $carousel)
        <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
            
                <div class="hero-slider-item bg-img" data-bg="{{asset('storage/property/'.$carousel->image)}}" style="height:650px;border-radius:15px;object-fit:cover;background-repeat:no-repeat;width:100%;background-size:cover;">
                    {{-- <div class="container">
                        <div class="row">
                            <div class="col-md-11">
                                <div class="hero-slider-content slide-2">
                                    <h2 class="slide-title"> @if($carousel->title_en != null)
                                        @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                        {{$carousel->title}}
                                        @else
                                        {{$carousel->title_en}}
                                        @endif @else
                                        {{$carousel->title}}
                                        @endif</h2>
                                        <h4 class="slide-desc"> @if($carousel->subtitle_en != null)
                                        @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                        {{$carousel->subtitle}}
                                        @else
                                        {{$carousel->subtitle_en}}
                                        @endif @else
                                        {{$carousel->subtitle}}
                                        @endif</h4>
                                    <p class="slide-desc"> @if($carousel->text_en != null)
                                        @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                        {{$carousel->text}}
                                        @else
                                        {{$carousel->text_en}}
                                        @endif @else
                                        {{$carousel->text}}
                                        @endif</p>
                                    <a class="btn btn-hero" href="{{$carousel->link}}">{{__('Shop now')}}</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <!-- single slider item start -->
        @endforeach
            
        </div>
    </section>
</div>
<!-- hero slider area end -->
    <section class="shop mt-5"> 
        <div class="container">
            <div class="text-center">
                <h2>{{ __('Make your event special with us') }}</h2>
                <h6>{{ __('We cater to your requests for all occasions') }}</h6>
                <button class="btn btn-secondary mt-4"><a href="{{route('specialorder')}}" class="text-decoration-none text-light">تسوق الان</a></button>
            </div>
        </div>
    </section>
 <!-- product area start -->
 <br> <br>
 <section class="last-product">
            <div class="container">
                <div class="row">
                    <div class="col-12" dir="{{LaravelLocalization::getCurrentLocaleDirection()}}">
                        <!-- section title start -->
                            <h1 class="text-center me-4">{{__('Latest products')}}</h1>
                        <!-- section title start -->
                        <div class="products owl-carousel owl-theme">
                        @foreach( $products as $product)
                            <div class="item product text-center mb-4">
                                
                                <a href="{{route('viewProperty',$product->id)}}">
                                    <img class="pri-image" src="{{asset('/storage/property/'.$product->image)}}" alt="product">
                                </a>
                                <a href="{{route('viewProperty',$product->id)}}" class="text-decoration-none">

                                    <h2 class="fs-5 m-3">
                                        @if($product->name_en != null)
                                                            @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                                            {{$product->name}}
                                                            @else
                                                            {{$product->name_en}}
                                                            @endif @else
                                                            {{$product->name}}
                                                            @endif
                                    </h2>
                                </a>
                                <div class="d-flex align-items-center justify-content-center gap-4">
                                    <p class="text-secondary m-0">{{$product->price}} {{__('AED')}}</p>
                                    <div class="cart-hover">
                                        <button class="btn btn-sm btn-cart add_cart border rounded" product_id="{{$product->id}}" href="#">{{__('Add to cart')}}</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach 
                        </div>
                        
                    </div>
                </div>
                {{--
                    <div class="row">
                        <div class="col-12">
                            <div class="product-container">
                                <!-- product tab content start -->
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab1">
                                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                        @foreach( $products as $product)
                                            <!-- product item start -->
                                            <div class="product-item">
                                                <figure class="product-thumb">
                                                    <a href="{{route('viewProperty',$product->id)}}">
                                                        <img class="pri-img" src="{{asset('/storage/property/'.$product->image)}}" alt="product">
                                                        <img class="sec-img" src="{{asset('/storage/property/'.$product->image)}}" alt="product">
                                                    </a>
                                                    <div class="button-group">
                                                        <a class="add-wishlist liked"  property="{{$product->id}}" value="1" name="like" >
                                                            <i class="pe-7s-like" @if(Auth::user()) @if( Auth::user()->like->where('property_id', $product->id)->first() ) style="color:red;" onclick="style.color = 'black' "@else onclick="style.color = 'red' "  @endif  @else onclick="style.color = 'red' "  @endif   ></i>
                                                        </a>
                                                    </div>
                                                    <div class="cart-hover">
                                                        <button class="btn btn-cart add_cart" product_id="{{$product->id}}" href="#">{{__('Add to cart')}}</button>
                                                    </div>
                                                </figure>
                                                <div class="product-caption text-center">
                                                    
                                                    <h6 class="product-name">
                                                        <a href="{{route('viewProperty',$product->id)}}">@if($product->name_en != null)
                                                            @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                                            {{$product->name}}
                                                            @else
                                                            {{$product->name_en}}
                                                            @endif @else
                                                            {{$product->name}}
                                                            @endif</a>
                                                    </h6>
                                                    <div class="price-box">
                                                        <span class="price-regular">{{$product->price}} {{__('AED')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- product item end --> 
                                            @endforeach 
    
                                        </div>
                                    </div>
                                </div>
                                <!-- product tab content end -->
                            </div>
                        </div>
                    </div>
                --}}
            </div>
        </section>
        <!-- product area end -->
        <!--== Add Swiper Pagination ==-->
        <!-- <div class="swiper-pagination"></div> -->
      </div>
    </section>
    <!--== End Hero Area Wrapper ==-->

 <!-- latest blog area start -->
 <div class="container">
    <section class="best-seller">
                    <div dir="{{LaravelLocalization::getCurrentLocaleDirection()}}">
                        <!-- section title start -->
                        <div class=""   >
                            <h1 >{{__('Categories')}}</h2>
                         </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="">
                    <div class="col-12">
                        <div class="blog-carousel-active slick-row-10 slick-arrow-style">
                        @foreach($categores as $ca)
                        @if($ca->img)
                            <!-- blog post item start -->
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="{{route('category_property',$ca->id)}}" class="d-flex justify-content-center">
                                        <img src="{{asset('/storage/property/'.$ca->img)}}" alt="ca image">
                                    </a>
                                </figure>
                                <div class="blog-content"> 
                                    <h5 class="text-center" >
                                        <a href="{{route('category_property',$ca->id)}}" style="color:#F3AABB;">@if($ca->name_en != null)
                                        @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                        {{$ca->name}}
                                        @else
                                        {{$ca->name_en}}
                                        @endif @else
                                        {{$ca->name}}
                                        @endif</a>
                                    </h5>
                                </div>
                            </div>
                            <!-- blog post item end -->
                            @endif
                            @endforeach
                         </div>
                    </div>
            </section>
        </div>
        <!-- latest blog area end --> 

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
                      flashBox('success', '{{__('Added to cart')}}');
                       
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
 