<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class ReportController extends Controller
{
    public function salesReport(Request $request){
        $start_date = ($request->start_date) ?  $request->start_date : date('Y-m'). '-01';
        $end_date = ($request->end_date) ?  $request->end_date : date('Y-m-d');
        $view = view('admin.report.sales_report');
        $reservations = \App\Reservation::select('ticket_number', 'coach_id', 'passenger_id', 'counter_id', 'created_at', DB::raw('count(seat_no) as seat_count'))
                ->groupBy('ticket_number', 'coach_id', 'passenger_id', 'counter_id', 'created_at')
                ->whereDate('created_at', '>=', $start_date)
                ->whereDate('created_at', '<=', $end_date)
                ->get();
        $view->with('reservations', $reservations);
        $view->with('start_date', $start_date);
        $view->with('end_date', $end_date);
        return $view;
    }
    public function counterSalesReport(){
        $view = view('admin.report.counter_sales_report');
        $reservations = \App\Reservation::select('coach_id', 'passenger_id', 'counter_id', DB::raw('count(seat_no) as seat_count'))
                ->groupBy('coach_id', 'passenger_id', 'counter_id')
                ->whereNotNull('counter_id')
                ->get();
        $view->with('reservations', $reservations);
        return $view;
    }
    public function costReport(Request $request){
        $start_date = ($request->start_date) ?  $request->start_date : date('Y-m'). '-01';
        $end_date = ($request->end_date) ?  $request->end_date : date('Y-m-d');
        $view = view('admin.report.cost_report');
        $costs = \App\Cost::whereDate('date', '>=', $start_date)
                ->whereDate('date', '<=', $end_date)
                ->get();
        $view->with('costs', $costs);
        $view->with('start_date', $start_date);
        $view->with('end_date', $end_date);
        return $view;
    }
    
}
