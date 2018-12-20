<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Auth;
use Session;

class EmployeeController extends Controller {

    private $root = 'admin.employee';

    public function index() {
        $view = view($this->root . '/employee_index');
        $employees = Employee::all();
        $view->with('employees', $employees);
        return $view;
    }

    public function create() {
        $view = view($this->root . '/employee_create');
        return $view;
    }

    public function store(Request $request) {
        $request->validate([
//            'employee_number' => 'required|unique:employees,employee_number,NULL,id,deleted_at,NULL',
            'name' => 'required',
            'nid' => 'required',
            'phone' => 'required',
        ]);
        $employee = new Employee();
        $employee->fill($request->input());
        $employee->created_by = Auth::id();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = 'employee' . time() . '.' . $file->getClientOriginalExtension();
            $directory = "storage/employee_images";
            $file->move($directory, $file_name);
            $employee->image_directory = $directory;
            $employee->image_name = $file_name;
        }
        $employee->save();
        Session::flash('alert-success', 'New employee created.');
        return redirect()->route('employee.index');
    }

    public function show($id) {
        $view = view($this->root . '/employee_show');
        $employee = Employee::findOrFail($id);
        $view->with('employee', $employee);
        return $view;
    }

    public function edit($id) {
        $view = view($this->root . '/employee_edit');
        $employee = Employee::findOrFail($id);
        $view->with('employee', $employee);
        return $view;
    }

    public function update(Request $request, $id) {
        $request->validate([
//            'employee_number' => 'required|unique:employees,id,' . $id,
            'name' => 'required',
            'nid' => 'required',
            'phone' => 'required',
        ]);
        $employee = Employee::findOrFail($id);
        if ($employee->image_name) {
            $old_image = $employee->image_directory . '/' . $employee->image_name;
            if (file_exists($old_image)) {
                unlink($old_image);
            }
        }
        $employee->fill($request->input());
        $employee->created_by = Auth::id();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = 'employee' . time() . '.' . $file->getClientOriginalExtension();
            $directory = "storage/employee_images";
            $file->move($directory, $file_name);
            $employee->image_directory = $directory;
            $employee->image_name = $file_name;
        }
        $employee->update();
        Session::flash('alert-success', 'Employee updated');
        return redirect()->route('employee.index');
    }

    public function destroy($id) {
        Employee::findOrFail($id)->delete();
        Session::flash('alert-success', 'Employee deleted');
        return redirect()->back();
    }

}
