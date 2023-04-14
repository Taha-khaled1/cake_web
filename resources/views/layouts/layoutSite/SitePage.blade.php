<!doctype html>
<html class="no-js" lang="{{ LaravelLocalization::getCurrentLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$site_name}}</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/img/LOGOM.png' )}}">
    @notifyCss
    
    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/assets/new_assets/css/bootstrap.css' )}}">
    <!-- font awesome  -->
    <link rel="stylesheet" href="{{asset('/assets/new_assets/css/all.min.css' )}}">
    <!-- Pe-icon-7-stroke CSS -->
    <link rel="stylesheet" href="{{asset('/assets/css/vendor/pe-icon-7-stroke.css' )}}">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="{{asset('/assets/css/vendor/font-awesome.min.css' )}}">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="{{asset('/assets/css/plugins/slick.min.css' )}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('/assets/css/plugins/animate.css' )}}">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="{{asset('/assets/css/plugins/nice-select.css' )}}">
    <!-- jquery UI css -->
    <link rel="stylesheet" href="{{asset('/assets/css/plugins/jqueryui.min.css' )}}">
    <link rel="stylesheet" href="{{asset('/assets/new_assets/css/swiper-bundle.min.css' )}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--== Main Style CSS ==--> 
    @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
    <!-- <link href="{{asset('/assets/css/stylertl.css?'. time() )}}" rel="stylesheet" /> -->
    <link href="{{asset('/assets/new_assets/css/style.css?'. time() )}}" rel="stylesheet" />
    <link href="{{asset('/assets/new_assets/css/sign-in.css?'. time() )}}" rel="stylesheet" />
    <link href="{{asset('/assets/new_assets/css/bag.css?'. time() )}}" rel="stylesheet" />
     @else
     <link href="{{asset('/assets/new_assets/css/style.css?'. time() )}}" rel="stylesheet" />
    <link href="{{asset('/assets/new_assets/css/sign-in.css?'. time() )}}" rel="stylesheet" />
    <link href="{{asset('/assets/new_assets/css/bag.css?'. time() )}}" rel="stylesheet" />
    <link href="{{asset('/assets/css/style.css' )}}" rel="stylesheet" />
    @endif
    

    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
 
    @include('layouts.layoutSite.Header')
    <main>
     <x:notify-messages/>
      @yield('content')   
      <div class="services">
            
            <h2 class="text-center">{{ __('Our services') }}</h2>
            <div class="row">
                <div class="service text-center col-lg-3 col-6">
                    <i class="far fa-credit-card fs-3"></i>
                    <h3 class="text-center">{{__('Delivery Service')}}</h3>
                    <p>{{__('All orders will be delivered as soon as possible')}}</p>
                </div>
                <div class="service text-center col-lg-3 col-6">
                    <i class="fas fa-user-friends fs-3"></i>
                    <h3 class="text-center">{{__('Customers service')}}</h3>
                    <p>{{__('We receive your inquiries and comments via WhatsApp')}}</p>
                </div>
                <div class="service text-center col-lg-3 col-6">
                    <i class="far fa-heart fs-3"></i>
                    <h3 class="text-center">{{__('The quality')}}</h3>
                    <p>{{__('We have many different products')}}</p>
                </div>
                <div class="service text-center col-lg-3 col-6">
                    <i class="far fa-credit-card fs-3"></i>
                    <h3 class="text-center">{{__('Payment service is safe')}}</h3>
                    <p>{{__('Paying online is very safe')}}<span>100%</span></p>
                </div>
            </div>
                
        </div>
    </main>

    {{-- <a href="https://wa.me/971542005030" target="_blank"> --}}
        <div class="floating-action-button bg-success d-inline-block text-center rounded-circle position-fixed dropdown-toggle" id="dropdownMenuButton255" data-bs-toggle="dropdown2" aria-expanded="false">
            <i class="fa fa-whatsapp text-light fs-3 w-100 h-100" style="  cursor: pointer;   transform: translateY(-14px);"></i>
            <div class="dropdown2">
                <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton255" style="bottom: 75px">
                  <div class="form-group text-end">
                    <textarea class="form-control w-100 mess" placeholder="رسالتك هنا"></textarea>
                    <a href="https://wa.me/971543014035" target="_blank" class="bg-success rounded-circle text-light text-decoration-none send fs-6"><i class="fa fa-paper-plane"></i></a>
                  </div>
                </div>
              </div>
        </div>
    {{-- </a> --}}
  @include('layouts.layoutSite.Footer')
  <!--Start of Tawk.to Script-->
 
