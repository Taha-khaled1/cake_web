<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>  A elle :: dashboard  </title>
    <link rel="icon" href="{{ url('/') }}/cp/favicon.ico" type="image/x-icon"> <!-- Favicon-->
    @notifyCss
    <style>
      body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
      }
      h1 {
        color: #333;
        text-align: center;
        margin-top: 50px;
        margin-bottom: 30px;
      }
      .select-wrapper {
        position: relative;
        display: inline-block;
        vertical-align: middle;
        margin: 0 auto;
        max-width: 400px;
      }
      select {
        width: 100%;
        height: 40px;
        padding: 8px 15px;
        background-color: #fff;
        border: none;
        border-radius: 5px;
        box-shadow: 0 0 0 2px #ddd;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        font-size: 16px;
        color: #333;
        cursor: pointer;
      }
      select:focus {
        outline: none;
        box-shadow: 0 0 0 2px #007bff;
      }
      .select-arrow {
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 6px 6px 0 6px;
        border-color: #333 transparent transparent transparent;
        pointer-events: none;
      }
    </style>
    <style>
      body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
      }
      h1 {
        color: #333;
        text-align: center;
        margin-top: 50px;
        margin-bottom: 30px;
      }
      .checklist {
        background-color: #fff;
        border-radius: 5px;
        padding: 20px;
        margin: 0 auto;
        max-width: 600px;
      }
      .checklist-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
      }
      .checklist-item input[type="checkbox"] {
        margin-right: 10px;
      }
      .checklist-item label {
        font-size: 18px;
        color: #333;
        flex-grow: 1;
        cursor: pointer;
        transition: color 0.2s ease-in-out;
      }
      .checklist-item label:hover {
        color: #007bff;
      }
    </style>
    <!-- plugin css file  -->
    <style>
    
    
    
    
    .container {
  margin: 20px auto;
  padding: 20px;
  max-width: 900px;
  font-size: 16px;
  line-height: 1.5;
}

.order-title {
  text-align: center;
  font-size: 24px;
  margin-bottom: 30px;
}

.order-details,
.order-address {
  margin-bottom: 50px;
}

.address-title {
  font-size: 20px;
  margin-bottom: 20px;
}

.order-address p {
  margin-bottom: 10px;
}

.order-address hr {
height: 1px;
background-color: #ccc;
border: none;
margin: 20px 0;
}
    
    
    
    
    
    .button-container {
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