<?php

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


//Route::get('/', function () {
////    return view('welcome');
//    return "Welcome to your home page";
//});


use Illuminate\Support\Facades\Mail;

Route::get('/','PagesController@home');
Route::get('/about','PagesController@about');
//Route::get('/contact','PagesController@contact');

Route::get('/contact','TicketsController@create');
Route::post('/contact','TicketsController@store');

Route::get('/tickets','TicketsController@index');

Route::get('/tickets/{slug?}','TicketsController@show');

Route::get('/ticket/{slug?}/edit','TicketsController@edit');
Route::post('/ticket/{slug?}/edit','TicketsController@update');

Route::post('/ticket/{slug?}/delete','TicketsController@destroy');

Route::get('sendemail', function (){
    $data = array('name'=> 'Learning Laravel');
    Mail::send('emails.welcome', $data, function ($message){
       $message->from('vinhnt9x@gmail.com','Learning Laravel');
       $message->to('quantien.ptit@gmail.com')->subject('Learning Laravel test email');
    });
    return "Your email has been sent successfully";
});

