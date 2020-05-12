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

// home
Route::prefix('/')->group(function (){
    Route::get('/', 'HomeController@index')->name('home');
});
// Main
Route::prefix('MainCourse')->group(function (){
    Route::get('/', 'HomeController@index2')->name('home')->name('MainCourse');
    Route::get('/{title}', 'SubCaterController@getAllCorces');
});
// Courses
Route::prefix('Courses')->group(function (){
    Route::get('/{cater}/{title}', 'CourseController@select');
    Route::get('/{cater}/{title}/{course}', 'CourseController@Course');
    Route::get('/{cater}/{title}/{course}/{vidindex}', 'CourseController@viewvideo');
});
// Shourt
Route::prefix('c')->group(function (){
    Route::get('/{id}', 'CourseController@shourtCourse');
});
// Search
//Route::prefix('search')->group(function (){
Route::get('search','CourseController@search');
    //Route::get('/{title}','CourseController@search');
//});
Route::get('privacy-policy',function (){
    return view('main.privacy-policy');
});

Route::prefix('contact-us')->group(function (){
    Route::get('/','Contactus@send');
    Route::post('/','Contactus@send');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
