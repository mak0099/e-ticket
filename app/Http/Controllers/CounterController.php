<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Counter;
use Auth;
use Session;

class CounterController extends Controller {

    private $root = 'admin.counter';

    public function index() {
        $view = view($this->root . '/counter_index');
        $counters = Counter::all();
        $view->with('counters', $counters);
        return $view;
    }

    public function create() {
        $view = view($this->root . '/counter_create');
        return $view;
    }

    public function store(Request $request) {
        $request->validate([
            'counter_number' => 'required|unique:counters,counter_number,NULL,id,deleted_at,NULL',
            'counter_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        $counter = new Counter();
        $counter->fill($request->input());
        $counter->created_by = Auth::id();
        $counter->save();
        Session::flash('alert-success', 'New counter created.');
        return redirect()->route('counter.index');
    }

    public function show($id) {
        $view = view($this->root . '/counter_show');
        $counter = Counter::findOrFail($id);
        $view->with('counter', $counter);
        return $view;
    }

    public function edit($id) {
        $view = view($this->root . '/counter_edit');
        $counter = Counter::findOrFail($id);
        $view->with('counter', $counter);
        return $view;
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'counter_number' => 'required|unique:counters,id,'.$id,
            'counter_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        $counter = Counter::findOrFail($id);
        $counter->fill($request->input());
        $counter->created_by = Auth::id();
        $counter->update();
        Session::flash('alert-success', 'Counter updated');
        return redirect()->route('counter.index');
    }

    public function destroy($id) {
        Counter::findOrFail($id)->delete();
        Session::flash('alert-success', 'Counter deleted');
        return redirect()->back();
    }

}
