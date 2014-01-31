<?php

	class Settings extends Eloquent{
		public $timestamps = false;

		//gets latest data
		public function getdatalatest($userid){
			$result = DB::table('settings')
									->select('*')
									->where('userid', $userid)
									->get();
			return $result;

		}

	}
?>