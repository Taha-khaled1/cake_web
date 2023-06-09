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
                           
                            <h4 class="page-title">النكهات</h4>
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
                            <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#Post" role="tab"
                                           aria-selected="true">النكهات</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#Settings" role="tab"
                                           aria-selected="false"> اضف نكهة  </a>
                                    </li>
                                </ul>

                            <div class="tab-content">
                              <div class="tab-pane p-3 active" id="Post" role="tabpanel">
                                <div class="table-responsive">
                                 <table id="example" class="table table-striped table-bordered" style="width:90%;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>النكهة </th>
                                        <th>العمليات</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($flavors as $c)
                                    <tr class="R_co{{$c->id}}">
                                        <td>{{$loop->iteration}} </td>
                                        <td>{{$c->name}} </td>
                                        <td>  
                                        <a  href=" " class="deletem_b"  deletem_b="{{$c->id}}"><i class="icofont-trash text-danger "></i></a>

                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                 </table>
                                 </div>
                                 </div>
                                 <div class="tab-pane p-3" id="Settings" role="tabpanel">
                                        <div class="row">
                                        <div class="card">
                                        <form name="" method="post" action="{{ route('admin.flavor.save') }}"   enctype= "multipart/form-data" >
                                     @csrf
 
                                        <div class="row">
                                            
                                        <div class="mb-4 pb-10">
                                            <label for="example-text-input" class="col-sm-1 col-form-label text-end">النكهة بالعربي</label>
                                            <div class="col-sm-6 pb-10">
                                                <input class="form-control" name="name" type="text" maxlength="100"  id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="mb-4 pb-10">
                                            <label for="example-text-input" class="col-sm-1 col-form-label text-end">النكهة بالانجليزي</label>
                                            <div class="col-sm-6 pb-10">
                                                <input class="form-control" name="name_en" type="text" maxlength="100"  id="example-text-input">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group mb-3 row">
                                        <div class="col-lg-9 col-xl-8 offset-lg-3">
                                            <button type="submit" class="btn btn-primary">
                                                حفظ
                                            </button>
                                             
                                        </div>
                                        </div>
                                    </form>
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
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

 <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
 <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<script> 
 
 
  $(function () {
        $(document)
            .on("click", ".btn-add", function (e) {
                e.preventDefault();
                var controlForm = $("#myRepeatingFields:first"),
                    currentEntry = $(this).parents(".entry:first"),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);
                newEntry.find("input").val("");
                controlForm.find(".entry:not(:last) .btn-add").removeClass("btn-add").addClass("btn-remove").removeClass("btn-success").addClass("btn-danger").html("-");
            })
            .on("click", ".btn-remove", function (e) {
                e.preventDefault();
                $(this).parents(".entry:first").remove();
                return false;
            });
    });

</script>
 
<script>

$(document).on("click", ".deletem_b", function (e) {
        e.preventDefault();
        if(confirm( `  Are you sure? ` )){
            var deletem_b = $(this).attr("deletem_b");
        $.ajax({
            type: "post",
            url: "{{route('delete_flavor')}}",
            data: {
                _token: "{{csrf_token()}}",
                id: deletem_b,
            },
            success: function (data) {
                if (data.status == true) {
                  
                 
                }
                flashBox('success', ' تم الحذف');

                $(".R_co" + data.id).remove();
            },
            error: function (reject) {},
        });
        }
       
    });
    </script>
@endpush