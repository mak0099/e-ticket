@extends('admin.layout')
@section('title','Payment')
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
                    <h6 class="panel-title txt-dark">Payment</h6>
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
                                        <th>Total Sales (BDT)</th>
                                        <th>Received (BDT)</th>
                                        <th>Due (BDT)</th>
                                        <th>Action</th>
                                    </tr> 
                                </thead>
                                
                                <tbody>
                                    @php $total_sale = 0; @endphp
                                    @php $total_received = 0; @endphp
                                    @foreach($payments as $payment)
                                    <tr>
                                        <td>{{$payment->counter_name}}</td>
                                        <td>{{$payment->sale_amount | 0}}</td>
                                        <td>{{$payment->receive_amount | 0}}</td>
                                        <td>{{($payment->sale_amount - $payment->receive_amount) | 0}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modal{{$payment->counter_id}}" data-whatever="@mdo">Receive</button>
                                            <div class="modal fade" id="modal{{$payment->counter_id}}" tabindex="-1" role="dialog" aria-labelledby="{{$payment->counter_name}}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{route('save_payment')}}" method="post">
                                                            {{csrf_field()}}
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h5 class="modal-title" id="{{$payment->counter_name}}">Cash Receive</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">Counter Name</label>
                                                                    <input type="hidden" name="counter_id" class="form-control" value="{{$payment->counter_id}}">
                                                                    <input type="text" class="form-control" value="{{$payment->counter_name}}" readonly="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label mb-10">Receive Amount (BDT):</label>
                                                                    <input type="number" name="receive_amount" min="0" max="{{$payment->sale_amount - $payment->receive_amount}}" class="form-control" value="{{$payment->sale_amount - $payment->receive_amount}}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Confirm</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                        @php $total_sale += $payment->sale_amount; @endphp
                                        @php $total_received += $payment->receive_amount; @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th>{{$total_sale}}</th>
                                        <th>{{$total_received}}</th>
                                        <th colspan="2">{{$total_sale - $total_received}}</th>
                                    </tr>
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