<!--End of Tawk.to Script-->
  @notifyJs
  <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

    <!-- Modernizer JS -->
    <script src="{{asset('/assets/js/vendor/modernizr-3.6.0.min.js' )}}"></script>
    <!-- jQuery JS -->
    <script src="{{asset('/assets/js/vendor/jquery-3.6.0.min.js' )}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('/assets/js/vendor/bootstrap.bundle.min.js' )}}"></script>
    <!-- slick Slider JS -->
    <script src="{{asset('/assets/js/plugins/slick.min.js' )}}"></script>
    <!-- Countdown JS -->
    <script src="{{asset('/assets/js/plugins/countdown.min.js' )}}"></script>
    <!-- Nice Select JS -->
    <script src="{{asset('/assets/js/plugins/nice-select.min.js' )}}"></script>
    <!-- jquery UI JS -->
    <script src="{{asset('/assets/js/plugins/jqueryui.min.js' )}}"></script>
    <!-- Image zoom JS -->
    <script src="{{asset('/assets/js/plugins/image-zoom.min.js' )}}"></script>
    <!-- Images loaded JS -->
    <script src="{{asset('/assets/js/plugins/imagesloaded.pkgd.min.js' )}}"></script>
    <!-- mail-chimp active js -->
    <script src="{{asset('/assets/js/plugins/ajaxchimp.js' )}}"></script>
    <!-- contact form dynamic js -->
    <script src="{{asset('/assets/js/plugins/ajax-mail.js' )}}"></script>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <!-- google map active js -->
    <script src="{{asset('/assets/js/plugins/google-map.js' )}}"></script>
    <!-- Main JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('/assets/js/main.js' )}}"></script>
<!--======================================== start Script section  ==================================================-->
    <script src="{{asset('/assets/new_assets/JS/bootstrap.js')}}"></script>
    <script src="{{asset('/assets/new_assets/JS/popper.min.js')}}"></script>
    <script src="{{asset('/assets/new_assets/JS/swiper-bundel.min.js')}}"></script>
    
    <script src="{{asset('/assets/new_assets/JS/main.js')}}"></script>
    <!--======================================== end Script section  ==================================================-->

  @stack('js')
  <script>

    $(".mess").on("input",function(){
        if($.trim($('.mess').val()).length>0){
            $(".send").attr("href",`https://wa.me/971543014035?text=${$(".mess").val()}`)
        }else{
            $(".send").attr("href",`https://wa.me/971543014035`)
        }
    })
  
$('#subscriber_btn').on('click' , function (e) {
            
           // $(document).find('#errsu').remove();
            e.preventDefault();
             $('#errsu').remove();
            $.ajax({
                type: "post",
                url: "{{ route('subscriber') }}",
                data: $("#subscriber").serialize(),
                dataType: 'json',              // let's set the expected response format
                success: function (data) {
                    //console.log(data);
                    $('#success_message_subscriber').fadeIn().html('<div class="text-success border-0">' + data.message +'</div>');
                    // document.body.scrollTop = document.documentElement.scrollTop = 0;
                    document.getElementById('a1').value = '';
                   


                },
                error: function (err) {
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                         
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                           //el.nextAll().remove();
                           $('#success_message_subscriber').fadeIn().html('<div class="text-danger border-0"> '+ error[0] +'</div>');

                            
                        });
                    }
                }
            });

        });
</script>
<script>
        $('.top-head .dropdown-toggle').on("click", function () {
            $('.top-head .dropdown-menu').toggle(500);
        });
        $('.floating-action-button .fa-whatsapp').on("click", function () {
            $('.floating-action-button .dropdown-menu').toggle(500);
        });
        var value = parseInt(document.getElementById("weight").value)
        $(".dec.qtybtn").on("click",function(){
            if(value > 0){
                value = value - 1 ;
                $("#weight").val(value +" "+ "كيلو");
            }
        })
        $(".inc.qtybtn").on("click",function(){
            value +=1;
            $("#weight").val(value +" "+ "كيلو");
        })
    </script>
  </body>
  </html>