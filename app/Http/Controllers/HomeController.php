<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class HomeController extends Controller
{
    public function getIndex(){
        return redirect()->route('dashboard');
    }
    public function getLogin(){
        $view = view('admin.login');
        return $view;
    }
    public function attemptLogin(Request $request) {
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect()->route('dashboard');
        } else {
            Session::put('alert-danger', 'Invalid username or password');
            return redirect()->back();
        }
    }
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
