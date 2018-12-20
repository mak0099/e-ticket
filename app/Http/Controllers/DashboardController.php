<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class DashboardController extends Controller
{
    public function getDashboard(){
        $view = view('admin.dashboard');
        $view->with('total', $this->getTotal());
        
        $view->with('cc_chart', $this->getCcChart());
        $view->with('ms_chart', $this->getMsChart());
        $view->with('cs_chart', $this->getCsChart());
        $view->with('mc_chart', $this->getMcChart());

        return $view;
    }


    ///////// Total ///////////
    public function getTotal(){
    	$total['coach'] = DB::table('coaches')->count();
    	$total['counter'] = DB::table('counters')->count();
    	$total['employee'] = DB::table('employees')->count();
    	$total['route'] = DB::table('routes')->count();
    	$total['user'] = DB::table('users')->count();
    	$total['car'] = DB::table('cars')->count();
    	$total['sale'] = DB::table('reservations')->sum('amount');
    	$total['cost'] = DB::table('costs')->sum('amount');
    	return $total;
    }


    ///////// CC Chart /////////
    public function getCcChart(){
    	if(Session::has('cc_chart')){
        	$cc_chart = Session::get('cc_chart');
        }else{
            $cc_chart = Array();
        	$cc_chart['start_date'] = date('Y-m') . '-01';
        	$cc_chart['end_date'] = date('Y-m-d');
            $cc_chart['category_id'] = 0;
        	$cc_chart['route_id'] = 0;
        }
        $start_date = $cc_chart['start_date'];
        $end_date = $cc_chart['end_date'];
        $category_id = $cc_chart['category_id'];
        $route_id = $cc_chart['route_id'];
        // $cc_chart['data'] = DB::table('costs')
        // 		->rightJoin('cars', 'cars.id', '=', 'costs.car_id')
        //         ->select('cars.car_number', DB::raw('SUM(CASE WHEN costs.cost_category_id='.$category_id.' OR '.$category_id.'=0 THEN costs.amount ELSE 0 END) as amount'))
        //         ->where('costs.date', '>=', $cc_chart['start_date'])->where('costs.date', '<=', $cc_chart['end_date'])
        //         ->groupBy('cars.car_number')
        //         ->toSql();	
        //         dd($cc_chart['data']);
        $cc_chart['data'] = DB::select("
                SELECT cars.car_number,cst.amount
                FROM cars
                LEFT JOIN (
                    SELECT car_id, SUM(amount) AS amount 
                    FROM costs 
                    WHERE DATE_FORMAT(costs.date, '%Y-%m-%d')>='$start_date'
                    AND DATE_FORMAT(costs.date, '%Y-%m-%d')<='$end_date'
                    AND (costs.cost_category_id=$category_id OR $category_id=0)
                    AND (costs.route_id=$route_id OR $route_id=0)
                    GROUP BY car_id
                    ) AS cst 
                ON cars.id = cst.car_id
            ");
        $cc_chart['categories'] = \App\CostCategory::all();
        $cc_chart['routes'] = \App\Route::all();

        // Session::remove('cc_chart'); //reset when relead
        return $cc_chart;
    }
    public function updateCcChart(Request $request){
    	$date_range = explode(' - ', $request->date_range);
    	$cc_chart = Array();
    	$cc_chart['start_date'] = $date_range[0];
    	$cc_chart['end_date'] = $date_range[1];
        $cc_chart['category_id'] = $request->category_id;
    	$cc_chart['route_id'] = $request->route_id;
    	Session::put('cc_chart', $cc_chart);
    	return redirect()->back();
    }




    ////////// CS Chart /////////////
    public function getCsChart(){
    	if(Session::has('cs_chart')){
        	$cs_chart = Session::get('cs_chart');
        }else{
        	$cs_chart['start_date'] = date('Y') . '-01-01';
        	$cs_chart['end_date'] = date('Y-m-d');
        }
        $start_date = $cs_chart['start_date'];
        $end_date = $cs_chart['end_date'];
        // $cs_chart['data'] = DB::table('reservations')
        // 		->rightJoin('counters', 'counters.id', '=', 'reservations.counter_id')
	       //          ->select('counters.counter_number', DB::raw('SUM(reservations.amount) as amount'))
	       //          ->whereBetween('reservations.created_at', array($start_date, $end_date))
        //         ->groupBy('counters.counter_number')
        //         ->get();
        $cs_chart['data'] = DB::select("
                SELECT counter_number,res.amount
                FROM counters
                LEFT JOIN (
                    SELECT counter_id, SUM(amount) AS amount 
                    FROM reservations 
                    WHERE DATE_FORMAT(reservations.created_at, '%Y-%m-%d')>='$start_date'
                    AND DATE_FORMAT(reservations.created_at, '%Y-%m-%d')<='$end_date'
                    GROUP BY counter_id
                    ) AS res 
                ON counters.id = res.counter_id
            ");	
                // dd($cs_chart['data']);
        return $cs_chart;
    }
    public function updateCsChart(Request $request){
    	$date_range = explode(' - ', $request->date_range);
    	$start_date = $date_range[0];
    	$end_date = $date_range[1];
    	$cs_chart = Array();
    	$cs_chart['start_date'] = $start_date;
    	$cs_chart['end_date'] = $end_date;
    	Session::put('cs_chart', $cs_chart);
    	return redirect()->back();
    }




    ////////// MS Chart ////////////
    public function getMsChart(){
    	if(Session::has('ms_chart')){
        	$year = $ms_chart = Session::get('ms_chart');
        }else{
        	$year = $ms_chart['year'] = Date('Y');
        }
        $ms_chart['years'] = DB::table('reservations')
		        ->select(DB::raw("DATE_FORMAT(created_at, '%Y') as year"))
		        ->groupBy('year')
		        ->get();
        for($i=0; $i<12; $i++){
        	$data_site = DB::table('reservations')
                ->select(DB::raw('SUM(reservations.amount) as amount'))
                ->whereMonth('created_at', $i+1)
                ->whereYear('created_at', $year)
                ->where('branch_type', 'site')
                ->first();
            $data_counter = DB::table('reservations')
                ->select(DB::raw('SUM(reservations.amount) as amount'))
                ->whereMonth('created_at', $i+1)
                ->whereYear('created_at', $year)
                ->where('branch_type', 'admin')
                ->first();
            $ms_chart['data'][$i]['month'] = $i+1;
            $ms_chart['data'][$i]['site_amount'] = $data_site->amount | 0;
            $ms_chart['data'][$i]['counter_amount'] = $data_counter->amount | 0;
        }
        // dd($ms_chart);
        return $ms_chart;
    }
    public function updateMsChart(Request $request){
    	$year = $request->year;
    	$ms_chart = Array();
    	$ms_chart['year'] = $year;
    	Session::put('ms_chart', $ms_chart);
    	return redirect()->back();
    }



    ////////// MC Chart ////////////
    public function getMcChart(){
    	if(Session::has('mc_chart')){
        	$year = $mc_chart = Session::get('mc_chart');
        }else{
        	$year = $mc_chart['year'] = Date('Y');
        }
        $mc_chart['years'] = DB::table('costs')
		        ->select(DB::raw("DATE_FORMAT(date, '%Y') as year"))
		        ->groupBy('year')
		        ->get();
        for($i=0; $i<12; $i++){
        	$data = DB::table('costs')
                ->select(DB::raw('SUM(costs.amount) as amount'))
                ->whereMonth('date', $i+1)
                ->whereYear('date', $year)
                ->first();
            $mc_chart['data'][$i]['month'] = $i+1;
            $mc_chart['data'][$i]['amount'] = $data->amount | 0;
        }
        // dd($mc_chart);
        return $mc_chart;
    }
    public function updateMcChart(Request $request){
    	$year = $request->year;
    	$mc_chart = Array();
    	$mc_chart['year'] = $year;
    	Session::put('mc_chart', $mc_chart);
    	return redirect()->back();
    }
}