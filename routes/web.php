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



//all routes protected by middle ware only authenticated users can access
Route::group(['middleware' => 'auth'], function(){

	//////////////////////////////////////////
	///  PROFILE ROUTES                  //
	//////////////////////////////////////////

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/home/{id}', [
	'uses' => 'HomeController@view',
	'as' => 'view'

	]);


	Route::get('/profile/{id}',[
			'uses' => 'profileController@index',
			'as' => 'profile'
			
	]);

	Route::get('/profile/edit/profile/{id}',[
			'uses' => 'profileController@edit',
			'as' => 'profile.edit'
	]);

	Route::post('/profile/update/profile',[
			'uses' => 'profileController@update',
			'as' => 'profile.update'
	]);

	Route::get('/profile/edit/skills',[
		'uses' => 'skillsController@edit',
		'as' => 'skills.edit'
	]);

	Route::post('/profile/update/skills',[
			'uses' => 'skillsController@update',
			'as' => 'skills.update'
	]);

	//////////////////////////////////////////
	///  EXPERIENCE ROUTES                  //
	//////////////////////////////////////////

	Route::post('/experience/add',[
			'uses' => 'experienceController@add',
			'as' => 'experience.add'
	]);

	Route::get('/experience/edit/{id}',[
			'uses' => 'experienceController@index',
			'as' => 'experience.edit'
	]);

	Route::post('/experience/update',[
			'uses' => 'experienceController@update',
			'as' => 'experience.update'
	]);
//////////////////////////////////////////
	///  MESSAGE ROUTES                  //
	//////////////////////////////////////////

	Route::get('/sendoffer/{id}',[
			'uses' => 'OfferController@index',
			'as' => 'message'
	]);

	Route::get('/offers',[
			'uses' => 'OfferController@view',
			'as' => 'view.offer'
	]);

	Route::post('/sendOffer',[
			'uses' => 'OfferController@send',
			'as' => 'send.offer'
	]);

	Route::get('/respond/{res}/{id}',[
			'uses' => 'OfferController@respond',
			'as' => 'respond'
	]);
});
