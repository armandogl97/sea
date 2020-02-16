<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    //$red->project
	public function project()
	{
		return $this->belongsTo(Project::class);
	}
}
