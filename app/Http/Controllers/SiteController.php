<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class SiteController extends Controller
{
    public function getIndex(){
        $view = view('site.seat_booking.booking_index');
        $view->with('locations', \App\Location::all());
        return $view;
    }
    public function searchCoach(Request $request) {
        $view = view('site.seat_booking.booking_index');
        $view->with('locations', \App\Location::all());
        $coaches = \App\Coach::join('routes', 'coaches.route_id', '=', 'routes.id')
                ->join('cars', 'coaches.car_id', '=', 'cars.id')
                ->select('coaches.id as coach_id', 'coaches.*', 'routes.*', 'cars.*')
                ->whereNull('coaches.deleted_at')
                ->where('routes.starting_location', $request->from_location_id)
                ->where('routes.destination_location', $request->to_location_id)
                ->whereDate('coaches.date_time', $request->date)
                ->get();
        $view->with('from', $request->from_location_id);
        $view->with('to', $request->to_location_id);
        $view->with('date', $request->date);
        $view->with('coaches', $coaches);
        return $view;
    }
    public function confirmSeat(Request $request){
        Session::put('seat_info',$request->all());
        return view('site/seat_booking/confirm_booking');
    }
    public function confirmBooking(Request $request){
        $ticket_number = time();
        $seat_info = Session::get('seat_info');
        $passenger = new \App\Passenger();
        $passenger->name = $request->name;
        $passenger->email = $request->email;
        $passenger->phone = $request->phone;
        $passenger->gender = $request->gender;
        $passenger->boarding_point = $seat_info['boarding_point'];
        $passenger->destination_point = $seat_info['destination_point'];
        $passenger->save();
        foreach($seat_info['seat_no'] as $seat_no){
            $reservation = new \App\Reservation();
            $reservation->ticket_number = $ticket_number;
            $reservation->coach_id = $seat_info['coach_id'];
            $reservation->seat_no = $seat_no;
            $reservation->passenger_id = $passenger->id;
            $reservation->branch_type = 'site';
            $reservation->save();
        }
        return redirect()->route('site_index');
    }
}
