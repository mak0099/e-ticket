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
                    <h6 class="panel-title txt-dark">Add Employee</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">
                        @include('admin.partials.messages')
                        <form action="{{route('employee.update', ['id' => $employee->id])}}" method="post" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{csrf_field()}}
<!--                            <div class="form-group">
                                <label class="control-label mb-10">Employee Number</label>
                                <input type="text" class="form-control" name="employee_number" value="{{old('employee_number')}}" autofocus="">
                            </div>-->
                            <div class="form-group">
                                <label class="control-label mb-10">Employee Name</label>
                                <input type="text" class="form-control" name="name" value="{{$employee->name}}" autofocus="">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">NID</label>
                                <input type="text" class="form-control" name="nid" value="{{$employee->nid}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Phone</label>
                                <input type="tel" class="form-control" name="phone" value="{{$employee->phone}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Address</label>
                                <textarea name="address" class="form-control">{{$employee->address}}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Driving License</label>
                                <input type="text" class="form-control" name="driving_license" value="{{$employee->driving_license}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Joining Date</label>
                                <input type="date" class="form-control" name="joining_date" value="{{$employee->joining_date}}">
                            </div>
                            <div class="form-group mb-30">
                                <label class="control-label mb-10 text-left">Type</label>
                                <div class="radio radio-success">
                                    <input type="radio" name="type"id="radio1" value="Driver" {{$employee->type == 'Driver' ? 'checked':''}}>
                                    <label for="radio1">
                                        Driver
                                    </label>
                                </div>
                                <div class="radio radio-primary">
                                    <input type="radio" name="type" id="radio2" value="Supervisor" {{$employee->type == 'Supervisor' ? 'checked':''}}>
                                    <label for="radio2">
                                        Supervisor
                                    </label>
                                </div>	
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Reference Name</label>
                                <input type="text" class="form-control" name="reference_name" value="{{$employee->reference_name}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Employee Photo</label>
                                <div class="mt-40">
                                    <input type="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M" name="image" accept="image/*" multiple/>
                                </div>	
                            </div>
                            <div class="form-group mb-0">
                                <a href="{{route('employee.index')}}" class="btn btn-default">Cancel</a>
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
<script src="{{asset('public/admin/dist/js/form-file-upload-data.js')}}"></script>
@endsection