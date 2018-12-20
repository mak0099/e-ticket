@extends('admin.layout')
@section('title','Counter')
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
                    <h6 class="panel-title txt-dark">Add Counter</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">
                        @include('admin.partials.messages')
                        <form action="{{route('counter.update', ['id' => $counter->id])}}" method="post" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label mb-10">Counter Number</label>
                                <input type="text" class="form-control" name="counter_number" value="{{$counter->counter_number}}" autofocus="">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Counter Name</label>
                                <input type="text" class="form-control" name="counter_name" value="{{$counter->counter_name}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Address</label>
                                <textarea name="address" class="form-control">{{$counter->address}}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Phone Number</label>
                                <input type="tel" class="form-control" name="phone" value="{{$counter->phone}}">
                            </div>
                            <div class="form-group mb-0">
                                <a href="{{route('counter.index')}}" class="btn btn-default">Cancel</a>
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