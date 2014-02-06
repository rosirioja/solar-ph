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

Route::get('/download', function(){
$pdf = new Fpdf();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$pdf->Output();
});
Route::get('/date', function(){
	$date="2014-02-01";
$date_parts = explode('-', $date);
    $date_parts[2] = '01';
    $first_of_month = implode('-', $date_parts);
    $day_of_first = date('N', strtotime($first_of_month));
    $day_of_month = date('j', strtotime($date));
    return floor(($day_of_first + $day_of_month - 1) / 7) + 1;
});
Route::controller('report', 'ReportController');
Route::controller('aboutus', 'AboutusController');
Route::controller('batterybank', 'BatteryBankController');
Route::controller('solarpanel', 'SolarPanelController');
Route::get('/logout', function(){
	Session::flush();
	return Redirect::to('/login');
});
Route::controller('login', 'LoginController');
Route::controller('check', 'UserController');
Route::controller('/', 'HomeController');


