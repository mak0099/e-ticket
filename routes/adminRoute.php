<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@getIndex']);
Route::group(['middleware' => 'guest'], function(){
    Route::get('/login', ['as' => 'login', 'uses' => 'HomeController@getLogin']);
    Route::post('/login', ['as' => 'attempt_login', 'uses' => 'HomeController@attemptLogin']);
});
Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', ['as' => 'logout', 'uses' => 'HomeController@logout']);
    //Dashboard
    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@getDashboard']);
    Route::post('/update-cc-chart', ['as' => 'update_cc_chart', 'uses' => 'DashboardController@updateCcChart']);
    Route::post('/update-cs-chart', ['as' => 'update_cs_chart', 'uses' => 'DashboardController@updateCsChart']);
    Route::post('/update-ms-chart', ['as' => 'update_ms_chart', 'uses' => 'DashboardController@updateMsChart']);
    Route::post('/update-mc-chart', ['as' => 'update_mc_chart', 'uses' => 'DashboardController@updateMcChart']);

    Route::resource('car', 'CarController');
    Route::resource('location', 'LocationController')->middleware('admin');
    Route::resource('employee', 'EmployeeController')->middleware('admin');
    Route::resource('route', 'RouteController')->middleware('admin');
    Route::resource('counter', 'CounterController')->middleware('admin');
    Route::resource('coach', 'CoachController');
    Route::resource('user', 'UserController')->middleware('admin');
    Route::get('/seat_booking', ['as' => 'seat_booking', 'uses' => 'BookingController@index'])->middleware('counter');
    Route::post('/search_coach', ['as' => 'search_coach_admin', 'uses' => 'BookingController@searchCoach'])->middleware('counter');
    Route::post('/confirm-seat', ['as' => 'confirm_seat_admin', 'uses' => 'BookingController@confirmSeat'])->middleware('counter');
    Route::post('/confirm-booking', ['as' => 'confirm_booking_admin', 'uses' => 'BookingController@confirmBooking'])->middleware('counter');
    Route::get('/payment', ['as' => 'payment', 'uses' => 'PaymentController@payment'])->middleware('admin');
    Route::post('/payment', ['as' => 'save_payment', 'uses' => 'PaymentController@savePayment'])->middleware('admin');
    Route::resource('cost', 'CostController')->middleware('admin');
    Route::resource('cost_category', 'CostCategoryController')->middleware('admin');
    
    Route::get('/sales-report', ['as' => 'sales_report', 'uses' => 'ReportController@salesReport'])->middleware('admin');
    Route::get('/counter-sales-report', ['as' => 'counter_sales_report', 'uses' => 'ReportController@counterSalesReport'])->middleware('admin');
    Route::get('/cost-report', ['as' => 'cost_report', 'uses' => 'ReportController@costReport'])->middleware('admin');
    


});