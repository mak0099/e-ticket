@extends('admin.layout')
@section('title','Counter Sales Report')
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
                    <h6 class="panel-title txt-dark">Counter Sales Report</h6>
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
                                        <th>Counter Name</th>
                                        <th>Coach Number</th>
                                        <th>Seat Sale</th>
                                        <th>Amount (BDT)</th>
                                    </tr> 
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Counter Name</th>
                                        <th>Coach Number</th>
                                        <th>Seat Sale</th>
                                        <th>Amount (BDT)</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($reservations as $reservation)
                                    <tr>
                                        <td>{{$reservation->get_counter_name()}}</td>
                                        <td>{{$reservation->get_coach_name()}}</td>
                                        <td>{{$reservation->seat_count}}</td>
                                        <td>{{$reservation->get_amount()}}</td>
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
<script>
$(document).ready(function () {
    $('#datable_1').DataTable();
});
</script>
@endsection