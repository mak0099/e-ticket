@extends('admin.layout')
@section('title','Employee')
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
                    <h6 class="panel-title txt-dark">{{$employee->employee_number}}</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    @if($employee->image_name)
                    <div class="col-sm-offset-4 col-sm-4">
                        <img src="{{URL::to($employee->image_directory. '/' . $employee->image_name)}}" class="img-responsive"><br>
                    </div>
                    @endif
                    <table class="table">
                        <tr>
                            <th>Employee Name</th>
                            <td>{{$employee->name}}</td>
                        </tr>
                        <tr>
                            <th>NID</th>
                            <td>{{$employee->nid}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$employee->phone}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$employee->address}}</td>
                        </tr>
                        <tr>
                            <th>Driving License</th>
                            <td>{{$employee->driving_license}}</td>
                        </tr>
                        <tr>
                            <th>Joining Date</th>
                            <td>{{$employee->joining_date}}</td>
                        </tr>
                        <tr>
                            <th>Reference Name</th>
                            <td>{{$employee->reference_name}}</td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td>{{$employee->type}}</td>
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