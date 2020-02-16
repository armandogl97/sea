<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	//$project->user
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	//$project->characteristics
	public function characteristics()
	{
		return $this->hasMany(Characteristic::class);
	}

	//$project->elements
	public function elements()
	{
		return $this->hasMany(Element::class);
	}

	//$project->red
	public function networks()
	{
		return $this->hasMany(Network::class);
	}
}
