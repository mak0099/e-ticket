@extends('admin.layout')
@section('title','Location')
@section('style')
<link href="{{asset('public/admin/vendors/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/admin/vendors/bower_components/datepicker/datepicker3.css')}}" rel="stylesheet" type="text/css">
<!-- Bus Seat Portal -->
<link href="{{asset('public/bus_seat_portal/css/jquery.seat-charts.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/bus_seat_portal/css/style.css')}}" rel="stylesheet" type="text/css">
<!-- Bus Seat Portal End -->
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <h6>Confirm Booking</h6>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    @include('admin.partials.messages')
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="form-wrap">
                                <form method="post" action="{{route('confirm_booking_admin')}}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="control-label mb-10" for="exampleInputuname_1">Name</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="icon-user"></i></div>
                                            <input type="text" class="form-control" id="exampleInputuname_1" placeholder="Name" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10" for="exampleInputEmail_1">Email address</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                            <input type="email" class="form-control" id="exampleInputEmail_1" placeholder="Enter email" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10" for="exampleInputpwd_1">Phone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="icon-phone"></i></div>
                                            <input type="tel" class="form-control" id="exampleInputpwd_1" placeholder="Enter phone" name="phone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10">Gender</label>
                                        <div>
                                            <div class="radio">
                                                <input type="radio" name="gender" id="radio_1" value="1" checked="">
                                                <label for="radio_1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <input type="radio" name="gender" id="radio_2" value="0">
                                                <label for="radio_2">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success mr-10">Submit</button>
                                    <a href="#" class="btn btn-default">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<!-- Bus Seat Portal -->
<script src="{{asset('public/bus_seat_portal/js/jquery-1.11.0.min.js')}}"></script>
<script src="{{asset('public/bus_seat_portal/js/jquery.seat-charts.js')}}"></script>
<!-- Data table JavaScript -->
<script src="{{asset('public/admin/vendors/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('public/admin/vendors/bower_components/datepicker/bootstrap-datepicker.js')}}"></script>
<script>
$(document).ready(function () {
    "use strict";
    $(".select2").select2();
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
});

</script>
@endsection