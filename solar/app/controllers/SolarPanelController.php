<?php

class SolarPanelController extends \BaseController {

	protected $layout = "landing.default";

	public function getIndex()
	{
		//title of the webiste
		$this->layout->title = "Solar.ph";

		//checks of the user logs in
		if (Session::has('userid')){
			$userid = Session::get('userid');
			$username = Session::get('username');
			$date = date('Y-m-d');
			$loginstatus = true;

			//contains user information
			$data = array('userid' => $userid, 'username' => $username, 'loginstatus' => $loginstatus);

			//displays data to header
			$this->layout->head = View::make("landing.head")->with($data);
			
			//displays data to body
			$getdata = new SolarPanel;
			$spdata = $getdata->getdatabyhour($userid, $date);
			$this->layout->body = View::make("landing.solarpanel")->with(array("data1"=>$spdata));
			
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
