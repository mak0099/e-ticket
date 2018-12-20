@extends('admin.layout')
@section('title','Car')
@section('style')
<link href="{{asset('public/admin/vendors/bower_components/dropify/dist/css/dropify.min.css')}}" rel="stylesheet" type="text/css">
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
                    <h6 class="panel-title txt-dark">Add Car</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">
                        @include('admin.partials.messages')
                        <form action="{{route('car.update', ['id' => $car->id])}}" method="post" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label mb-10">Car Number</label>
                                <input type="text" class="form-control" name="car_number" value="{{$car->car_number}}" autofocus="">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Car Brand</label>
                                <input type="text" class="form-control" name="car_brand" value="{{$car->car_brand}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Seat Plan</label>
                                <div class="input-group">
                                    <div class="input-group-addon">Select Row</div>
                                    <select class="form-control" id="row">
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option selected>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                    </select>
                                </div>
                                <input type="hidden" id="seat_map" class="form-control" name="seat_map">

                                <!--<div id="legend"></div>-->
                                <div id="seat-map" style="margin-top: 35px; margin-bottom: 35px">
                                    <div id="seat-map" style="text-align: right;">
                                        <img src="{{asset('public/bus_seat_portal/images/steering-wheel.png')}}" style="width: 55px; padding: 5px; margin: 5px;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-30">
                                <label class="control-label mb-10 text-left">Coach Type</label>
                                <div class="radio radio-success">
                                    <input type="radio" name="coach_type"id="radio1" value="AC" {{$car->coach_type == 'AC' ? 'checked':''}}>
                                    <label for="radio1">
                                        AC
                                    </label>
                                </div>
                                <div class="radio radio-primary">
                                    <input type="radio" name="coach_type" id="radio2" value="Non-AC" {{$car->coach_type == 'Non-AC' ? 'checked':''}}>
                                    <label for="radio2">
                                        Non-AC
                                    </label>
                                </div>	
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Car Image</label>
                                <div class="mt-40">
                                    <input type="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M" name="image" accept="image/*" multiple/>
                                </div>	
                            </div>
                            <div class="form-group mb-0">
                                <a href="{{route('car.index')}}" class="btn btn-default">Cancel</a>
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
<script src="{{asset('public/bus_seat_portal/js/jquery-1.11.0.min.js')}}"></script>
<script src="{{asset('public/bus_seat_portal/js/jquery.seat-charts.js')}}"></script>
<script src="{{asset('public/admin/vendors/bower_components/dropify/dist/js/dropify.min.js')}}"></script>
<script src="{{asset('public/admin/dist/js/form-file-upload-data.js')}}"></script>
<!-- Bus Seat Portal -->
<script>
$(document).ready(function () {
    var row = 26;
    var map = [];
    for (var i = 1; i <= row; i++) {
        map.push('eeeee');
    }
    var $cart = $('#selected-seats'),
            $counter = $('#counter'),
            $total = $('#total'),
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
                return String.fromCharCode(64 + row);
            },
        },
        legend: {
            node: $('#legend'),
            items: [
                ['e', 'available', 'Available Seats'],
                ['e', 'unavailable', 'Booked Seats'],
                ['e', 'selected', 'Selected Seats'],
            ]
        },
        click: function () {
            if (this.status() == 'unavailable') {
                return 'available';
            } else if (this.status() == 'available') {
                //update the counter
                $counter.text(sc.find('available').length - 1);
                //seat has been vacated
                return 'unavailable';
            } else {
                return this.style();
            }
        }
    });
//let's pretend some seats have already been selected
    autoSelect(row);
    makeSeatPlan(row);
    $('.seatCharts-row div').on('click', function () {
        makeSeatPlan($('#row').val());
    });
    changeRow();
    $('#row').change(function () {
        changeRow();
    });

    function autoSelect(row = 10) {
        var seats = [];
        var column = 5;
        for (var i = 1; i <= row; i++) {
            for (var j = 1; j <= column; j++) {
                if (j === 3)
                    seats.push(i + '_' + j);
            }
        }
        sc.get(seats).status('unavailable');
    }
    function makeSeatPlan(row = 10) {
        var column = 5;
        var seat_map = '';
        for (var i = 1; i <= row; i++) {
            seat_map += "'";
            for (var j = 1; j <= column; j++) {
                if (sc.seats[i + '_' + j].settings.status == 'available') {
                    seat_map += 'e';
                } else if (sc.seats[i + '_' + j].settings.status == 'unavailable') {
                    seat_map += '_';
                }
            }
            seat_map += "',";
        }
        $('#seat_map').val(seat_map);
    }
    function changeRow() {
        var row = $("#row option:selected").val();
        autoSelect(row);
        makeSeatPlan(row);
        $('.seatCharts-row').show();
        row++;
        row++;
        $('.seatCharts-row:nth-child(n+' + row + ')').hide();
    }

});
</script>
<script src="{{asset('public/bus_seat_portal/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('public/bus_seat_portal/js/scripts.js')}}"></script>
@endsection