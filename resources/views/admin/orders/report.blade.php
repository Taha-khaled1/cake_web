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
                            <div class="float-end">

                            </div>
                            <h4 class="page-title">النتائج</h4>
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

                          


                                <div class="tab-content">
                                    <div class="tab-pane p-3 active" id="Post" role="tabpanel">
                                        <div class="table-responsive">
                                            <table id="myDataTable" class="table table-hover align-middle mb-0"
                                                style="width:90%;">
                                                <thead>
                                                    <th>#</th>
                                                    <th>اسم البائع</th>
                                                    <th>اسم المنتج</th>
                                                    <th>حالة المنتج</th>
                                                    <th>عدد بيع المنتج</th>
                                        
                                                    <th>ارباح المنتج</th>
                                                    <th>التاريخ</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $order)
                                                        @foreach ($order->items as $item)
                                                            <tr>
                                                                <td>{{ $order->id }}</td>
                                                                <td> LIMOGES (المالك)</td>
                                                                <td>{{ $item->product_name }}</td>

                                                                <td>فعال</td>

                                                                <td>{{ $item->quantity }}</td>
                                                              
                                                                <td>{{ $item->quantity * $item->price }}</td>
                                                                <td>{{ $order->created_at }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
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

    </div>
    <!-- end page-wrapper -->
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="{{ url('/') }}/cp/assets/bundles/dataTables.bundle.js"></script>


    <script>
        $('#myDataTable')
            .addClass('nowrap')
            .dataTable({
                order: [
                    [0, 'desc']
                ],
                responsive: true,
                columnDefs: [{
                    targets: [-1, -3],
                    className: 'dt-body-right'
                }]
            });

        $('.deletem_b').on("click", function(e) {
            e.preventDefault();

            var id = $(this).attr('deletem_b');


            $.ajax({
                type: "post",
                url: "{{ route('delete_category') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    "id": id
                },
                dataType: 'json', // let's set the expected response format
                success: function(data) {
                    $(".R_category" + data.id).remove();

                },
                error: function(err) {
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                        console.log(err.responseJSON);
                        $('#success_message_notifications').fadeIn().html(
                            '<div class="alert alert-danger border-0 alert-dismissible">' + err
                            .responseJSON.message + '</div>');


                    }
                }
            });

        });

        $(document).on("click", ".deletem_b", function(e) {
            e.preventDefault();
            if (confirm(`  Are you sure? `)) {
                var deletem_b = $(this).attr("deletem_b");
                $.ajax({
                    type: "post",
                    url: "{{ route('admin.order.delete') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: deletem_b,
                    },
                    success: function(data) {
                        if (data.status == true) {


                        }
                        flashBox('success', ' تم الحذف');

                        $(".R_user" + data.id).remove();
                    },
                    error: function(reject) {},
                });
            }
        });
    </script>
@endpush
<!-- end page content -->
