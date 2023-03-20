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
                                    <li class="breadcrumb-item active" aria-current="page">{{__('Shopping cart')}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<br> --}}
<!-- cart main wrapper start -->
        <div class="content">
            <div class="container">
                        @if($cart->get()->count()== 0 ) <h1>{{__('The cart is empty')}}</h1><br><a href="{{route('viewHomePage')}}">{{__('Home')}}</a>   @else

                            <!-- Cart Table Area -->
                                <table>
                                    <thead>
                                        <tr>
                                            <td >{{__('Image')}}</td>
                                            <td>{{__('Product')}}</td>
                                            <td >{{__('Price')}}</td>
                                            <td>{{__('Quantity')}}</td>
                                            <td >{{__('Remove')}}</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cart->get() as $item)
                                        <tr id="a{{$item->id }}">
                                            <td ><img class="img-fluid" src="{{asset('/storage/property/'.$item->product->image)}}" alt="Product" /></td>
                                            <td ><span href="{{route('viewProperty',$item->product->id)}}"> {{$item->product->name }}  </span></td>
                                            <td ><span>{{ $item->product->price }}  {{__('AED')}}</span></td>
                                            <td >
                                                <div ><input type="text" product_id="{{$item->product->id}}" dataa_id="{{ $item->id }}" dataa_total="{{ $item->quantity * $item->product->price }}" dataa_price="{{ $item->product->price }}"  value="{{ $item->quantity }}" style="width:75px"></div>
                                            </td>
                                             <td ><span class="remove-item" data_id="{{ $item->id }}"  href="javascript:void(0)"><i class="fa fa-trash-o"></i></span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <a class="btn btn-sqr" href="{{route('cartempty')}}" >{{__('Empty the cart')}}</a>
                            <!-- Cart Update Option -->
                                    <p class="text-end me-2">
                                    {{__('Do you have a discount code?')}}
                                    </p>
                                    <!-- <p class="h4">
                                        {{__('Discount code')}}
                                    </p>  -->
                                    <div class="d-flex justify-content-end">
                                        <input type="text" name="code" total="{{$cart->total()}}" class="text-end me-2 d-flex justify-content-end" maxlength="100" required placeholder="{{__('Enter the discount code')}} " >
                                    </div>
                        </div>
                    </div>
                    
                        <div class="prize" >
                            <div class="container">
                                <div class="row justify-content-end">
                                    <div class="col-lg-8 col-md-8 col-sm-10 col-10">
                                        <form action="{{route('indexorder')}}" method="GET" >
                                        @csrf 
                                            <div class="table-responsive">
                                                <table>
                                                    <tr>
                                                        @if(Auth::user())
                                                        <td>{{__('Addresses saved by the user')}}</td>
                                                        <td><select id="frm_country" class="form-control" name="address_id"  >
                                                        <option value=""  > {{__('Choose the region')}}</option>
            
                                                        @foreach(\Illuminate\Support\Facades\Auth::user()->addresses as $address)
            
                                                        <option value="{{$address->id}}" selected>{{$address->name}} / {{$address->area}}</option>
            
                                                        @endforeach
                                                        </select></td>
                                                         
                                                            @endif 
                                                    </tr>
                                                    <tr>
                                                        <td> <div id="totalq" class="d-flex align-items-center justify-content-end gap-2">
                                                            <span>{{__('AED')}}</span>
                                                            <span  id="totals">{{$cart->total()}}</span>
                                                        </div></td>
                                                        <td>{{__('Partial total')}}</td>
                                                    </tr>
                                                    <tr class="total">
                                                        <td class="total-amount"><div class="d-flex align-items-center justify-content-end gap-2">
                                                        <span>{{__('AED')}}</span>
                                                          <span  id="discount"> 0 </span>
                                                          
                                                      </div></td>
                                                        <td>{{__('Discount')}}</td>
                                                    </tr>
                                                       @if($offer >= 1)
                                                       @if($offer <= $cart->total())
                                                    <tr class="total">
                                                        <td>{{__('Free shipping')}}</td>
                                                        <td class="total-amount">{{__('After the price of products exceeds')}} {{$offer}}</td>
                                                    </tr> @endif @endif
                                                </table>
                                            </div>
                                            <input type="text"  name="rate" value="0" style="display:none"   >
                                            <a ><button class="text-white" type="submit">{{__('Continue to complete the purchase')}} </button></a>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
            </div>
        </div>
        <!-- cart main wrapper end -->

@stop

@push('js')  
<script>   
     
   $('.remove-item').on("click", function (e) {
              //  e.preventDefault();
               
         var id = $(this).attr('data_id');
         
         
         $.ajax({
                type: "post",
                url: "/cart/" + id,
                method: "delete",
                data: { _token: '{{ csrf_token() }}'
                     },
                    dataType: 'json',              // let's set the expected response format
                    success: function (data) {
                        $("#a"+ id).remove();
                        $("#totals").remove();
                        $("#totalq").fadeIn().html( '<span id="totals">' + data.totala +'</span> {{__('AED')}}' );
                        $("#totals1").remove();
                        $("#totalq1").fadeIn().html( '<span id="totals1">' + data.totala +'</span> {{__('AED')}}' );
                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#axaa').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });   
          
    });

    
    $('.item-quantity').on("change", function (e) {
              //  e.preventDefault();
               
         var id = $(this).attr('dataa_id');
         var product_id = $(this).attr('product_id');
         var total = $(this).attr('dataa_total') + $(this).attr('dataa_price');
         

         
         $.ajax({
                type: "post",
                url: "/cart/" + id,
                method: "put",
                data: { _token: '{{ csrf_token() }}',
                quantity: $(this).val(),
                product_id: product_id,
                xx: 'x',
                     },
                               // let's set the expected response format
                    success: function (data) {
                        if(data.message == 1){
                              
                            flashBox('error', 'نفذت الكمية');


                        }else{
                        $("#totals").remove();
                        $("#totalq").fadeIn().html( '<span id="totals">' + data.totalx +'</span> {{__('AED')}}' );
                        $("#totals1").remove();
                        $("#totalq1").fadeIn().html( '<span id="totals1">' + data.totalx +'</span> {{__('AED')}}' );
                   
                        }
 
                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#axaa').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });   
          
    });
    $(document).ready(function () {
        $('input[name="code"]').on('change', function () {
            var code = $(this).val();
            var total = $(this).attr('total');

            if (code) {
                $.ajax({
                    url: "{{ URL::to('get_discount') }}/" + code,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#discount').empty(); 
                        $('#discount').append( total * data.rate / 100 );
                        $('input[name="rate"]').val(data.rate / 100);

                        flashBox('success', '{{__('Discount done')}}');

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });

    </script>
     
    @endpush

