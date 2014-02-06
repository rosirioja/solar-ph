<?php

	class BatteryBank extends Eloquent{
		public $timestamps = false;

		//gets all data in the database
		public function getdatabyhour($userid, $date){
			$result = DB::table('batterybank')
							->select('*')
							->where('userid', $userid)
							->where('date', $date)
							->get();
			return $result;
		}

		//gets latest data
		public function getdatalatest($userid){
			$result = DB::table('batterybank')
									->select('*')
									->where('userid', $userid)
									->get();
			return $result;

		}

			public function getReports($userid, $datefrom, $dateto){
			$result = DB::table('batterybank')
						->select('*')
						->where('userid', $userid)
						->whereBetween('date', array($datefrom, $dateto))
						->orderby('id')
						->get();
			return $result;
		}
		
	
	}
?>