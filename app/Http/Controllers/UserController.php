<?php

namespace App\Http\Controllers;

use App\User;
use App\Hotel;
use App\Comments;

class UserController extends Controller
{
	public function index($id=null)
	{
		
	}

	public function dashboard()
	{
		$hotel = new Hotel();
		return view("vendor.dashboard")->with(["data"=>$hotel]);
	}

	public function addComment($comments)
	{
		# code...
	}
	

}