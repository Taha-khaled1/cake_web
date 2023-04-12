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
                             
                            <h4 class="page-title">المستخدمين</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>

                <div class="row">
                    
                    <div class="table-responsive">
                    <table id="aaaa" class="table table-hover align-middle mb-0" style="width:90%;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>الايميل</th>
                                        <th>المدينة</th>
                                        <th>الصلاحيه</th>
                                        <th>العمليات</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($mentors as $user)
                                    @if($user->id != 1)
                                    <tr class="R_user{{$user->id}}">
                                        <td>{{$loop->iteration}} </td>
                                        <td>{{$user->fname}} {{$user->lname}} </td>
                                        <td>{{$user->email}} </td>







                                        <td>@if($user->city){{$user->city->name}}@endif </td>







                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle"
                                                    type="button" id="statusDropdown"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    @if ($user->is_admin == 1)
                                                        <span class="badge bg-info">مالك (ادمن)
                                                            @elseif($user->is_admin == 2)
                                                                <span class="badge bg-primary">محاسب</span>
                                                            @elseif($user->is_admin == 3)
                                                                <span class="badge bg-success">موظف (اضافة المنتجات وحذفها)</span>
                                                            @else
                                                                <span class="badge bg-danger">مستخدم</span>
                                                    @endif
                                                </button>
                                                <ul class="dropdown-menu"
                                                    aria-labelledby="statusDropdown">
                                                    <li>
                                                        <form method="POST"
                                                            action="{{ route('update.userl', [$user->id, 1]) }}">
                                                            @csrf <button type="submit"
                                                                class="dropdown-item">مالك (ادمن)</button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form method="POST"
                                                            action="{{ route('update.userl', [$user->id, 2]) }}">
                                                            @csrf <button type="submit"
                                                                class="dropdown-item">محاسب</button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form method="POST"
                                                            action="{{ route('update.userl', [$user->id, 3]) }}">
                                                            @csrf <button type="submit"
                                                                class="dropdown-item">موظف</button></form>
                                                    </li>
                                                    <li>
                                                        <form method="POST"
                                                            action="{{ route('update.userl', [$user->id, 0]) }}">
                                                            @csrf <button type="submit"
                                                                class="dropdown-item">مستخدم</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>


                                        <td>  <a href="{{ route('admin.user.profile', $user->id)}}"><i class="icofont-edit  text-secondary font-20"></i></a>
                                        <a  href=" " class="deletem_b" onclick=" return confirm( `  Are you sure? ` )" deletem_b="{{$user->id}}"> <i class="icofont-trash text-danger font-20"></i></a>
                                        </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                 </table>
                                 </div>
                </div><!--end row-->

            </div><!-- container -->



        </div>
        <!-- end page content -->
    </div>

@endsection
@push('js')
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

<script src="{{ url('/') }}/cp/assets/bundles/dataTables.bundle.js"></script>  

<script>
    
    $('#aaaa')
    .addClass( 'nowrap' )
    .dataTable( {
        responsive: true,
        columnDefs: [
            { targets: [-1, -3], className: 'dt-body-right' }
        ]
    });

$(document).on("click", ".deletem_b", function (e) {
        e.preventDefault();
        var deletem_b = $(this).attr("deletem_b");
        $.ajax({
            type: "post",
            url: "{{route('admin.user.delete')}}",
            data: {
                _token: "{{csrf_token()}}",
                id: deletem_b,
            },
            success: function (data) {
                if (data.status == true) {
                  
                 
                }
                flashBox('success', ' تم الحذف');

                $(".R_user" + data.id).remove();
            },
            error: function (reject) {},
        });
    });
    </script>
    @endpush