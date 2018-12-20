@extends('admin.layout')
@section('title','Coach')
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
                    <h6 class="panel-title txt-dark">{{$coach->coach_name}}</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>Coach Number</th>
                            <td>{{$coach->coach_number}}</td>
                        </tr>
                        <tr>
                            <th>Route Name</th>
                            <td>{{$coach->route()->route_name}}</td>
                        </tr>
                        <tr>
                            <th>Car Name</th>
                            <td>{{$coach->car()->car_brand}}</td>
                        </tr>
                        <tr>
                            <th>Driver Name</th>
                            <td>{{$coach->driver()}}</td>
                        </tr>
                        <tr>
                            <th>Supervisor Name</th>
                            <td>{{$coach->supervisor()}}</td>
                        </tr>
                        <tr>
                            <th>Boarding Points</th>
                            <td>
                                @foreach(unserialize($coach->boarding_point_ids) as $counter)
                                <label class="label label-success">{{$coach->getCounterById($counter)}}</label>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Destination Points</th>
                            <td>
                                @foreach(unserialize($coach->destination_point_ids) as $counter)
                                <label class="label label-success">{{$coach->getCounterById($counter)}}</label>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Ticket Price</th>
                            <td>BDT {{$coach->fare}}</td>
                        </tr>
                        <tr>
                            <th>Travel Date</th>
                            <td>{{date('F d, Y', strtotime($coach->date_time))}}</td>
                        </tr>
                        <tr>
                            <th>Starting Time</th>
                            <td>{{date('h:i A', strtotime($coach->date_time))}}</td>
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