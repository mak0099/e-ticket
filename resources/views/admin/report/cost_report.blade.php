@extends('admin.layout')
@section('title','Cost Report')
@section('style')
<link href="{{asset('public/admin/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/admin/vendors/bower_components/datepicker/datepicker3.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Cost Report</h6>
                </div>
                <div class="pull-right">
                    <form action="#">
                        <div class="form-group col-sm-offset-6 col-sm-2">
                            <div class="input-group">
                                <label class="input-group-addon">Start Date</label>
                            <input type="text" class="form-control datepicker" name="start_date" value="{{$start_date}}" placeholder="Date">
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <div class="input-group">
                            <label class="input-group-addon">End Date</label>
                                <input type="text" class="form-control datepicker" name="end_date" value="{{$end_date}}" placeholder="Date">
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <input type="submit" class="btn btn-primary" value="Filter">
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    @include('admin.partials.messages')
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="datable_1" class="table table-hover display  pb-30" >
                                <thead>
                                    <tr>
                                        <th>Cost Category</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr> 
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Cost Category</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($costs as $cost)
                                    <tr>
                                        <td>{{$cost->cost_category_name()}}</td>
                                        <td>{{$cost->amount}}</td>
                                        <td>{{date('F d, Y', strtotime($cost->created_at))}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>	
    </div>
</div>
<!-- /Row -->
@endsection
@section('script')
<!-- Data table JavaScript -->
<script src="{{asset('public/admin/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/admin/vendors/bower_components/datepicker/bootstrap-datepicker.js')}}"></script>
<script>
$(document).ready(function () {
    $('#datable_1').DataTable();
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
});
</script>
@endsection