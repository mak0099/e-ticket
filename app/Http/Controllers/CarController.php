<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use Auth;
use Session;

class CarController extends Controller {

    private $root = 'admin.car';

    public function index() {
        $view = view($this->root . '/car_index');
        $cars = Car::all();
        $view->with('cars', $cars);
        return $view;
    }

    public function create() {
        $view = view($this->root . '/car_create');
        return $view;
    }

    public function store(Request $request) {
        $request->validate([
            'car_number' => 'required|unique:cars,car_number,NULL,id,deleted_at,NULL',
            'car_brand' => 'required',
            'seat_map' => 'required',
            'coach_type' => 'required',
        ]);
        $car = new Car();
        $car->fill($request->input());
        $car->total_seat = substr_count($request->seat_map,'e');
        $car->created_by = Auth::id();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = 'car' . time() . '.' . $file->getClientOriginalExtension();
            $directory = "storage/car_images";
            $file->move($directory, $file_name);
            $car->image_directory = $directory;
            $car->image_name = $file_name;
        }
        $car->save();
        Session::flash('alert-success', 'New car created.');
        return redirect()->route('car.index');
    }

    public function show($id) {
        $view = view($this->root . '/car_show');
        $car = Car::findOrFail($id);
        $view->with('car', $car);
        return $view;
    }

    public function edit($id) {
        $view = view($this->root . '/car_edit');
        $car = Car::findOrFail($id);
        $view->with('car', $car);
        return $view;
    }

    public function update(Request $request, $id) {
        $request->validate([
            'car_number' => 'required|unique:cars,id,' . $id,
            'car_brand' => 'required',
            'seat_map' => 'required',
            'coach_type' => 'required',
        ]);
        $car = Car::findOrFail($id);
        if ($car->image_name) {
            $old_image = $car->image_directory . '/' . $car->image_name;
            if (file_exists($old_image)) {
                unlink($old_image);
            }
        }
        $car->fill($request->input());
        $car->total_seat = substr_count($request->seat_map,'e');
        $car->created_by = Auth::id();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = 'car' . time() . '.' . $file->getClientOriginalExtension();
            $directory = "storage/car_images";
            $file->move($directory, $file_name);
            $car->image_directory = $directory;
            $car->image_name = $file_name;
        }
        $car->update();
        Session::flash('alert-success', 'Car updated');
        return redirect()->route('car.index');
    }

    public function destroy($id) {
        Car::findOrFail($id)->delete();
        Session::flash('alert-success', 'Car deleted');
        return redirect()->back();
    }

}
