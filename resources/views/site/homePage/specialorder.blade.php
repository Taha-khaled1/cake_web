@extends('layouts.layoutSite.SitePage')
 

@section('content')
<link href="{{asset('/assets/new_assets/css/special.css?'. time() )}}" rel="stylesheet" />
<!-- start breadcrumb -->

<!-- end breadcrumb -->
<section class="container" dir="{{LaravelLocalization::getCurrentLocaleDirection()}}" >
    <div class="order text-center bg-light p-3">
            {{-- <h3 class=""> 
            {{__('Address')}}  
             </h3> --}}
            <form action="{{route('storespecialorder')}}" method="post" enctype="multipart/form-data">
            @csrf
                {{-- <div class="mb-3">
                    @error('name')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                    <input type="text" name="name" class="form-control" id="full-name" placeholder="{{__('Full Name')}}" value="@if(isset($address)){{$address->name}}@else{{old('name')}}@endif" maxlength="100" required >
                  </div> --}}
                  {{-- <div class="mb-3">
                    @error('email')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                    <input type="email" name="email" class="form-control" id="email-address" placeholder="{{__('Email')}}" value="@if(isset($address)) {{$address->email}} @else {{old('email')}}  @endif" maxlength="100" required>
                  </div> --}}
                  {{-- <div class="my-3">
                    @error('area')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                  <select name="area" class="form-control" aria-label="Default select example" maxlength="100" required >
                  <option value=""> {{__('Choose the region')}}</option>  
                  @if(isset($address)) 
                  <option selected value=" {{$address->area}} "> {{$address->area}} </option>
                  @elseif(old('area')) 
                  <option selected value=" {{old('area')}} "> {{old('area')}} </option>
                  
                  @endif
                    @foreach($cities as $ca)
                    <option value="{{$ca->name}}"> {{$ca->name}}</option>
                    @endforeach
                  </select> <br>
                </div> --}}
                {{-- <div class="mb-3">
                    <input type="text" name="Blve" class="form-control" id="أدخل رقم الجادة" placeholder="{{__('Region')}}" value="@if(isset($address)){{$address->Blve}}@else{{old('Blve')}}@endif">
                  </div>
                <div class="mb-3">
                    @error('street')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                    <input type="text" name="street" placeholder="{{__('Street')}}" class="form-control" id="street" value="@if(isset($address)){{$address->street}}@else{{old('street')}}@endif" maxlength="100"   >
                  </div> --}}
                  
                  {{-- <div class="mb-3">
                    <input type="text" name="house" placeholder=" {{__('Apartment/House')}}" class="form-control" id="flat" value="@if(isset($address)){{$address->house}}@else{{old('house')}}@endif" maxlength="100"  >
                  </div> --}}
                  {{-- <div class="mb-3">
                    @error('phone')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                    <input placeholder="{{__('Mobile number')}}" type="text" name="phone" class="form-control" id="mobile-number" value="@if(isset($address)){{$address->phone}}@else{{old('phone')}}@endif" maxlength="100" required>
                  </div>  --}}
                      
                  {{-- <div class="my-2 text-end">
                    <input class="form-check-input" type="checkbox" value="" id="accept-terms"  required >
                    <label for="accept-terms">
                            {{__('I agree to the terms and conditions')}}
                    </label>
                  </div> --}}
                  <h3>{{__('Your order')}}</h3>

              {{-- <p class="h5 my-3 text-center" >{{__('Your order')}}</p> 
              <hr> --}}
                    {{-- <label for="choose-region"  > {{__('Choose the flavor')}}</label><br> --}}
                  @error('flavor')
                  <small class="form-text text-danger">{{$message}}</small>
                  @enderror
                  <select name="flavor" class="" aria-label="Default select example" maxlength="100" required >
                  <option value=""> {{__('Choose the flavor')}}</option> 
                  @if(old('flavor')) 
                  <option selected value=" {{old('flavor')}} "> {{old('flavor')}} </option>
                  @endif
                    @foreach($flavors as $ca)
                    <option value="{{$ca->name}}">@if($ca->name_en != null)
                                    @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                    {{$ca->name}}
                                    @else
                                    {{$ca->name_en}}
                                    @endif @else
                                    {{$ca->name}}
                                    @endif</option>
                    @endforeach
                  </select> 
                    {{-- <label for="choose-region"  > {{__('Choose the Weight')}}</label><br> --}}
                    @error('Weight')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                  <!-- <select name="Weight" class="form-control" aria-label="Default select example" maxlength="100" required > -->
                    <div class="flex gap-3 w-100 align-items-center">
                      <h6>{{ __('Select Size') }}</h6>
                      <div class="d-flex gap-3 size pro-qty">
                        <input type="text" name="quantity" value="1" style="width:25px;">
                      </div>
                    </div>

                    <input name="Weight" type="text" class="d-none" value="1" id="weight">



                    {{-- <option value=""> {{__('Choose the Weight')}}</option> 
                    @if(old('Weight')) 
                    <option selected value=" {{old('Weight')}} "> {{old('Weight')}} </option>
                    @endif
                    @foreach($weights as $ca)
                      <option value="{{$ca->name}}">
                        @if($ca->name_en != null)
                          @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                          {{$ca->name}}
                          @else
                          {{$ca->name_en}}
                          @endif @else
                          {{$ca->name}}
                        @endif
                      </option>
                    @endforeach --}}
                  </select>

                    <hr>
                    <div class="row justify-content-between my-2" >
                                       
                    <h6 class="col-6 text-end" >{{__('Add image')}}</h6>
                    
                    @error('main_image')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                    <input class="col-6" type="file" name="main_image" accept="image/*"  onchange="readURL(this);" value="{{old('main_image')}}" />  
                    <img id="blah" src="#" style="display:none" />
 
                    
                </div> 

                <div class="row justify-content-between my-2" >
                                      
                  <h6 class="col-6 text-end">{{__('Add a design')}}</h6>
                  @error('design')
                  <small class="form-text text-danger">{{$message}}</small>
                  @enderror
                  <input class="col-6" type="file" name="design" value="{{old('design')}}" />  

                  </div> 
                  <div class="mb-3">
                    {{-- <label for="add-nots"  > {{__('Message on the cake')}}</label> --}}
                    <textarea class="w-100 mt-5 text-end p-2" name="nots" id="add-nots" cols="30" maxlength="300"  rows="5" placeholder="{{__('Message on the cake')}}"></textarea>
                  </div>
                  
                  <div class="text-center" >
                      {{-- @if (auth()->user())
                        <input id="main" type="submit" class="btn btn-secondary" value=" {{__('Send order')}} ">
                      @endif --}}
                  <div id="btn_div">
                    <!-- Button trigger modal -->
                    @if (auth()->user())
                        @php
                         $address=\App\Models\Address::where('user_id',auth()->user()->id)->count();
                        @endphp
                        @if ($address==0)
                          <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                            {{__('Send order')}} 
                        </button>
                        @else
                          <input id="main" type="submit" class="btn btn-secondary" value=" {{__("Send order")}} ">
                        @endif

                    @else
                      
                        <button id="login" type="button" class="btn btn-secondary" data-bs-toggle="modal" 
                          data-bs-target="#staticBackdrop">
                          {{__('Send order')}} 
                        </button>
                     
                    @endif
                  </div>
                    
                    {{-- <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                       {{__('Send order')}} 
                    </button> --}}
                  </form> 
  
          <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop2Label" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">

                    <div class="modal-header justify-content-between px-4">
                      <h5 class="modal-title" id="staticBackdropLabel">{{ __('Add an address') }}</h5>
                      <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close" id="close-add-address"></button>
                    </div>
                    <!-- Modal -->
                    <div class="modal-body px-4">
                      <h3 class="mb-4"></h3>
                      <form id="address_form" onsubmit="return handleAddAddress(event)" method="POST" >
                        @csrf
                        <div class="mb-3">
                          <input type="text" required name="name" placeholder="{{__('Name')}}">
                        </div>
                        <div class="mb-3">
                          <input type="text" required name="email" placeholder="{{__('Email')}}">
                        </div>
                        <select required name="area" id="region">
                          <option value="1" selected disabled>{{ __('Choose the region') }}</option>
                          @foreach ($cities as $city)
                                <option value="{{ $city->name }}">{{ $city->name }}</option>
                            @endforeach
                         
                        </select>
                        <div class="mb-3">
                          <input required type="text" name="street" placeholder="{{ __('Street') }}">
                        </div>
                        <div class="mb-3">
                          <input required type="text" name="Blvd" placeholder="{{ __('Blvd') }}">
                        </div>
                        <div class="mb-3">
                          <input required type="text" name="house" placeholder="{{ __('Apartment/House') }}">
                        </div>
                        <div class="mb-3">
                          <input required type="text" name="phone" placeholder="{{ __('Mobile number') }}">
                        </div>
                        <div class="w-100 text-center">
                          <button class="w-50 btn btn-outline-secondary" type="submit"> {{ __('Add an address') }}</button>
                        </div>
                      </form>
                    </div>

                  </div>
              </div>
          </div>
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">

                    <div class="modal-header justify-content-between px-4">
                      <h5 class="modal-title" id="staticBackdropLabel">{{ __('Login') }}</h5>
                      <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close" id="close-login"></button>
                    </div>
                    <!-- Modal -->
                    <div class="modal-body px-4">
                      <h3 class="mb-4">{{ __('Please login first') }}</h3>
                      <form id="login_form" onsubmit="return handleLogin(event)" method="POST">
                        @csrf
                        <div class="mb-3">
                          <input type="text" required name="email" placeholder="{{__('Email')}}">
                        </div>
                        <div class="mb-3">
                          <label id="hidden_label" style="color: red" for="">{{ __('The password or email does not match our records.') }}</label>
                          <input type="password" required name="password" placeholder="{{__('Password')}}">
                        </div>
                        <div class="w-100 text-center">
                          <button class="btn btn-secondary" type="submit">{{ __('Login') }}</button>
                        </div>
                      </form>
                    </div>

                  </div>
              </div>
          </div>

        </div>
    </div>
