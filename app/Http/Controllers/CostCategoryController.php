<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CostCategory;
use Auth;
use Session;

class CostCategoryController extends Controller {

    private $root = 'admin.cost_category';

    public function index() {
        $view = view($this->root . '/cost_category_index');
        $cost_categorys = CostCategory::all();
        $view->with('cost_categorys', $cost_categorys);
        return $view;
    }

    public function create() {
        $view = view($this->root . '/cost_category_create');
        return $view;
    }

    public function store(Request $request) {
        $request->validate([
            'cost_category_name' => 'required|unique:cost_categories,cost_category_name,NULL,id,deleted_at,NULL',
        ]);
        $cost_category = new CostCategory();
        $cost_category->fill($request->input());
        $cost_category->created_by = Auth::id();
        $cost_category->save();
        Session::flash('alert-success', 'New cost category created.');
        return redirect()->route('cost_category.index');
    }

    public function show($id) {
        $view = view($this->root . '/cost_category_show');
        $cost_category = CostCategory::findOrFail($id);
        $view->with('cost_category', $cost_category);
        return $view;
    }

    public function edit($id) {
        $view = view($this->root . '/cost_category_edit');
        $cost_category = CostCategory::findOrFail($id);
        $view->with('cost_category', $cost_category);
        return $view;
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'cost_category_name' => 'required|unique:cost_categories,id,'.$id,
        ]);
        $cost_category = CostCategory::findOrFail($id);
        $cost_category->fill($request->input());
        $cost_category->created_by = Auth::id();
        $cost_category->update();
        Session::flash('alert-success', 'Cost category updated');
        return redirect()->route('cost_category.index');
    }

    public function destroy($id) {
        CostCategory::findOrFail($id)->delete();
        Session::flash('alert-success', 'Cost category deleted');
        return redirect()->back();
    }

}
