<html lang="{{app()->getLocale()}}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>@yield('title') - {{ sitename()}}</title>

    <link rel="icon" href="{{asset('backend/favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('backend/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('backend/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('backend/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{asset('backend/plugins/morrisjs/morris.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('backend/css/themes/all-themes.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('backend/css/toastr.min.css')}}">




    @stack('css')

</head>

<body class="theme-pink">










<!-- Page Loader -->
   <div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->



<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
   @include('layouts.users.topbar')
</nav>
<!-- #Top Bar -->
<section>
   @include('layouts.users.sidebar')



</section>

<section class="content">

    <div class="container-fluid">
        <div class="row clearfix">


            <div class="col-xl-12 col-md-12 col-sm-12 col-lg-8">

    @yield('content')


            </div>
            @include('layouts.users.right')
        </div>
    </div>
</section>
















<!-- Jquery Core Js -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Select Plugin Js -->
<script src="{{asset('backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{asset('backend/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('backend/plugins/node-waves/waves.js')}}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{asset('backend/plugins/jquery-countto/jquery.countTo.js')}}"></script>

<!-- Morris Plugin Js -->
<script src="{{asset('backend/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('backend/plugins/morrisjs/morris.js')}}"></script>

<!-- ChartJs -->
<script src="{{asset('backend/plugins/chartjs/Chart.bundle.js')}}"></script>

<!-- Flot Charts Plugin Js -->
<script src="{{asset('backend/plugins/flot-charts/jquery.flot.js')}}"></script>
<script src="{{asset('backend/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
<script src="{{asset('backend/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
<script src="{{asset('backend/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
<script src="{{asset('backend/plugins/flot-charts/jquery.flot.time.js')}}"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="{{asset('backend/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('backend/js/admin.js')}}"></script>



<!-- Demo Js -->
<script src="{{asset('backend/js/demo.js')}}"></script>

<script src="{{asset('backend/js/toastr.min.js')}}"></script>
{!! Toastr::message() !!}


<script>

    @if($errors->any())

    @foreach($errors->all() as $error)

    toastr.error('{{$error}}','Error',{
        closeButton:true,
        progressBar:true,
    });
    @endforeach
    @endif

</script>



<script>
    var Auto_refresh = setInterval(function () {
        $('#dd').load('<?php echo url('user/money');?>').fadeIn("slow");
    },1000);

    var Auto_refresh2 = setInterval(function () {
        $('#ddd').load('<?php echo url('user/money');?>').fadeIn("slow");
    },1000);
</script>


@stack('js')

</body>


</html>