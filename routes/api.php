<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



//Authentication
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
Route::get('details', 'API\UserController@details');

//USER CRUD
Route::get('show/{id}','API\UserController@show');
Route::put('update/{id}','API\UserController@updateById');
Route::delete('destroy/{id}','API\UserController@destroy');

//Project CRUD
Route::post('createProject','ProjectController@createProject');
Route::get('showProject/{id}','ProjectController@show');
Route::put('updateProject/{id}','ProjectController@updateById');
Route::delete('destroyProject/{id}','ProjectController@destroy');

});

//GET User
Route::get('users','API\UserController@getAllUsers');

//GET Project
Route::get('projects','ProjectController@getAllProjects');

//Location CRUD
Route::get('locations','LocationController@getAllLocations');
Route::post('createLocation','LocationController@createLocation');
Route::get('showLocation/{id}','LocationController@show');
Route::put('updateLocation/{id}','LocationController@updateById');
Route::delete('destroyLocation/{id}','LocationController@destroy');

//Property CRUD
Route::get('properties','PropertyController@getAllProperties');
Route::post('createProperty','PropertyController@createProperty');
Route::get('showProperty/{id}','PropertyController@show');
Route::put('updateProperty/{id}','PropertyController@updateById');
Route::delete('destroyProperty/{id}','PropertyController@destroy');

//Property_Project Relation
Route::get('propertyByProjectId/{id}','HomeController@propertyByProjectId');
Route::get('projectByPropertyId/{id}','HomeController@projectByPropertyId');

//Location_Project Relation
Route::get('locationByProjectId/{id}','HomeController@locationByProjectId');
Route::get('projectByLocationId/{id}','HomeController@projectByLocationId');


