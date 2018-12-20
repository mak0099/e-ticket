<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cost;
use Auth;
use Session;

class CostController extends Controller {

    private $root = 'admin.cost';

    public function index() {
        $view = view($this->root . '/cost_index');
        $costs = Cost::join('cars', 'cars.id', '=', 'costs.car_id')
                ->join('routes', 'routes.id', '=', 'costs.route_id')
                ->select('cars.car_number', 'cars.car_brand', 'routes.route_name', 'costs.*')
                ->get();
        $view->with('costs', $costs);
        return $view;
    }

    public function create() {
        $view = view($this->root . '/cost_create');
        $view->with('cost_categories', \App\CostCategory::all());
        $view->with('cars', \App\Car::all());
        $view->with('routes', \App\Route::all());
        return $view;
    }

    public function store(Request $request) {
        $request->validate([
            'cost_category_id' => 'required',
            'car_id' => 'required',
            'route_id' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ]);
        $cost = new Cost();
        $cost->fill($request->input());
        $cost->created_by = Auth::id();
        $cost->save();
        Session::flash('alert-success', 'New cost created.');
        return redirect()->route('cost.index');
    }

    public function show($id) {
        $view = view($this->root . '/cost_show');
        $cost = Cost::join('cars', 'cars.id', '=', 'costs.car_id')
                ->join('routes', 'routes.id', '=', 'costs.route_id')
                ->select('cars.car_number', 'cars.car_brand','routes.route_name', 'costs.*')
                ->firstOrFail();
        $view->with('cost', $cost);
        return $view;
    }

    public function edit($id) {
        $view = view($this->root . '/cost_edit');
        $cost = Cost::findOrFail($id);
        $view->with('cost_categories', \App\CostCategory::all());
        $view->with('cars', \App\Car::all());
        $view->with('routes', \App\Route::all());
        $view->with('cost', $cost);
        return $view;
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'cost_category_id' => 'required',
            'car_id' => 'required',
            'route_id' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ]);
        $cost = Cost::findOrFail($id);
        $cost->fill($request->input());
        $cost->created_by = Auth::id();
        $cost->update();
        Session::flash('alert-success', 'Cost updated');
        return redirect()->route('cost.index');
    }

    public function destroy($id) {
        Cost::findOrFail($id)->delete();
        Session::flash('alert-success', 'Cost deleted');
        return redirect()->back();
    }

}
