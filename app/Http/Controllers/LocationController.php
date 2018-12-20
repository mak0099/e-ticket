<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use Auth;
use Session;

class LocationController extends Controller {

    private $root = 'admin.location';

    public function index() {
        $view = view($this->root . '/location_index');
        $locations = Location::all();
        $view->with('locations', $locations);
        return $view;
    }

    public function create() {
        $view = view($this->root . '/location_create');
        return $view;
    }

    public function store(Request $request) {
        $request->validate([
            'location_name' => 'required|unique:locations,location_name,NULL,id,deleted_at,NULL',
            'address' => 'required',
        ]);
        $location = new Location();
        $location->fill($request->input());
        $location->created_by = Auth::id();
        $location->save();
        Session::flash('alert-success', 'New location created.');
        return redirect()->route('location.index');
    }

    public function show($id) {
        $view = view($this->root . '/location_show');
        $location = Location::findOrFail($id);
        $view->with('location', $location);
        return $view;
    }

    public function edit($id) {
        $view = view($this->root . '/location_edit');
        $location = Location::findOrFail($id);
        $view->with('location', $location);
        return $view;
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'location_name' => 'required|unique:locations,id,'.$id,
            'address' => 'required',
        ]);
        $location = Location::findOrFail($id);
        $location->fill($request->input());
        $location->created_by = Auth::id();
        $location->update();
        Session::flash('alert-success', 'Location updated');
        return redirect()->route('location.index');
    }

    public function destroy($id) {
        Location::findOrFail($id)->delete();
        Session::flash('alert-success', 'Location deleted');
        return redirect()->back();
    }

}
