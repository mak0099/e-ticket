@extends('admin.layout')
@section('title','Cost')
@section('style')
<link href="{{asset('public/admin/vendors/bower_components/dropify/dist/css/dropify.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/admin/vendors/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/admin/vendors/bower_components/datepicker/datepicker3.css')}}" rel="stylesheet" type="text/css">

@endsection
@section('content')
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Add Cost</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">
                        @include('admin.partials.messages')
                        <form action="{{route('cost.update', ['id' => $cost->id])}}" method="post" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label mb-10">Cost category</label>
                                <select name="cost_category_id" class="select2" data-placeholder="Choose">
                                    <option disabled selected>--select cost category--</option>
                                    @foreach($cost_categories as $cost_category)
                                    <option value="{{$cost_category->id}}" {{$cost_category->id == $cost->cost_category_id ? 'selected':''}}>{{$cost_category->cost_category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Description</label>
                                <textarea name="description" class="form-control">{{$cost->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Select Car</label>
                                <select name="car_id" class="select2" data-placeholder="Choose">
                                    <option disabled selected>--select car--</option>
                                    @foreach($cars as $car)
                                    <option value="{{$car->id}}" {{$car->id == $cost->car_id ? 'selected':''}}>{{$car->car_number . '(' . $car->car_brand . ')'}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Select Car</label>
                                <select name="car_id" class="select2" data-placeholder="Choose">
                                    <option disabled selected>--select car--</option>
                                    @foreach($routes as $route)
                                    <option value="{{$route->id}}" {{$route->id == $cost->route_id ? 'selected':''}}>{{$route->route_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Amount</label>
                                <div class="input-group">
                                    <label class="input-group-addon">BDT</label>
                                    <input type="number" min="0" class="form-control" name="amount" value="{{$cost->amount}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Date</label>
                                <input type="text" class="form-control datepicker" name="date" value="{{$cost->date}}" placeholder="Date">
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-success btn-anim"><i class="fa fa-save"></i><span class="btn-text">update</span></button>
                                <a href="{{route('cost.index')}}" class="btn btn-default">Cancel</a>
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
<script src="{{asset('public/admin/vendors/bower_components/datepicker/bootstrap-datepicker.js')}}"></script>
<script>
$(document).ready(function () {
    "use strict";
    $(".select2").select2({maximumSelectionSize: 2});
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
});
</script>
@endsection