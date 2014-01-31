<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*Route::get('ajax/solarpanel', array(
	'as' => 'showSPgraph',
	'uses' => function () {
		return View::make('landing.solarpanel');
	}
));*/

/*Route::get('ajax/postDetails', array(
    'as' => 'showSPgraph', // This is the name of your route
    'uses' => function () {
        return View::make('landing.solarpanel');
    }
));*/
/*
Route::get('getNest', array('as' => 'getNest', 'uses' => 'SpgraphController@getIndex'));*/
Route::controller('spgraph', 'SpgraphController');
Route::controller('report', 'ReportController');
Route::controller('aboutus', 'AboutusController');
Route::controller('settings', 'SettingsController');
Route::controller('batterybank', 'BatteryBankController');
Route::controller('solarpanel', 'SolarPanelController');
Route::get('/logout', function(){
	Session::flush();
	return Redirect::to('/login');
});
Route::controller('login', 'LoginController');
Route::controller('check', 'UserController');
Route::controller('/', 'HomeController');


