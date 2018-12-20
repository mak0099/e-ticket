<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Reservation extends Model {

    public function get_counter_name() {
        if ($this->counter_id) {
            return \App\Counter::find($this->counter_id)->counter_name;
        } else {
            return 'Virtual Counter';
        }
    }

    public function get_coach_name() {
        return \App\Coach::find($this->coach_id)->coach_number;
    }
    public function get_passenger_name() {
        return \App\Passenger::find($this->passenger_id)->name;
    }
    public function get_amount(){
        return \App\Coach::find($this->coach_id)->fare * $this->seat_count;
    }
    public function get_receieved_amount(){
        $payment = \App\Payment::select(DB::raw('sum(receive_amount) as receive_amount'))->where('counter_id', $this->counter_id)->groupBy('counter_id')->first();
        if($payment){
            return $payment->receive_amount;
        }
        return 0;
    }
}
