@extends('site.layout')
@section('content')
<div class="site wrapper-content">
    <div class="home-content" role="main">
        <div class="top_site_main" style="background-color: #4CAF50;">
            <div class="container">
                <div class="hotel-booking-search travel-booking-search travel-booking-style_1">
                    <form action="{{route('search_coach_site')}}" name="hb-search-form" action="#" id="tourBookingForm" method="POST">
                        {{csrf_field()}}
                        <ul class="hb-form-table">
                            <li class="hb-form-field">
                                <div class="hb-form-field-input">
                                    <select name="from_location_id" class="select2" data-placeholder="From">
                                        <option disabled selected>From</option>
                                        @foreach($locations as $location)
                                        <option value="{{$location->id}}">{{$location->location_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </li>
                            <li class="hb-form-field">
                                <div class="hb-form-field-input">
                                    <select name="to_location_id" class="select2" data-placeholder="To">
                                        <option disabled selected>To</option>
                                        @foreach($locations as $location)
                                        <option value="{{$location->id}}">{{$location->location_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </li>
                            <li class="hb-form-field">
                                <div class="hb-form-field-input">
                                    <input type="text" name="date" value="" id="from" placeholder="Date of Journey">
                                </div>
                            </li>
                            <li class="hb-form-field">
                                <div class="hb-form-field-input">
                                    <input type="text" name="return_date" value="" id="to" placeholder="Date of Return (Optional)">
                                </div>
                            </li>

                            <li class="hb-submit">
                                <button type="submit"><i class="fa fa-search"></i> Search Tours</button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
        <div class="container two-column-respon padding-top-6x padding-bottom-6x">
            <div class="row">
                <table class="table table-striped custab">
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
                    @if(isset($coaches))
                    @foreach($coaches as $coach)
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
                        <td> {{$coach->total_seat}} </td>
                        <td> {{$coach->fare}} </td>
                        <td class="text-center">
                            <a id="view-seat-{{$coach->id}}" class='btn button-success btn-xs' href="#"> View Seats</a> 
                        </td>
                    </tr>
                    <tr id="coach-{{$coach->id}}" style="display: none">
                        <td colspan="9" class="seat_portal">
                            <form method="get">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-4 col-md-3">
                                            <div id="legend"></div>
                                            <div id="seat-map" style="margin-top: 35px; margin-bottom: 35px">
                                                <div id="seat-map" style="text-align: right;">
                                                    <img src="{{asset('public/site/assets/plugins/bus_seat_portal/images/steering-wheel.png')}}" style="width: 55px; padding: 5px; margin: 5px;">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-8 col-md-9">
                                            <div class="booking-details">
                                                <div class="table-responsive">
                                                    <table>
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
                                                            <td> {{$coach->total_seat}} </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Fare</th>
                                                            <td> {{$coach->fare}} </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <h3 id="selected_seats"> Selected Seats (<span id="counter">0</span>) </h3>
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
                                                        <tbody id="selected-seats">
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
                                                <div class="form-group">
                                                    <label for="sel1">Boarding Point:</label>
                                                    <select class="form-control" id="sel1" name="boarding_point">
                                                        <option disabled selected>--Select Boarding Point--</option>
                                                        @foreach(unserialize($coach->boarding_point_ids) as $boarding_point)
                                                        <option value="{{\App\Counter::find($boarding_point)->id}}">{{\App\Counter::find($boarding_point)->counter_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sel1">Destination Point:</label>
                                                    <select class="form-control" id="sel1" name="destination_point">
                                                        <option disabled selected>--Select Destination Point--</option>
                                                        @foreach(unserialize($coach->destination_point_ids) as $destination_point)
                                                        <option value="{{\App\Counter::find($destination_point)->id}}">{{\App\Counter::find($destination_point)->counter_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div>
                                                    <button type="submit" class="pay_button pull-right"><span>Pay Now</span></button>
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
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@if(isset($coaches) && count($coaches)>0)
@foreach($coaches as $coach)
<?php
$reservations = \App\Reservation::where('coach_id', $coach->id)->get();
$bookedSeats = "";
foreach ($reservations as $reservation) {
    $bookedSeats .= "'" . $reservation->seat_no . "',";
}
//                            echo $seats;
//                            dd($test);
?>
<script>
    var max_seat = 4;

    $(document).ready(function () {
        var $cart = $('#selected-seats'),
                $counter = $('#counter'),
                $total = $('#total'),
                sc = $('#seat-map').seatCharts({
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
                node: $('#legend'),
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
                    $('<tr><td><input type="hidden" name="seat_no" value="' + this.settings.label + '">' + this.settings.label + '</td><td>' + this.data().price + '</td><td> <button class="cancel-cart-item btn btn-danger btn-xs"><i class="fa fa-times"></i></button></td></tr>')
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
        $('#selected-seats').on('click', '.cancel-cart-item', function () {
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
    $('#view-seat-{{$coach->id}}').click(function toggle() {
        $('#coach-{{$coach->id}}').slideToggle();
        $(this).parent('td').parent('tr').toggleClass('selected');
    });
</script>
@endforeach
@endif
</script>

<script>
    var dateToday = new Date();
    var dates = $("#from, #to").datepicker({
        dateFormat: 'yy-mm-dd',
//        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        minDate: dateToday,
        onSelect: function (selectedDate) {
            var option = this.id == "from" ? "minDate" : "maxDate",
                    instance = $(this).data("datepicker"),
                    date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
            dates.not(this).datepicker("option", option, date);
        }
    });
</script>
@endsection