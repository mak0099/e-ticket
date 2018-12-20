@extends('admin.layout')
@section('title','Route')
@section('style')
<link href="{{asset('public/admin/vendors/bower_components/dropify/dist/css/dropify.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/admin/vendors/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css">

@endsection
@section('content')
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Add Route</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">
                        @include('admin.partials.messages')
                        <form action="{{route('route.update', ['id' => $route->id])}}" method="post" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label mb-10">Route Number</label>
                                <input type="text" class="form-control" name="route_number" value="{{$route->route_number}}" autofocus="">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Route Name</label>
                                <input type="text" class="form-control" name="route_name" value="{{$route->route_name}}" autofocus="">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Starting Location</label>
                                <select name="starting_location" class="select2" data-placeholder="Choose">
                                    <option disabled selected>--select location--</option>
                                    @foreach($locations as $location)
                                    <option value="{{$location->id}}" {{$location->id == $route->starting_location ? 'selected':''}}>{{$location->location_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Destination Location</label>
                                <select name="destination_location" class="select2" data-placeholder="Choose">
                                    <option disabled selected>--select location--</option>
                                    @foreach($locations as $location)
                                    <option value="{{$location->id}}" {{$location->id == $route->destination_location ? 'selected':''}}>{{$location->location_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Via Locations</label>
                                <select name="via_locations[]" class="select2 select2-multiple" multiple="multiple" data-placeholder="Choose Locations">
                                    @foreach($locations as $location)
                                    <option value="{{$location->id}}" {{in_array($location->id, unserialize($route->via_locations)) ? 'selected': ''}}>{{$location->location_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-0">
                                <a href="{{route('route.index')}}" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-success btn-anim"><i class="fa fa-save"></i><span class="btn-text">update</span></button>
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
<script src="{{asset('public/admin/vendors/bower_components/dropify/dist/js/dropify.min.js')}}"></script>
<script src="{{asset('public/admin/vendors/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('public/admin/dist/js/form-file-upload-data.js')}}"></script>
<script>
$(document).ready(function () {
    "use strict";
    $(".select2").select2();
});
</script>
@endsection