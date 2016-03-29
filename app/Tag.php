<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

	protected $fillable = ['name', 'slug'];


	public function academyTags()
	{
		return $this->hasMany(AcademyTag::class);
	}


	public function academies()
	{
		return $this->belongsToMany(Academy::class);
	}

}
