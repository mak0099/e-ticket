@extends('admin.layout')
@section('title','Cost')
@section('style')
<link href="{{asset('public/admin/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Cost</h6>
                </div>
                <div class="pull-right">
                    <a href="{{route('cost.create')}}" class="btn btn-primary">Add New</a>
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
                                        <th>Cost category</th>
                                        <th>Car Name</th>
                                        <th>Route Name</th>
                                        <th>Amount (BDT)</th>
                                        <th>Action</th>
                                    </tr> 
                                </thead>
                                <tbody>
                                    @foreach($costs as $cost)
                                    <tr>
                                        <td>{{$cost->cost_category_name()}}</td>
                                        <td>{{$cost->car_number . ' (' . $cost->car_brand . ')'}}</td>
                                        <td>{{$cost->route_name}}</td>
                                        <td>{{$cost->amount}}</td>
                                        <td class="text-nowrap">
                                            <form action="{{route('cost.destroy', ['id'=> $cost->id])}}" method="post">
                                                {{csrf_field()}}
                                                {{ method_field('DELETE') }}
                                                <a href="{{route('cost.show', ['id'=> $cost->id])}}" class="mr-25" data-toggle="tooltip" data-original-title="Show"> <i class="fa fa-eye text-inverse m-r-10"></i> </a> 
                                                <a href="{{route('cost.edit', ['id'=> $cost->id])}}" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> 
                                                <button type="submit" data-toggle="tooltip" data-original-title="Delete" class="btn-link" onclick="return confirm('Are you sure to delete this?')"> <i class="fa fa-close text-danger"></i> </button> 
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <th colspan="2">Total</th>
                                    <th colspan="2">{{$costs->sum('amount')}}</th>
                                </tfoot>
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
<script>
$(document).ready(function () {
    $('#datable_1').DataTable();
});
</script>
@endsection