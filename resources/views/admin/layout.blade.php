<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>@yield('title')</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        
        @yield('style')
        <!-- Custom CSS -->
        <link href="{{asset('public/admin/dist/css/style.css')}}" rel="stylesheet" type="text/css">
    </head>

    <body>
        <!-- Preloader -->
        <div class="preloader-it">
            <div class="la-anim-1"></div>
        </div>
        <!-- /Preloader -->
        <div class="wrapper theme-1-active pimary-color-pink">
            <!-- Top Menu Items -->
            @include('admin.partials.header')
            <!-- /Top Menu Items -->

            <!-- Left Sidebar Menu -->
            @include('admin.partials.sidebar')
            <!-- /Left Sidebar Menu -->

            <!-- Right Sidebar Menu -->
            @include('admin.partials.sidebar_right')
            <!-- /Right Sidebar Menu -->



            <!-- Main Content -->
            <div class="page-wrapper">
                <div class="container-fluid pt-25">
                    @yield('content')
                </div>

                <!-- Footer -->
                <footer class="footer container-fluid pl-30 pr-30">
                    <div class="row">
                        <div class="col-sm-12">
                            <p>2017 &copy; Shadowhite Animators Limited</p>
                        </div>
                    </div>
                </footer>
                <!-- /Footer -->

            </div>
            <!-- /Main Content -->

        </div>
        <!-- /#wrapper -->

        <!-- JavaScript -->

        <!-- jQuery -->
        <script src="{{asset('public/admin/vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('public/admin/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

        <!-- Data table JavaScript -->
        <!--<script src="{{asset('public/admin/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>-->

        <!-- Slimscroll JavaScript -->
        <script src="{{asset('public/admin/dist/js/jquery.slimscroll.js')}}"></script>

        <!-- Progressbar Animation JavaScript -->
        <script src="{{asset('public/admin/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('public/admin/vendors/bower_components/jquery.counterup/jquery.counterup.min.js')}}"></script>

        <!-- Fancy Dropdown JS -->
        <script src="{{asset('public/admin/dist/js/dropdown-bootstrap-extended.js')}}"></script>

        <!-- Sparkline JavaScript -->
        <!--<script src="{{asset('public/admin/vendors/jquery.sparkline/dist/jquery.sparkline.min.js')}}"></script>-->

        <!-- Owl JavaScript -->
        <!--<script src="{{asset('public/admin/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js')}}"></script>-->

        <!-- Switchery JavaScript -->
        <!--<script src="{{asset('public/admin/vendors/bower_components/switchery/dist/switchery.min.js')}}"></script>-->

        <!-- EChartJS JavaScript -->
        <!--<script src="{{asset('public/admin/vendors/bower_components/echarts/dist/echarts-en.min.js')}}"></script>-->
        <!--<script src="{{asset('public/admin/vendors/echarts-liquidfill.min.js')}}"></script>-->

        <!-- Toast JavaScript -->
        <script src="{{asset('public/admin/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
        @yield('script')
        <!-- Init JavaScript -->
        <script src="{{asset('public/admin/dist/js/init.js')}}"></script>
        
    </body>

</html>
