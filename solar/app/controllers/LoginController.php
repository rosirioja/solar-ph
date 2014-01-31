<?php

class LoginController extends \BaseController {

	public function getIndex()
	{
		return View::make("landing.login");
	}
}