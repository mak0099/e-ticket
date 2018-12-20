@extends('admin.layout')
@section('title','Car')
@section('style')
<!-- Bus Seat Portal -->
<link rel="stylesheet" type="text/css" href="{{asset('public/bus_seat_portal/css/jquery.seat-charts.css')}}">
<link href="{{asset('public/bus_seat_portal/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- Bus Seat Portal End -->
@endsection
@section('content')
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">{{$car->car_number}}</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    @if($car->image_name)
                    <div class="col-sm-offset-4 col-sm-4">
                        <img src="{{URL::to($car->image_directory. '/' . $car->image_name)}}" class="img-responsive"><br>
                    </div>
                    @endif
                    <table class="table">
                        <tr>
                            <th>Car Number</th>
                            <td>{{$car->car_number}}</td>
                        </tr>
                        <tr>
                            <th>Car Brand</th>
                            <td>{{$car->car_brand}}</td>
                        </tr>
                        <tr>
                            <th>Total Seat</th>
                            <td>{{$car->total_seat}}</td>
                        </tr>
                        <tr>
                            <th>Coach Type</th>
                            <td>{{$car->coach_type}}</td>
                        </tr>
                        <tr>
                            <th>Car Brand</th>
                            <td>{{$car->car_brand}}</td>
                        </tr>
                    </table>
                    <h6>Seat Plan</h6>
                    <div id="seat-map" style="margin-top: 35px; margin-bottom: 35px">
                        <div id="seat-map" style="text-align: right;">
                            <img src="{{asset('public/bus_seat_portal/images/steering-wheel.png')}}" style="width: 55px; padding: 5px; margin: 5px;">
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{URL::previous()}}" class="btn btn-default mb-15">Back</a>
        </div>	
    </div>
</div>
<!-- /Row -->
@endsection
@section('script')
<script src="{{asset('public/bus_seat_portal/js/jquery-1.11.0.min.js')}}"></script>
<script src="{{asset('public/bus_seat_portal/js/jquery.seat-charts.js')}}"></script>
<!-- Bus Seat Portal -->
<script>
$(document).ready(function () {
    var row = 26;
    var row_hold = 1;
    var seat_number = 0;
    var map = [<?php echo $car->seat_map; ?>];
    var $cart = $('#selected-seats'),
            sc = $('#seat-map').seatCharts({
        map: map,
        seats: {
            f: {
                price: 350,
                classes: 'first-class', //your custom CSS class
                category: 'First Class'
            },
            e: {
                price: 350,
                classes: 'economy-class', //your custom CSS class
                category: 'Economy Class'
            }

        },
        naming: {
            top: false,
            left: false,
            getLabel: function (character, row, column) {
                if (row_hold !== row) {
                    row_hold = row;
                    seat_number = 1;
                } else {
                    seat_number++;
                }
                return String.fromCharCode(64 + row) + seat_number;
            },
        },
    });
});
</script>
<script src="{{asset('public/bus_seat_portal/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('public/bus_seat_portal/js/scripts.js')}}"></script>
@endsection