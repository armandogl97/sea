<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class TestController extends Controller
{
	public function welcome()
	{
		return view('welcome');
	}

	public function manual()
	{
		return Storage::response("uploads/MANUAL-SEA.pdf");
	}
}
