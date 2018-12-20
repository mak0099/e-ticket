<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use DB;

class UserController extends Controller {

    private $root = 'admin.user';

    public function index() {
        $view = view($this->root . '/user_index');
        $users = User::all();
        $view->with('users', $users);
        return $view;
    }

    public function create() {
        $view = view($this->root . '/user_create');
        $counters = DB::select("SELECT c.id, c.counter_name
                                FROM counters c
                                LEFT JOIN users u ON c.id = u.counter_id
                                WHERE u.counter_id IS NULL");
        $view->with('counters', $counters);
        return $view;
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,NULL,id,deleted_at,NULL',
            'email' => 'required|unique:users,email,NULL,id,deleted_at,NULL',
            'password' => 'required',
        ]);
        $user = new User();
        $user->fill($request->input());
        $user->password = bcrypt($request->password);
        $user->created_by = Auth::id();
        $user->save();
        Session::flash('alert-success', 'New user created.');
        return redirect()->route('user.index');
    }

    public function show($id) {
        $view = view($this->root . '/user_show');
        $user = User::findOrFail($id);
        $view->with('user', $user);
        return $view;
    }

    public function edit($id) {
        $view = view($this->root . '/user_edit');
        $user = User::findOrFail($id);
        $view->with('user', $user);
        return $view;
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'user_name' => 'required|unique:users,id,'.$id,
            'address' => 'required',
        ]);
        $user = User::findOrFail($id);
        $user->fill($request->input());
        $user->created_by = Auth::id();
        $user->update();
        Session::flash('alert-success', 'User updated');
        return redirect()->route('user.index');
    }

    public function destroy($id) {
        User::findOrFail($id)->delete();
        Session::flash('alert-success', 'User deleted');
        return redirect()->back();
    }

}
