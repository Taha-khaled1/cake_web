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
                                                    <h5 class="met-user-name"> رقم الطلب #{{$order->id}} </h5>
                                                    <a href="{{ route('admin.sorder.shipping', $order->id)}}">
                                         @if($order->status == 1)
                                                                <button type="submit" class="btn btn-primary"> شحن</button>@endif
                                                               </a><hr>
                                                                 <a href="{{ route('admin.sorder.cancel', $order->id)}}">
                                         @if($order->status >= 1)
                                                                <button type="submit" class="btn btn-danger"> الغاء الطلب</button>@endif
                                                               </a>
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-4 ms-auto align-self-center">
                                            <ul class="list-unstyled personal-detail mb-0">
                                                
                                               
                                            </ul>

                                        </div><!--end col-->
                                     
                                    </div><!--end row-->
                                </div><!--end f_profile-->
                            </div><!--end card-body-->


                            <div class="card-body">
                            <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#Post" role="tab"
                                           aria-selected="true">تفاصيل الطلب</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#Settings" role="tab"
                                           aria-selected="false">العنوان</a>
                                    </li>
                                </ul>

                            <div class="tab-content">
                              <div class="tab-pane p-3 active" id="Post" role="tabpanel">
                                <div class="table-responsive">
                                 <table id="example" class="table table-striped table-bordered" style="width:90%;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>النكهة</th>
                                        <th>الوزن</th> 
                                        <th> الحالة </th>
                                        <th>الكتابة</th>
                                        <th>الصورة</th>
                                        <th>التصميم </th>
                                        
                                 
                                    </tr>
                                    </thead>
                                    <tbody>
                                     <tr >
                                       <td>  </td>
                                       <td>  {{$order->flavor}} </td>
                                        <td>   {{$order->Weight}} </td>
                                        
                                        <td >@if($order->status == 1) <span class="badge bg-info">طلب جديد</span>
                                        @elseif($order->status == 2) <span class="badge bg-primary">تم الشحن</span>
                                        @elseif($order->status == 3) <span class="badge bg-success">تم التسليم</span>
                                        @else <span class="badge bg-danger">طلب ملغي</span>
                                        @endif</td>
                                        <td>   {{$order->nots}} </td>
                                        <td>    @if($order->img)
                                        <img src="{{asset('/storage/property/'.$order->img)}}"   alt="{{$order->id}}" width="200">
                                        @endif  </td>
                                                                <th >   @if($order->design)
                                        <img src="{{asset('/storage/property/'.$order->design)}}"   alt="{{$order->id}}" width="200">
                                        @endif  </th>
                    
                                        </tr> 
                                    </tbody>
                                 </table>
                               
                                 </div>
                                 </div>
                                 <div class="tab-pane p-3" id="Settings" role="tabpanel">
                                        <div class="row">
                                        <div class="card">
                                         
                                        <div class="form-group mb-6 row">
                                                <label class="col-xl-1 col-lg-1 mb-lg-0 form-label">الاسم  </label>
                                                <div class="col-lg-9 col-xl-8">
                                                <label  > {{$address->name}} </label>

                                                </div>
                                            </div> 
                                            <div class="form-group mb-6 row">
                                                <label class="col-xl-1 col-lg-1 mb-lg-0 form-label">الايميل   </label>
                                                <div class="col-lg-9 col-xl-8">
                                                <label  > {{$address->email}} </label>

                                                </div>
                                            </div> 
                                            <div class="form-group mb-6 row">
                                                <label class="col-xl-1 col-lg-1 mb-lg-0 form-label">المنطقة  </label>
                                                <div class="col-lg-9 col-xl-8">
                                                <label  > {{$address->area}} </label>

                                                </div>
                                            </div> 
                                            <div class="form-group mb-6 row">
                                                <label class="col-xl-1 col-lg-1 mb-lg-0 form-label">الشارع  </label>
                                                <div class="col-lg-9 col-xl-8">
                                                <label  > {{$address->street}} </label>

                                                </div>
                                            </div> 
                                            <div class="form-group mb-6 row">
                                                <label class="col-xl-1 col-lg-1 mb-lg-0 form-label">الجادة  </label>
                                                <div class="col-lg-9 col-xl-8">
                                                <label  > {{$address->Blvd}} </label>

                                                </div>
                                            </div> 
                                            <div class="form-group mb-6 row">
                                                <label class="col-xl-2 col-lg-2 mb-lg-0 form-label">الشقة\المنزل  </label>
                                                <div class="col-lg-9 col-xl-8">
                                                <label  > {{$address->house}} </label>

                                                </div>
                                            </div> 
                                            <div class="form-group mb-6 row">
                                                <label class="col-xl-1 col-lg-1 mb-lg-0 form-label">رقم الهاتف  </label>
                                                <div class="col-lg-9 col-xl-8">
                                                <label  > {{$address->phone}} </label>

                                                </div>
                                            </div> 
                                            @if($order->nots)<hr>
                                 <div class="form-group mb-6 row">
                                                <label class="col-xl-1 col-lg-1 mb-lg-0 form-label">ملاحظات  </label>
                                                <div class="col-lg-9 col-xl-8">
                                                <label  > {{$order->nots}} </label>

                                                </div>
                                            </div> @endif
                                            </div>

                                            </div><!--end col-->
                                        </div><!--end row-->
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