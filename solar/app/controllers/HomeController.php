<?php

class HomeController extends \BaseController {

	protected $layout = "landing.default";
	public function getIndex()
	{
		//title of the website
		$this->layout->title = "Solar.ph";

		//checks if the user logs in
		if (Session::has('userid')){
			$userid = Session::get('userid');
			$username = Session::get('username');
			$loginstatus = true;

			//contains user information
			$data = array('userid' => $userid, 'username' => $username, 'loginstatus' => $loginstatus);

			//displays data to header
			$this->layout->head = View::make("landing.head")->with($data);
			
			//displays data to body
			$getspdata = new SolarPanel;
			$spdata = $getspdata->getdatalatest($userid);
			
			$getbbdata = new BatteryBank;
			$bbdata = $getbbdata->getdatalatest($userid);

			$getsettings = new Settings;
			$settings = $getsettings->getdatalatest($userid);
			$this->layout->body = View::make("landing.body")->with(array("data1"=>$spdata, "data2"=>$bbdata, "data3"=>$settings));
			
			//displays data to footer
			$this->layout->foot = View::make("landing.foot");

		}

		//user did not log in
		else{
			$loginstatus = false;

			return Redirect::to('/login');

		}
	}
	
	public function getSpgraph() {
			date_default_timezone_set('Asia/Manila');
			
			$userid = Session::get('userid');
			$username = Session::get('username');
			/*$date = date('Y-m-d');*/
			$date = "2014-02-02";
			$loginstatus = true;

			//displays data to body
			$getdata = new SolarPanel;
			$spdata = $getdata->getdatabyhour($userid, $date);
			return View::make("landing.graphsolarpanel")->with(array("data1"=>$spdata));
			
	}

	public function getBbgraph() {
			date_default_timezone_set('Asia/Manila');
			
			$userid = Session::get('userid');
			$username = Session::get('username');
			/*$date = date('Y-m-d');*/
			$date = "2014-02-02";
			$loginstatus = true;

			//displays data to body
			$getdata = new BatteryBank;
			$bbdata = $getdata->getdatabyhour($userid, $date);
			 return View::make("landing.graphbatterybank")->with(array("data1"=>$bbdata));
			
	}


}