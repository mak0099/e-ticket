@extends('admin.layout')
@section('title','Route')
@section('style')
<link href="{{asset('public/admin/vendors/bower_components/dropify/dist/css/dropify.min.css')}}" rel="stylesheet" type="text/css">

@endsection
@section('content')
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">{{$route->route_name}}</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>Route Number</th>
                            <td>{{$route->route_number}}</td>
                        </tr>
                        <tr>
                            <th>Route Name</th>
                            <td>{{$route->route_name}}</td>
                        </tr>
                        <tr>
                            <th>Starting Location</th>
                            <td>{{$route->startingLocation()}}</td>
                        </tr>
                        <tr>
                            <th>Destination Location</th>
                            <td>{{$route->destinationLocation()}}</td>
                        </tr>
                        <tr>
                            <th>Via Location</th>
                            <td>
                                @foreach(unserialize($route->via_locations) as $location)
                                <label class="label label-success">{{$route->getLocationById($location)}}</label>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <a href="{{URL::previous()}}" class="btn btn-default mb-15">Back</a>
        </div>	
    </div>
</div>
<!-- /Row -->
@endsection
@section('script')
<script src="{{asset('public/admin/vendors/bower_components/dropify/dist/js/dropify.min.js')}}"></script>
<script src="{{asset('public/admin/dist/js/form-file-upload-data.js')}}"></script>
@endsection