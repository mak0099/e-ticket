@extends('admin.layout')
@section('title','Cost')
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
                    <h6 class="panel-title txt-dark">{{$cost->cost_category_name()}}</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>Cost category</th>
                            <td>{{$cost->cost_category_name()}}</td>
                        </tr>
                        <tr>
                            <th>Descrtiption</th>
                            <td>{{$cost->description}}</td>
                        </tr>
                        <tr>
                            <th>Car Name</th>
                            <td>{{$cost->car_number . ' (' . $cost->car_brand . ')'}}</td>
                        </tr>
                        <tr>
                            <th>Route Name</th>
                            <td>{{$cost->route_name}}</td>
                        </tr>
                        <tr>
                            <th>Amount</th>
                            <td>BDT {{$cost->amount}}</td>
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