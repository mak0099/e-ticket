<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class PaymentController extends Controller
{
    public function payment(){
        $view = view('admin.payment.payment');
        // $payments = DB::table('payments')
        //                 ->select('counter_id', DB::raw('SUM(payments.receive_amount) as receive_amount'))
        //                 ->groupBy('counter_id');
        // $reservations = DB::table('reservations')
        //                 ->select('counter_id', DB::raw('SUM(reservations.amount) as sale_amount'))
        //                 ->groupBy('counter_id');
        // $counters = DB::table('counters')
        //             ->join('payments', function($query){
        //                     $query->on('payments.counter_id', '=', 'counters.id');
        //                     $query->select('payments.counter_id', DB::raw('SUM(payments.receive_amount) as receive_amount'));
        //                     $query->groupBy('payments.counter_id');
        //             })
        //             ->join('reservations', function($query){
        //                     $query->on('reservations.counter_id', '=', 'counters.id');
        //                     $query->select('reservations.counter_id', DB::raw('SUM(reservations.amount) as amount'));
        //                     $query->groupBy('reservations.counter_id');
        //             })
        //             ->select('counter_name', DB::raw('SUM(receive_amount) as receive_amount'), DB::raw('SUM(amount) as amount'))
        //             ->groupBy('counter_id')
        //             ->get();
        $payments = DB::select('
                SELECT c.id as counter_id, c.counter_name,r.sale_amount, p.receive_amount 
                FROM counters AS c 
                JOIN (
                    SELECT counter_id, SUM(amount) AS sale_amount 
                    FROM reservations 
                    GROUP BY counter_id
                    ) AS r 
                ON c.id = r.counter_id
                LEFT JOIN (
                    SELECT counter_id, SUM(receive_amount) AS receive_amount 
                    FROM payments 
                    GROUP BY counter_id
                    ) AS p 
                ON c.id = p.counter_id
            ');
                        
                        // echo '<pre>';
                        // print_r($payments);exit;
                
        $view->with('payments', $payments);
        return $view;
    }

    // public function payment(){
    //     $view = view('admin.payment.payment');
    //     $reservations = \App\Reservation::select('coach_id', 'passenger_id', 'counter_id', DB::raw('count(seat_no) as seat_count'))
    //             ->groupBy('coach_id', 'passenger_id', 'counter_id')
    //             ->whereNotNull('counter_id')
    //             ->get();

    //     $view->with('reservations', $reservations);
    //     return $view;
    // }
    // public function payment(){
    //     $view = view('admin.payment.payment');
    //     $reservations = \App\Reservation::join('counters', 'counters.id', 'reservations.counter_id')
    //             ->join('coaches', 'coaches.id', 'reservations.coach_id')
    //             ->rightJoin('payments', 'payments.counter_id', 'reservations.counter_id')
    //             ->select('reservations.*', 'counters.counter_name', 'coaches.fare', DB::raw('SUM(payments.receive_amount) as receive_amount'))
    //             ->get();
    //             dd($reservations);
    //     $view->with('reservations', $reservations);
    //     return $view;
    // }
    // public function payment(){
    //     $view = view('admin.payment.payment');
    //     $reservations = DB::table('reservations')
    //             ->join('payments', 'payments.counter_id', '=', 'reservations.counter_id')
    //             ->select('payments.counter_id',  DB::raw('SUM(payments.receive_amount) as receive_amount'))
    //             ->groupBy('payments.counter_id')
    //             ->get();
    //             dd($reservations);
    //     $view->with('reservations', $reservations);
    //     return $view;
    // }
    public function savePayment(Request $request){
        $payment = new \App\Payment;
        $payment->counter_id = $request->counter_id;
        $payment->receive_amount = $request->receive_amount;
        $payment->received_by = Auth::id();
        $payment->save();
        return redirect()->route('payment');
    }
}