@extends('admin.layout')
@section('title','Location')
@section('style')
<link href="{{asset('public/admin/vendors/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/admin/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css">


@endsection
@section('content')
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Add Location</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">
                        @include('admin.partials.messages')
                        <form action="{{route('coach.update', ['id' => $coach->id])}}" method="post" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label mb-10">Coach Number</label>
                                <input type="text" class="form-control" name="coach_number" value="{{$coach->coach_number}}" autofocus="">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Select Route</label>
                                <select name="route_id" class="select2" data-placeholder="Choose">
                                    <option disabled selected>--Select Route--</option>
                                    @foreach($routes as $route)
                                    <option value="{{$route->id}}"  {{$route->id == $coach->route_id ? 'selected':''}}>{{$route->route_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Select Car</label>
                                <select name="car_id" class="select2" data-placeholder="Choose">
                                    <option disabled selected>--Select Location--</option>
                                    @foreach($cars as $car)
                                    <option value="{{$car->id}}"  {{$car->id == $coach->car_id ? 'selected':''}}>{{$car->car_number . ' (' . $car->car_brand . ')'}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Starting Date & Time</label>
                                <input type="hidden" name="date_time" class='input-group date' id='datetimepicker4'>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Select Boarding Points</label>
                                <select name="boarding_point_ids[]" class="select2 select2-multiple" multiple="multiple" data-placeholder="Choose Boarding Points">
                                    @foreach($counters as $counter)
                                    <option value="{{$counter->id}}"  {{in_array($counter->id, unserialize($coach->boarding_point_ids)) ? 'selected': ''}}>{{$counter->counter_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Select Destination Points</label>
                                <select name="destination_point_ids[]" class="select2 select2-multiple" multiple="multiple" data-placeholder="Choose Destination Points">
                                    @foreach($counters as $counter)
                                    <option value="{{$counter->id}}" {{in_array($counter->id, unserialize($coach->destination_point_ids)) ? 'selected': ''}}>{{$counter->counter_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Ticket Price</label>
                                <div class="input-group">
                                    <span class="input-group-addon">BDT</span>
                                    <input type="number" min="0" class="form-control" name="fare" value="{{$coach->fare}}">
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <a href="{{route('coach.index')}}" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-success btn-anim"><i class="fa fa-save"></i><span class="btn-text">Update</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>	
    </div>
</div>
<!-- /Row -->
@endsection
@section('script')
<script src="{{asset('public/admin/vendors/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('public/admin/vendors/bower_components/moment/min/moment-with-locales.min.js')}}"></script>
<script src="{{asset('public/admin/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
<script>
$(document).ready(function () {
    "use strict";
    $(".select2").select2();
    $('#datetimepicker4').datetimepicker({
        inline: true,
        sideBySide: true,
        useCurrent: false,
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down"
        },
    }).data("DateTimePicker").date(moment());
});

</script>
@endsection