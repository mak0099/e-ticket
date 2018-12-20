<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Route;
use Auth;
use Session;

class RouteController extends Controller {

    private $root = 'admin.route';

    public function index() {
        $view = view($this->root . '/route_index');
        $routes = Route::all();
        $view->with('routes', $routes);
        return $view;
    }

    public function create() {
        $view = view($this->root . '/route_create');
        $view->with('locations', \App\Location::all());
        return $view;
    }

    public function store(Request $request) {
//        dd($request->input());
        $request->validate([
            'route_number' => 'required|unique:routes,route_number,NULL,id,deleted_at,NULL',
            'route_name' => 'required',
            'starting_location' => 'required',
            'destination_location' => 'required',
        ]);
        $route = new Route();
        $route->fill($request->input());
        $route->via_locations = serialize($request->via_locations);
        $route->created_by = Auth::id();
        $route->save();
        Session::flash('alert-success', 'New route created.');
        return redirect()->route('route.index');
    }

    public function show($id) {
        $view = view($this->root . '/route_show');
        $route = Route::findOrFail($id);
        $view->with('route', $route);
        return $view;
    }

    public function edit($id) {
        $view = view($this->root . '/route_edit');
        $view->with('locations', \App\Location::all());
        $view->with('route', Route::findOrFail($id));
        return $view;
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'route_name' => 'required|unique:routes,id,'.$id,
            'route_name' => 'required',
            'starting_location' => 'required',
            'destination_location' => 'required',
        ]);
        $route = Route::findOrFail($id);
        $route->fill($request->input());
        $route->via_locations = serialize($request->via_locations);
        $route->created_by = Auth::id();
        $route->update();
        Session::flash('alert-success', 'Route updated');
        return redirect()->route('route.index');
    }

    public function destroy($id) {
        Route::findOrFail($id)->delete();
        Session::flash('alert-success', 'Route deleted');
        return redirect()->back();
    }

}
