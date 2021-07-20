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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello-world', function(){
    return view('hello-world');
});
Route::get('/hello-world/{year}/{yourname?}', function($year, $yourname = null){
    $hello_string = '';
    if($yourname == null){
        $hello_string = 'Hello world, ' . $year;
    }else{
        $hello_string = 'Hello world, ' . $year . '. My name is ' . $yourname;
    }
    return view('hello-world')->with('hello_str', $hello_string);
});

Route::get('/tin-tuc/{news_id_string}', 'MainController@showNew');
Route::get('category/laravel-nang-cao', 'MainController@uriTest');
Route::get('user-info', 'MainController@getUserInfo');
Route::get('contact', 'MainController@showContactForm');

Route::post('contact', 'MainController@showContactForms');

Route::get('/basic', function () {
    return response()
    ->view('fontend.contact', $data, 200)
    ->header('Content-Type', $type);
});

Route::get('register', 'UserController@showRegisterForm');
Route::post('register', 'UserController@storeUser');

Route::get('employee', 'EmployeeController@showEmployeeForm');
Route::post('employee', 'EmployeeController@add');
Route::get('delete/{id}', 'EmployeeController@delete');