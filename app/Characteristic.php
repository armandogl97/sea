<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    //$characteristic->project
    public function project()
    {
    	return $this->belongsTo(Project::class);
    }

    // $characteristic->$element
    public function elements()
    {
        return $this->hasMany(Element::class);
    }
}
