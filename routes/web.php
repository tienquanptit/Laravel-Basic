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

Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
//Route::get('/contact','PagesController@contact');

Route::get('/contact', 'TicketsController@create');
Route::post('/contact', 'TicketsController@store');

Route::get('/tickets', 'TicketsController@index');

Route::get('/tickets/{slug?}', 'TicketsController@show');

Route::get('/ticket/{slug?}/edit', 'TicketsController@edit');
Route::post('/ticket/{slug?}/edit', 'TicketsController@update');

Route::post('/ticket/{slug?}/delete', 'TicketsController@destroy');

Route::get('sendemail', function () {
    $data = array('name' => 'Learning Laravel');
    Mail::send('emails.welcome', $data, function ($message) {
        $message->from('vinhnt9x@gmail.com', 'Learning Laravel');
        $message->to('quantien.ptit@gmail.com')->subject('Learning Laravel test email');
    });
    return "Your email has been sent successfully";
});

Route::post('/comment', 'CommentsController@newComment');

//đăng ký
Route::get('users/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('users/register', 'Auth\RegisterController@register');
Route::get('home', 'PagesController@home');

//đăng xuất
Route::get('users/logout', 'Auth\LoginController@logout');

//đăng nhập
Route::get('users/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('users/login', 'Auth\LoginController@login');

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'),
    function () {
        Route::get('users', ['as' => 'admin.user.index', 'uses' => 'UsersController@index']);
        Route::get('roles', 'RolesController@index');
        Route::get('roles/create', 'RolesController@create');
        Route::post('roles/create', 'RolesController@store');

        Route::get('users/{id?}/edit','UsersController@edit');
        Route::post('users/{id?}/edit','UsersController@update');

        //page home admin
        Route::get('/','PagesController@home');

        //post
        Route::get('posts', 'PostsController@index');
        Route::get('posts/create', 'PostsController@create');
        Route::post('posts/create', 'PostsController@store');
        Route::get('posts/{id?}/edit', 'PostsController@edit');
        Route::post('posts/{id?}/edit','PostsController@update');

        //category
        Route::get('categories', 'CategoriesController@index');
        Route::get('categories/create', 'CategoriesController@create');
        Route::post('categories/create', 'CategoriesController@store');
    });

//page blog
Route::get('/blog','BlogController@index');
Route::get('/blog/{slug?}','BlogController@show');
