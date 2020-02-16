<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Law extends Model
{
    //$law->user
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
