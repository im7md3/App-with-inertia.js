<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','WelcomeController@index');

Auth::routes(["register" => false]);

Route::group(['middleware'=>'auth'],function(){
    Route::get("/dashboard",'DashboardController@index')->name('dash');
    
    Route::get('/leads','LeadController@index')->name('leads.index');
    Route::get('/leads/add','LeadController@create')->name('leads.add');
    Route::post('/leads/save','LeadController@store');
    Route::get('/leads/view/{leadprop}','LeadController@view')->name('lead.view');
    Route::post('/leads/update','LeadController@update')->name('leads.update');
    
    /* reminders */
    Route::get('/leads/view/{lead}/reminder/add','ReminderController@add')->name('reminder.add');
    Route::post('/reminder/store','ReminderController@store')->name('reminder.store');
    Route::get('/leads/view/{lead}/reminder/view/{remind}','ReminderController@view')->name('reminder.view');
    Route::post('reminder/update/{remind}','ReminderController@update')->name('reminder.update');
    
});
