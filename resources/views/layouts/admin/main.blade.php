<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>  A elle :: dashboard  </title>
    <link rel="icon" href="{{ url('/') }}/cp/favicon.ico" type="image/x-icon"> <!-- Favicon-->
    @notifyCss

    <!-- plugin css file  -->
    <style>.button-container {
        display: flex;
        gap: 10px;
      }
      .dropdown-menu {
  background-color: #000;
}
.dropdown-toggle {
  background-color: white;
  color: black;
}
      .button {
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
      }
      
      .primary {
        background-color: #4CAF50;
        color: white;
      }
      
      .secondary {
        background-color: #008CBA;
        color: white;
      }
      
      .tertiary {
        background-color: #f44336;
        color: white;
      }
      
      .button:hover {
        transform: translateY(-2px);
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
      }
      
      .button:active {
        transform: translateY(0px);
        box-shadow: none;
      }
      </style>
    <link rel="stylesheet" href="{{ url('/') }}/cp/assets/plugin/datatables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/cp/assets/plugin/datatables/dataTables.bootstrap5.min.css">

    <!-- project css file  -->
    <link rel="stylesheet" href="{{ url('/') }}/cp/assets/css/ebazar.style.min.css">
</head>
<body class="rtl_mode">
    <div id="ebazar-layout" class="theme-">
        
        
    @include('layouts.admin.menu')
        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">
        @include('layouts.admin.nav')



           

            <!-- Body: Body -->
            <x:notify-messages />

            @yield('content')
            <!-- Modal Custom Settings-->
             
            
        </div>
    
    </div>
    @notifyJs

        @stack('js')

    @include('layouts.admin.footer')
    
</body>
</html> 