</section>

@stop

@push('js')  
 
<script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').show()
                        .attr('src', e.target.result)
                        .width(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function handleAddAddress(event) {
          event.preventDefault();
          // document.getElementById("close-add-address").click();
        }

        function handleLogin(event) {
          event.preventDefault()
          // document.getElementById("close-login").click();
        }

        
 </script>

 <script>
    $(document).ready(function(){
      $('#hidden_label').hide();
      $('#login_form').on('submit',function(e){
        $('#hidden_label').hide();
        var data=$('#login_form').serialize();
        e.preventDefault();
        $.ajax({
          'url':'{{ Route("ajax.login") }}',
          'type':'post',
          'data':data,
          success:function(response){
            
            if(response.status=='success'){
              document.getElementById("close-login").click();
              $('#hidden_label').hide();
              if(response.address=='0'){
                $('#btn_div').html(` <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                       {{__('Send order')}} 
                    </button>`);
              }else{
                $('#btn_div').html('<input id="main" type="submit" class="btn btn-secondary" value=" {{__("Send order")}} ">');
              }
            }else{
              $('#hidden_label').show();
            }
          }
        });
      });

      $('#address_form').on('submit',function(e){
        var data=$('#address_form').serialize();
        e.preventDefault();
        $.ajax({
          'url':'{{ Route("ajax.address") }}',
          'type':'post',
          'data':data,
          success:function(response){
            
            if(response.status=='success'){
              document.getElementById("close-add-address").click();
              $('#btn_div').html('<input id="main" type="submit" class="btn btn-secondary" value=" {{__("Send order")}} ">');
            }else{
              alert('error');
            }
          }
        });
      });

    });
 </script>
    
    @endpush

