<?php

class BatteryBankController extends \BaseController {

	protected $layout = "landing.default";

	public function getIndex()
	{
		//title of the website
		$this->layout->title = "Solar.ph";

		//checks if the user logs in
		if (Session::has('userid')){
			date_default_timezone_set('Asia/Manila');
			
			$userid = Session::get('userid');
			$username = Session::get('username');
			$date = date('Y-m-d');
			//$date = "2013-12-11";
			$loginstatus = true;

			//contains user information
			$data = array('userid' => $userid, 'username' => $username, 'loginstatus' => $loginstatus);

			//displays data to header
			$this->layout->head = View::make("landing.head")->with($data);

			//displays data to body
			$getdata = new BatteryBank;
			$bbdata = $getdata->getdatabyhour($userid, $date);
			$this->layout->body = View::make("landing.batterybank")->with(array("data1"=>$bbdata));
			
			//displays data to footer
			$this->layout->foot = View::make("landing.foot");

		}

		//the user did not log in
		else{
			$loginstatus = false;

			return Redirect::to('/login');

		}
	}

}