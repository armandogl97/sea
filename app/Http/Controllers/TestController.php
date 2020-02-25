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
		$filePath = 'uploads/MANUAL-SEA.pdf';
		$content = Storage::disk('local_public')->get($filePath);
		dd($content);
		//return Storage::response("uploads/MANUAL-SEA.pdf");
	}
}
