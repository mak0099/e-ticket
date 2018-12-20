@extends('admin.layout')
@section('title','Location')
@section('style')
<link href="{{asset('public/admin/vendors/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/admin/vendors/bower_components/datepicker/datepicker3.css')}}" rel="stylesheet" type="text/css">
<!-- Bus Seat Portal -->
<link href="{{asset('public/bus_seat_portal/css/jquery.seat-charts.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/bus_seat_portal/css/style.css')}}" rel="stylesheet" type="text/css">
<!-- Bus Seat Portal End -->
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <h6>Search Coach</h6>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">
                        @include('admin.partials.messages')
                        <form action="{{route('search_coach_admin')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group col-md-3">
                                <select name="from_location_id" class="select2" data-placeholder="From">
                                    <option disabled selected>From</option>
                                    @foreach($locations as $location)
                                    <option value="{{$location->id}}" {{isset($from)? ($location->id == $from) ? 'selected': '' : ''}}>{{$location->location_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <select name="to_location_id" class="select2" data-placeholder="To">
                                    <option disabled selected>To</option>
                                    @foreach($locations as $location)
                                    <option value="{{$location->id}}" {{isset($to)? ($location->id == $to) ? 'selected': '' : ''}}>{{$location->location_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control datepicker" name="date" value="{{isset($date) ? date('Y-m-d', strtotime($date)) : ''}}" placeholder="Date">
                            </div>
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <h6>Coaches</h6>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Departing Time </th>
                                <th>Starting Counter</th>
                                <th>Destination Counter</th>
                                <th>Coach Type </th>
                                <th>Available Seats </th>
                                <th>Fare </th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($coaches))
                            @foreach($coaches as $coach)
                            <?php
                            $count_booked_seats = \App\Reservation::where('coach_id', $coach->coach_id)->count();
                            $available_seats = $coach->total_seat - $count_booked_seats;
                            ?>
                            <tr>
                                <td> {{$coach->date_time}}  </td>
                                <td> 
                                    @foreach(unserialize($coach->boarding_point_ids) as $boarding_point)
                                    {{\App\Counter::find($boarding_point)->counter_name}}
                                    @endforeach
                                </td>
                                <td> 
                                    @foreach(unserialize($coach->destination_point_ids) as $destination_point)
                                    {{\App\Counter::find($destination_point)->counter_name}}
                                    @endforeach
                                </td>
                                <td> {{$coach->coach_type}} </td>
                                <td> {{$available_seats}} </td>
                                <td> {{$coach->fare}} </td>
                                <td>
                                    <a id="view-seat-{{$coach->coach_id}}" class='btn btn-success btn-xs' href="#"> View Seats</a> 
                                </td>
                            </tr>

                            <tr id="coach-{{$coach->coach_id}}" style="display: none">
                                <td colspan="9" class="seat_portal">
                                    <form method="post" action="{{route('confirm_seat_admin')}}">
                                        {{csrf_field()}}
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3">
                                                    <div id="legend-{{$coach->coach_id}}"></div>
                                                    <div id="seat-map-{{$coach->coach_id}}" style="margin-top: 50px; margin-bottom: 35px">
                                                        <div class="seat-map" style="text-align: right;">
                                                            <img src="{{asset('public/bus_seat_portal/images/steering-wheel.png')}}" style="width: 55px; padding: 5px; margin: 5px;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8 col-md-9">
                                                    <div class="booking-details">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tr>
                                                                    <th>Coatch No</th>
                                                                    <td>{{$coach->coach_number}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Departing Time</th>
                                                                    <td> {{$coach->date_time}}  </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Starting Counter</th>
                                                                    <td>
                                                                        @foreach(unserialize($coach->boarding_point_ids) as $boarding_point)
                                                                        {{\App\Counter::find($boarding_point)->counter_name}}
                                                                        @endforeach
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>End Counter</th>
                                                                    <td>
                                                                        @foreach(unserialize($coach->destination_point_ids) as $destination_point)
                                                                        {{\App\Counter::find($destination_point)->counter_name}}
                                                                        @endforeach
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Coach Type</th>
                                                                    <td> {{$coach->coach_type}} </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Available Seats </th>
                                                                    <td> {{$available_seats}} </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Fare</th>
                                                                    <td> {{$coach->fare}} </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <h3 class="selected_seats-{{$coach->coach_id}}"> Selected Seats (<span id="counter-{{$coach->coach_id}}">0</span>) </h3>
                                                        <h3 id="alert" style="display: none;"><span class="label label-danger">You can book maximum 4 seats.</span></h3>
                                                        <div class="table-responsive" style="background: #f2f2f2; margin-bottom: 15px;">
                                                            <table class="table my_table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Seat No</th>
                                                                        <th>Fare (Tk)</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="selected-seats-{{$coach->coach_id}}">
                                                                    <tr id="empty_row">
                                                                        <td colspan="3" style="height: 40px;"></td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Total: </th>
                                                                        <th>
                                                                            <b><span id="total">0</span></b>
                                                                        </th>
                                                                        <th></th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>    
                                                        </div>
                                                        <input type="hidden" name="coach_id" value="{{$coach->coach_id}}">
                                                        <div class="form-group">
                                                            <label for="sel1">Boarding Point:</label>
                                                            <select class="form-control" id="sel1" name="boarding_point" required="">
                                                                <option disabled selected>--Select Boarding Point--</option>
                                                                @foreach(unserialize($coach->boarding_point_ids) as $boarding_point)
                                                                <option value="{{\App\Counter::find($boarding_point)->id}}">{{\App\Counter::find($boarding_point)->counter_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="sel1">Destination Point:</label>
                                                            <select class="form-control" id="sel1" name="destination_point" required="">
                                                                <option disabled selected>--Select Destination Point--</option>
                                                                @foreach(unserialize($coach->destination_point_ids) as $destination_point)
                                                                <option value="{{\App\Counter::find($destination_point)->id}}">{{\App\Counter::find($destination_point)->counter_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div>
                                                            <button type="submit" class="pay_button pull-right"><span>Next</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<!-- Bus Seat Portal -->
<script src="{{asset('public/bus_seat_portal/js/jquery-1.11.0.min.js')}}"></script>
<script src="{{asset('public/bus_seat_portal/js/jquery.seat-charts.js')}}"></script>
@if(isset($coaches) && count($coaches)>0)
@foreach($coaches as $coach)
<?php
$reservations = \App\Reservation::where('coach_id', $coach->coach_id)->get();
$bookedSeats = "";
foreach ($reservations as $reservation) {
    $bookedSeats .= "'" . $reservation->seat_no . "',";
}
?>
<script>
var max_seat = 4;

$(document).ready(function () {
    var $cart = $('#selected-seats-{{$coach->coach_id}}'),
            $counter = $('#counter-{{$coach->coach_id}}'),
            $total = $('#total'),
            sc = $('#seat-map-{{$coach->coach_id}}').seatCharts({
        map: [
<?= $coach->seat_map ?>
        ],
        seats: {
            f: {
                price: <?= $coach->fare ?>,
                classes: 'first-class', //your custom CSS class
                category: 'First Class'
            },
            e: {
                price: <?= $coach->fare ?>,
                classes: 'economy-class', //your custom CSS class
                category: 'Economy Class'
            }

        },
        naming: {
            top: false,
            left: false,
            getLabel: function (character, row, column) {
                return String.fromCharCode(64 + row) + column;
            },
        },
        legend: {
            node: $('#legend-{{$coach->coach_id}}'),
            items: [
                ['e', 'available', 'Available Seats'],
                ['e', 'unavailable', 'Booked Seats'],
                ['e', 'selected', 'Selected Seats'],
            ]
        },
        click: function () {

            if (this.status() == 'available') {
                if (sc.find('selected').length + 1 > max_seat) {
                    $('#selected_seats').slideUp().delay(3000).slideDown();
                    $('#alert').slideDown().delay(3000).slideUp();
                    return 'available';
                }
                if (sc.find('selected').length + 1 > 0) {
                    $('#empty_row').hide();
                }
                //let's create a new <li> which we'll add to the cart items
                $('<tr><td><input type="hidden" name="seat_no[]" value="' + this.settings.id + '">' + this.settings.label + '</td><td>' + this.data().price + '</td><td> <button type="button" class="cancel-cart-item btn btn-danger btn-xs"><i class="fa fa-times"></i></button></td></tr>')
                        .attr('id', 'cart-item-' + this.settings.id)
                        .data('seatId', this.settings.id)
                        .appendTo($cart);

                /*
                 * Lets update the counter and total
                 *
                 * .find function will not find the current seat, because it will change its stauts only after return
                 * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
                 */
                $counter.text(sc.find('selected').length + 1);
                $total.text(recalculateTotal(sc) + this.data().price);

                return 'selected';
            } else if (this.status() == 'selected') {
                //update the counter
                $counter.text(sc.find('selected').length - 1);
                //and total
                $total.text(recalculateTotal(sc) - this.data().price);

                //remove the item from our cart
                $('#cart-item-' + this.settings.id).remove();
                if (sc.find('selected').length <= 1) {
                    $('#empty_row').show();
                }

                //seat has been vacated
                return 'available';
            } else if (this.status() == 'unavailable') {
                //seat has been already booked
                return 'unavailable';
            } else {
                return this.style();
            }
        }
    });

    //this will handle "[cancel]" link clicks
    $('#selected-seats-{{$coach->coach_id}}').on('click', '.cancel-cart-item', function () {
        //let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
        sc.get($(this).parents('tr:first').data('seatId')).click();
        // alert(sc.find('selected').length+1);
        if (sc.find('selected').length <= 0) {
            $('#empty_row').show();
        }
    });

    //let's pretend some seats have already been booked
    sc.get([<?= $bookedSeats; ?>]).status('unavailable');

});

function recalculateTotal(sc) {
    var total = 0;

    //basically find every selected seat and sum its price
    sc.find('selected').each(function () {
        total += this.data().price;
    });

    return total;
}
$('#view-seat-{{$coach->coach_id}}').click(function toggle() {
    $(this).parent('td').parent('tr').toggleClass('selected');
    $('#coach-{{$coach->coach_id}}').slideToggle();
});
</script>
@endforeach
@endif
<!-- Data table JavaScript -->
<script src="{{asset('public/admin/vendors/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('public/admin/vendors/bower_components/datepicker/bootstrap-datepicker.js')}}"></script>
<script>
$(document).ready(function () {
    "use strict";
    $(".select2").select2();
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
});

</script>
@endsection