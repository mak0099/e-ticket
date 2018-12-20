<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coach;
use Auth;
use Session;

class CoachController extends Controller {

    private $root = 'admin.coach';

    public function index() {
        $view = view($this->root . '/coach_index');
        $coaches = Coach::all();
        $view->with('coaches', $coaches);
        return $view;
    }

    public function create() {
        $view = view($this->root . '/coach_create');
        $view->with('routes', \App\Route::all());
        $view->with('cars', \App\Car::all());
        $view->with('counters', \App\Counter::all());
        return $view;
    }

    public function store(Request $request) {
        $request->validate([
            'coach_number' => 'required|unique:coaches,coach_number,NULL,id,deleted_at,NULL',
            'route_id' => 'required',
            'car_id' => 'required',
            'date_time' => 'required',
        ]);
        $coach = new Coach();
        $coach->fill($request->input());
        $coach->date_time = date('Y-m-d H:i:s',strtotime($request->date_time));
        $coach->boarding_point_ids = serialize($request->boarding_point_ids);
        $coach->destination_point_ids = serialize($request->destination_point_ids);
        $coach->created_by = Auth::id();
        $coach->save();
        Session::flash('alert-success', 'New coach created.');
        return redirect()->route('coach.index');
    }

    public function show($id) {
        $view = view($this->root . '/coach_show');
        $coach = Coach::findOrFail($id);
        $view->with('coach', $coach);
        return $view;
    }

    public function edit($id) {
        $view = view($this->root . '/coach_edit');
        $coach = Coach::findOrFail($id);
        $view->with('coach', $coach);
        $view->with('routes', \App\Route::all());
        $view->with('cars', \App\Car::all());
        $view->with('counters', \App\Counter::all());
        return $view;
    }

    public function update(Request $request, $id) {
        $request->validate([
            'coach_number' => 'required|unique:coaches,id,' . $id,
            'route_id' => 'required',
            'car_id' => 'required',
            'date_time' => 'required',
        ]);
        $coach = Coach::findOrFail($id);
        $coach->fill($request->input());
        $coach->date_time = date('Y-m-d H:i:s',strtotime($request->date_time));
        $coach->boarding_point_ids = serialize($request->boarding_point_ids);
        $coach->destination_point_ids = serialize($request->destination_point_ids);
        $coach->created_by = Auth::id();
        $coach->update();
        Session::flash('alert-success', 'Coach updated');
        return redirect()->route('coach.index');
    }

    public function destroy($id) {
        Coach::findOrFail($id)->delete();
        Session::flash('alert-success', 'Coach deleted');
        return redirect()->back();
    }

}
