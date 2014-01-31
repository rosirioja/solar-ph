<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function postUser()
	{
		$username = Input::get('username');
		$password = Input::get('password');
		$password = md5($password);

		$user = new Users;
		$result = $user->loginUser($username, $password);

		//checks if the user has an account
		if($result){
			Session::put('userid', $result->id);
			Session::put('username', $result->username);

			return "true";
		}else{
			return "false";
		}
	}
}