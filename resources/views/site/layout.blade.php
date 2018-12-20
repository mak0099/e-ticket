<!DOCTYPE html>
<html lang="en-US">

    <!-- Mirrored from html.physcode.com/travel/home-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Nov 2017 08:56:50 GMT -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="xmlrpc.html">
        <title> Find Ticket</title>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
        <link rel="stylesheet" href="{{asset('public/site/assets/css/bootstrap.min.css')}}" type="text/css" media="all">
        <link rel="stylesheet" href="{{asset('public/site/assets/css/font-awesome.min.css')}}" type="text/css" media="all">
        <link rel="stylesheet" href="{{asset('public/site/assets/css/flaticon.css')}}" type="text/css" media="all">
        <link rel="stylesheet" href="{{asset('public/site/assets/css/font-linearicons.css')}}" type="text/css" media="all">
        <link href="{{asset('public/site/assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="{{asset('public/site/assets/css/travel-setting.css')}}" type="text/css" media="all">
        <link rel="shortcut icon" href="{{asset('public/site/images/favicon.png')}}" type="image/x-icon">
        <!-- Bus Seat Portal -->
        <link rel="stylesheet" type="text/css" href="{{asset('public/site/assets/plugins/bus_seat_portal/css/jquery.seat-charts.css')}}">
        <link href="{{asset('public/site/assets/plugins/bus_seat_portal/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
        <!-- Bus Seat Portal End -->
        <!--date picker-->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- <link rel="stylesheet" href="https://resources/demos/style.css')}}"> -->
        <script src="{{asset('public/site/assets/plugins/bus_seat_portal/js/jquery-1.11.0.min.js')}}"></script>
        <script src="{{asset('public/site/assets/plugins/bus_seat_portal/js/jquery.seat-charts.js')}}"></script>
    </head>
    <body>
        <div class="wrapper-container">
            @include('site.partials.header')
            @yield('content')
            @include('site.partials.footer')
            @include('site.partials.newsletter')
        </div>
        <script type='text/javascript' src="{{asset('public/site/assets/js/bootstrap.min.js')}}"></script>
        <script type='text/javascript' src="{{asset('public/site/assets/js/vendors.js')}}"></script>
        <script type='text/javascript' src="{{asset('public/site/assets/js/owl.carousel.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/site/assets/js/jquery.mb-comingsoon.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/site/assets/js/waypoints.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/site/assets/js/jquery.counterup.min.js')}}"></script>
        <script type='text/javascript' src="{{asset('public/site/assets/js/theme.js')}}"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!--date picker-->

        
@yield('script')
    </body>
</html>