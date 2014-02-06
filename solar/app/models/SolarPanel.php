<?php
	class SolarPanel extends Eloquent {
		public $timestamps = false;

		//gets all the data in the database
		public function getdatabyhour($userid, $date){
			$result = DB::table('solarpanel')
								->select('*')
								->where('userid', $userid)
								->where('date', $date)
								->get();
			return $result;
		}

		//gets latest data
		public function getdatalatest($userid){
			$result = DB::table('solarpanel')
									->select('*')
									->where('userid', $userid)
									->get();
			return $result;

		}

		public function getReports($userid, $datefrom, $dateto){
			$result = DB::table('solarpanel')
						->select('*')
						->where('userid', $userid)
						->whereBetween('date', array($datefrom, $dateto))
						->orderby('id')
						->get();
			return $result;
		}

		public function getWeekChart($userid, $year, $month, $week){
			$value = ['voltage', 'current', 'power'];
			$resultarr = array();
			$zero = "0";

			for ($x=0; $x < 3; $x++) { 
				$array = array();

				for ($i=1; $i < 8; $i++) { 
					
					$result = DB::table('solarpanel')
									->select(DB::raw('avg('.$value[$x].')'))
									->where('userid', $userid)
									->where('year', $year)
									->where('month', $month)
									->where('weekno', $week)
									->where('day', $i)
									->get();

					if($result){
						array_push($array, $result);
					}else{
						array_push($array, $zero);
					}
				}
				array_push($resultarr, $array);
			}
			return $resultarr;
		}
	}
?>