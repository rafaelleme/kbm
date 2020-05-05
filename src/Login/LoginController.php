<?php

namespace App\Login;

use Config\Controller\Controller;

class LoginController extends Controller
{
	public function index()
	{
	    return $this->service->login();
	}
}
