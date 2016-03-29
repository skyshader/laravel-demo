<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{

	protected $fillable = [
		'day',
		'slot_from',
		'slot_to'
	];
    
	public function academy()
	{
		return $this->belongsTo(Slot::class);
	}

}
