<?php

class Users extends Eloquent {

	public $timestamps = false;

	//checks if the db has the user information
	public function loginUser ($username, $password) {

		$result = DB::table('user')
						->where('username', '=', $username)
						->where('password', '=', $password)
						->first();

		return $result;
	}
}
?>