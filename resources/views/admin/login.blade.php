<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Login | E-Ticket</title>
        <link href="{{asset('public/admin/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('public/admin/dist/css/style.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <!--Preloader-->
        <div class="preloader-it">
            <div class="la-anim-1"></div>
        </div>
        <!--/Preloader-->

        <div class="wrapper pa-0">
            <header class="sp-header">
                <div class="form-group mb-0 pull-right">
                    <span class="inline-block pr-10">Don't have an account?</span>
                    <a class="inline-block btn btn-info  btn-rounded btn-outline" href="signup.html">Sign Up</a>
                </div>
                <div class="clearfix"></div>
            </header>

            <!-- Main Content -->
            <div class="page-wrapper pa-0 ma-0 auth-page">
                <div class="container-fluid">
                    <!-- Row -->
                    <div class="table-struct full-width full-height">
                        <div class="table-cell vertical-align-middle auth-form-wrap">
                            <div class="auth-form  ml-auto mr-auto no-float">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="mb-30">
                                            <h3 class="text-center txt-dark mb-10">Sign In</h3>
                                            <h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>

                                        </div>	
                                        <div class="form-wrap">
                                            <div class="flash-message" >
                                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                                @if(Session::has('alert-' . $msg))

                                                <h6 class="text-{{ $msg }} text-center nonecase-font">{{ Session::pull('alert-' . $msg) }}</h6>
                                                @endif
                                                @endforeach
                                            </div>
                                            <form action="{{route('attempt_login')}}" method="post">
                                                {{csrf_field()}}
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="exampleInputEmail_2">Username</label>
                                                    <input type="text" class="form-control" required="" name="username" placeholder="Enter username" autofocus autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
                                                    <!--<a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="forgot-password.html">forgot password ?</a>-->
                                                    <div class="clearfix"></div>
                                                    <input type="password" class="form-control" required="" name="password" id="exampleInputpwd_2" placeholder="Enter pwd">
                                                </div>

                                                <!--                                                <div class="form-group">
                                                                                                    <div class="checkbox checkbox-primary pr-10 pull-left">
                                                                                                        <input id="checkbox_2" required="" type="checkbox">
                                                                                                        <label for="checkbox_2"> Keep me logged in</label>
                                                                                                    </div>
                                                                                                    <div class="clearfix"></div>
                                                                                                </div>-->
                                                <div class="form-group text-center">
                                                    <button type="submit" class="btn btn-info  btn-rounded">sign in</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->	
                </div>

            </div>
            <!-- /Main Content -->

        </div>
        <!-- /#wrapper -->

        <!-- JavaScript -->

        <!-- jQuery -->
        <script src="{{asset('public/admin/vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('public/admin/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/admin/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js')}}"></script>

        <!-- Slimscroll JavaScript -->
        <script src="{{asset('public/admin/dist/js/jquery.slimscroll.js')}}"></script>

        <!-- Init JavaScript -->
        <script src="{{asset('public/admin/dist/js/init.js')}}"></script>
    </body>
</html>
