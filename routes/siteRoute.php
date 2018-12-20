<?php

Route::get('/', ['as' => 'site_index', 'uses' => 'SiteController@getIndex']);
Route::post('/search_coach', ['as' => 'search_coach_site', 'uses' => 'SiteController@searchCoach']);
Route::post('/confirm-seat', ['as' => 'confirm_seat_site', 'uses' => 'SiteController@confirmSeat']);
Route::post('/confirm-booking', ['as' => 'confirm_booking_site', 'uses' => 'SiteController@confirmBooking']);
