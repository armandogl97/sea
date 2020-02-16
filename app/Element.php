<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    //$element->characteristic
	public function characteristic()
	{
		return $this->belongsTo(Characteristic::class);
	}

	//$element->project
	public function project()
	{
		return $this->belongsTo(Project::class);
	}
}
