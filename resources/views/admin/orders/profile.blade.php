@extends('layouts.admin.main')

@section('content')


    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                             
                            <h4 class="page-title">معلومات عن الطلب</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>
               @include('layouts.success')
                @include('layouts.error')
                

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="met-profile">
                                    <div class="row">
                                        <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                            <div class="met-profile-main">
                                                <div class="met-profile-main-pic">
                                                   
                                                </div>
                                                <div class="met-profile_user-detail">
                                                    <h5 class="met-user-name"> رقم الطلب #{{$order->number}} </h5>

                                                    
                                                    <div style="display: flex; margin-top: 20px;">
                                                        <a href="{{ route('admin.order.shipping', $order->id)}}">
                                                          @if($order->status == 1)
                                                            <button type="submit" class="btn btn-primary">شحن</button>
                                                          @endif
                                                        </a>
                                                        <hr style="margin: 0 10px;">
                                                        <a href="{{ route('print', $order->id)}}">
                                                          @if($order->status == 1)
                                                            <button type="submit" class="btn btn-primary">طباعه</button>
                                                          @endif
                                                        </a>
                                                        <hr style="margin: 0 10px;">
                                                        <a href="{{ route('admin.order.cancel', $order->id)}}">
                                                          @if($order->status >= 1)
                                                            <button type="submit" class="btn btn-danger">الغاء الطلب</button>
                                                          @endif
                                                        </a>
                                                      </div>
                                                      
                                                               
                                                           
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-4 ms-auto align-self-center">
                                            <ul class="list-unstyled personal-detail mb-0">
                                                
                                                <li class="mt-2"> 
                                                    <b> عدد المنتجات </b> : {{ $order->items->count() }}</li>
                                                        
                                                <li class="mt-2"> 
                                                    <b>  المجموع الجزئي   </b> :   {{ $order->total + $order->discount - $order->shipping}} د.إ
                                                </li>
                                               <li class="mt-2"> 
                                                    <b>الشحن</b> : {{$order->shipping}} د.إ
                                                </li>
                                                @if($order->discount > 0)
                                                <li class="mt-2"> 
                                                    <b>الخصم</b> :   {{ $order->discount}} د.إ
                                                </li>
                                                @endif
                                                <li class="mt-2"> 
                                                    <b> المجموع الكلي </b> :   {{ $order->total}} د.إ
                                                </li>
                                                                                      
                                                <li class="mt-2"> 
                                                    <b> طريقة الدفع </b>  :    @if($order->payment_method == "cash")
                                                                                الدفع عند الاستلام
                                                                                @else
                                                                                بطاقة ائتمان
                                                                                @if($order->payment )
                                                    @if($order->payment->status == 'pending' )                                                                              
                                                    <span class="badge bg-primary"> في انتظار الدفع</span>
                                                    @elseif($order->payment->status == 'completed')
                                                    <span class="badge bg-success">  تم الدفع</span>
                                                    @elseif($order->payment->status == 'failed')
                                                    <span class="badge bg-danger"> تم الغاء الدفع</span>
                                                    @else
                                                    <span class="badge bg-danger"> فشل الدفع</span>
                                                    @endif
                                                    @endif  @endif
                                                </li>
                                            </ul>

                                        </div><!--end col-->
                                     
                                    </div><!--end row-->
                                </div><!--end f_profile-->
                            </div><!--end card-body-->


                            <div class="container">
                                <h2 class="order-title">{{$order->title}}</h2>
                                <div class="order-details">
                                  <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>اسم المنتج</th>
                                        <th>صورة المنتج</th>
                                        <th>كمية المنتج</th>
                                        <th>السعر</th>
                                        <th>الاجمالي</th>
                                        <th>الحجم</th>
                                        <th>ملاحظات مع الطلب</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($order->items as $item)
                                      <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->product_name}}</td>
                                        <td>
                                          @if($item->product->image)
                                          <img src="{{asset('/storage/property/'.$item->product->image)}}" alt="{{$item->product->image}}" width="100">
                                          @endif
                                        </td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->product->price}}</td>
                                        <td>{{$item->product->price * $item->quantity}}</td>
                                        <td>{{$item->options}}</td>
                                        <td>{{$item->notes}}</td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>
                                <div class="order-address">
                                  <h4 class="address-title">العنوان / ملاحظات</h4>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <p><strong>الاسم: </strong>{{$address->name}}</p>
                                      <p><strong>الايميل: </strong>{{$address->email}}</p>
                                      <p><strong>المنطقة: </strong>{{$address->area}}</p>
                                      <p><strong>الشارع: </strong>{{$address->street}}</p>
                                    </div>
                                    <div class="col-md-6">
                                      <p><strong>الجادة: </strong>{{$address->Blvd}}</p>
                                      <p><strong>الشقة\المنزل: </strong>{{$address->house}}</p>
                                      <p><strong>رقم الهاتف: </strong>{{$address->phone}}</p>
                                      @if($order->nots)
                                      <hr>
                                      <p><strong>ملاحظات: </strong>{{$order->nots}}</p>
                                      @endif
                                    </div>
                                  </div>
                                </div>
                              </div>
                              



                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </div><!-- container -->


        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->


@endsection
@push('js')
 
@endpush