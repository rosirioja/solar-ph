<?php

class ReportController extends \BaseController {

	
	protected $layout = "landing.default";

	public function getIndex()
	{
		//title of the website
		$this->layout->title = "Solar.ph";

		//checks if the use logs in
		if (Session::has('userid')){
			$userid = Session::get('userid');
			$username = Session::get('username');
			$loginstatus = true;

			//contains user information
			$data = array('userid' => $userid, 'username' => $username, 'loginstatus' => $loginstatus);

			//displays data to header
			$this->layout->head = View::make("landing.head")->with($data);
			
			//displays data to body
			$this->layout->body = View::make("landing.reports");
			
			//displays data to footer
			$this->layout->foot = View::make("landing.foot");

		}

		//the user did not log in
		else{
			$loginstatus = false;

			return Redirect::to('/login');

		}
	}

	public function getSummarysp(){

		if (Session::has('userid')){
			$userid = Session::get('userid');
			$username = Session::get('username');
			$loginstatus = true;

			$datefrom = Input::get('datefrom');
			$dateto = Input::get('dateto');
			
/*			$datefrom = '2014-01-01';
			$dateto = '2014-02-03';*/
			
			$report = new SolarPanel();
			$reportdata = $report->getReports($userid, $datefrom, $dateto);
		
			$stringreport="";
		
		if($reportdata){
			foreach ($reportdata as $data) {
			$stringreport .= "<tr class='append-tr-sp'><td><small class='font'><strong>".$data->date."</strong></small></td><td><small class='font'><strong>".$data->time."</strong></small></td><td><small class='font'><strong>".$data->temperature."</strong></small></td><td><small class='font'><strong>".$data->voltage."</strong></small></td><td><small class='font'><strong>".$data->current."</strong></small></td><td><small class='font'><strong>".$data->power."</strong></small></td></tr>";
		}
		}
		else{
			$stringreport = '<tr class="append-tr-sp"><td colspan="6">No result found.</td></tr>';
			// $stringreport = "null";
		}
		

		return $stringreport;

		}
		else{
			$loginstatus = false;

			return Redirect::to('/login');
		}
	}
	public function getSummarybb(){

		if (Session::has('userid')){
			$userid = Session::get('userid');
			$username = Session::get('username');
			$loginstatus = true;

			$datefrom = Input::get('datefrom');
			$dateto = Input::get('dateto');
			
/*			$datefrom = '2014-01-01';
			$dateto = '2014-02-03';*/
			
			$report = new BatteryBank();
			$reportdata = $report->getReports($userid, $datefrom, $dateto);
		
			$stringreport="";
		
		if($reportdata){
			foreach ($reportdata as $data) {
			$stringreport .= "<tr class='append-tr-bb'><td><small class='font'><strong>".$data->date."</strong></small></td><td><small class='font'><strong>".$data->time."</strong></small></td><td><small class='font'><strong>".$data->voltage."</strong></small></td><td><small class='font'><strong>".$data->current."</strong></small></td><td><small class='font'><strong>".$data->power."</strong></small></td></tr>";
		}
		}
		else{
			$stringreport = '<tr class="append-tr-bb"><td colspan="6">No result found.</td></tr>';
			// $stringreport = "null";
		}
		

		return $stringreport;

		}
		else{
			$loginstatus = false;

			return Redirect::to('/login');
		}
	}


}