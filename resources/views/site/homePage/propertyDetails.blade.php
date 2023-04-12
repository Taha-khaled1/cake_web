@extends('layouts.layoutSite.SitePage')
 @section('content')
 <!-- breadcrumb area start -->
 <link href="{{asset('/assets/new_assets/css/product-card.css?'. time() )}}" rel="stylesheet" />
<style>
@media(max-width:767px){
    .details{
        order:1
    }
}
</style>
{{--  <br>
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
                                    <li class="breadcrumb-item active" aria-current="page">@if($product->name_en != null)
                                    @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                    {{$product->name}}
                                    @else
                                    {{$product->name_en}}
                                    @endif @else
                                    {{$product->name}}
                                    @endif</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
  <!-- page main wrapper start -->
  <div class="cards" dir="LaravelLocalization::getCurrentLocaleDirection()">
            <div class="container">
                <div class="row">
                    
                    <!-- product details wrapper start -->
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 {{ LaravelLocalization::getCurrentLocaleDirection() == 'ltr' ? 'order-1' : '' }}">
                        <!-- product details inner end -->
                                    <div class="product-large-slider">
                                        <div class="big-img">
                                            <img src="{{asset('/storage/property/'.$product->image)}}" alt="product-details" />
                                        </div>
                                        @foreach($product->album as $a)  
                                        <div class="small-imgs mt-2">
                                            <img src="{{asset('/storage/property/'.$a->name)}}" alt="product-details" />
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                    <div class="pro-nav slick-row-10 slick-arrow-style">
                                        <div class="pro-nav-thumb">
                                            <img src="{{asset('/storage/property/'.$product->image)}}" alt="product-details" />
                                        </div>
                                        @foreach($product->album as $a)  
                                        <div class="pro-nav-thumb">
                                            <img src="{{asset('/storage/property/'.$a->name)}}" alt="product-details" />
                                        </div>
                                        @endforeach 
                                    </div>
                                </div>
                        <div class="details col-lg-6 col-md-6 col-sm-12 col-12 pt-5">                                      
                                        <h2 >@if($product->name_en != null)
                                            @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                            {{$product->name}}
                                            @else
                                            {{$product->name_en}}
                                            @endif @else
                                            {{$product->name}}
                                            @endif</h2>
                                        
                                            <p class="price-regular"><span>{{$product->price}}</span> {{__('AED')}}</p>
                                        <p class="pro-desc">@if($product->description_en != null)
                                                @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                                {{$product->description}}
                                                @else
                                                {{$product->description_en}}
                                                @endif @else
                                                {{$product->description}}
                                                @endif </p>
                                        <div class="pro-size">
                                        @if($product->size)  <h5 class="option-title">{{__('size')}} :</h6>  <span>{{$product->size}}</span>  @endif

                                        </div>
                                        <form action="{{ route('cart.store') }}" method="post" id="myform">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <h5 class="option-title">{{__('Quantity')}} : </h5>
                                        <div class="d-flex gap-3 size pro-qty"><input type="text" name="quantity" value="1" style="width:25px;"></div>
                                        
                                        <div class="pro-size">
                                        @if($product->option->count() >= 1)
                                            <h6 class="option-title">{{__('size')}} :</h6>
                                            <select class="nice-select" name="size">
                                               @foreach($product->option as $a)  
                                                <option value="{{$a->name}}"> {{$a->name}} </option>
                                                @endforeach
                                            </select>@endif
                                        </div>
                                        <div class="col-6 my-2">
                                            {{-- <label for="add-nots"  > {{__('Notes with the order')}}</label> --}}
                                            <textarea class="form-control" placeholder="{{__('Notes with the order')}}" name="notes" id="add-nots" cols="5" maxlength="300"  rows="3"></textarea>
                                            </div><br> 
                                        </form>
                                        <div class="action_link">
                                            <a class="btn btn-cart2 p-0" href="#" onclick="document.getElementById('myform').submit()" > {{__('Add to cart')}}</a>
    
                                            </div>
                                        <div class="useful-links"> 
                                            </div>
                                            <br> 
                                            
                                            
                                            <div class="like-icon d-flex align-items-center justify-content-center gap-3">
                                            <a class="liked" title="Add to wishlist"  property="{{$product->id}}" value="1" name="like"  >
                                                          <i  class="pe-7s-like" @if(Auth::user()) @if( Auth::user()->like->where('property_id', $product->id)->first() ) style="color:red;" onclick="style.color = 'black' "@else onclick="style.color = 'red' "  @endif  @else onclick="style.color = 'red' "  @endif   > {{__('Add to favorite')}}</i>
                                                    </a>  
                                            <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{ url('/') }}/property/{{$product->id}}&display=popup" target="_blank"><i class="fa fa-facebook"></i>like</a>
                                            <a class="twitter" href="https://twitter.com/intent/tweet?url={{ url('/') }}/property/{{$product->id}}" target="_blank"><i class="fa fa-twitter"></i>tweet</a>
                                             
                                        </div>
                        </div>
                    <!-- product details wrapper end -->
                </div>
            </div>
        </div>
 
              <br>
 <section class="product-area section-padding bg-gray"  >
            <div class="container">
                <div class="row">
                    <div class="col-12 cards">
                        <!-- section title start -->
                        <div class="section-title text-center details">
                            <h2 >{{__('Linked products')}}</h2>
                         </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-container">
                             
                            <!-- product tab content start -->
                            <div class="last-product">
                                <div class="products tab-pane fade show active" id="tab1">
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    @foreach( $products as $product)
                                        <!-- product item start -->
                                        <div class="product text-center mb-4">
                                            
                                                <a href="{{route('viewProperty',$product->id)}}">
                                                    <img src="{{asset('/storage/property/'.$product->image)}}" alt="product">
                                                </a>
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
                                                <div class="d-flex align-items-center justify-content-center gap-4">
                                                    
                                                    <p class="text-secondary m-0">{{$product->price}} {{__('AED')}}</p>
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
            </div>
        </section>
    <!--== End Product Area Wrapper ==-->
<!--</section>-->
<!--<div class="modal" id="add-to-cart-modal" tabindex="-2" aria-labelledby="add-to-cart-modal" aria-hidden="true">-->
<!--    <div class="modal-dialog modal-dialog-centered modal-lg">-->
<!--      <div class="modal-content">-->
<!--          <button type="button" class="btn btn-close-it border-0 bi bi-x-circle float-start" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--        <div class="modal-body">-->
<!--<div class="row py-4">-->
<!--    <div class="col-6 text-center vl">-->
<!--        <p class="text-center d-flex align-items-center justify-content-center">-->
<!--<span class="bi bi-check"></span>-->
<!--            تم ارسال الكمية بنجاح-->
<!--        </p>-->
<!--        <img src="{{asset('/storage/property/'.$product->image)}}" alt="panel image">-->
        <!--<img src="images/panels04.png" class="my-2" width="50%" height="auto" alt="panel image">-->
<!--        <ul class="more-details">-->
<!--            <li><span>  {{$product->name}}</li>-->
            <!--<li><span>الكمية</span> : <span>1</span></li>-->
<!--            <li><span>المجموع</span> : <span>   {{$product->price}}</span>د.ك</li>   -->
<!--        </ul>-->
<!--    </div>-->
<!--    <div class="col-6 text-center">-->
<!--        <p>-->
<!--            يوجد-->
<!--            <span> 3</span>-->
<!--             عنصر في سلة التسوق الخاصة بك-->
<!--        </p>-->
<!--        <p>-->
<!--            <span>المجموع</span> : <span>30</span>د.ك-->
<!--        </p>-->
<!--        <button class="btn btn-outline-primary w-100 my-2">عرض سلة المشتريات</button>-->
<!--        <button class="btn btn-primary w-100 my-2">المتابعة لإتمام الشراء</button>-->
<!--    </div>-->
<!--</div>-->
            
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->

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
</script>
@endpush

