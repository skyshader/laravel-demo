<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{

	protected $fillable = [
		'username',
		'email',
		'phone',
		'name',
		'description'
	];


    public function slots()
    {
    	return $this->hasMany(Slot::class);
    }


    public function images()
    {
    	return $this->hasMany(Image::class);
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


    public function addTags(array $tagsRequest)
    {
        if(isset($tagsRequest[0])) {
            foreach($tagsRequest as $tagRequest) {
                $tag = Tag::where('name', $tagRequest)->first();
                if(empty($tag)) {
                    $tag = new Tag(array(
                        'name' => $tagRequest,
                        'slug' => str_slug($tagRequest)
                    ));
                    $tag->save();
                } else {
                    if($tag->status === 0) {
                        $tag->status = 1;
                        $tag->update();
                    }
                }
                $this->tags()->attach($tag->id);
            }
        }
    }


    public function addSlots(array $slotsRequest)
    {
        $slots = Array();
        if(isset($slotsRequest[0])) {
            foreach($slotsRequest as $slotRequest) {
                if($slotRequest['day'] === 0) continue;
                $slot = new Slot(array(
                    'day' => $slotRequest['day'],
                    'slot_from' => $slotRequest['slot_from'],
                    'slot_to' => $slotRequest['slot_to']
                ));
                $slots[] = $slot;
            }
        }
    	$this->slots()->saveMany($slots);
    }


    public function addImages(array $imagesRequest)
    {
        $images = Array();
        if(isset($imagesRequest[0])) {
            foreach($imagesRequest as $imageRequest) {
                $image = new Image();
                $image->uploadAndFill($imageRequest);
                $images[] = $image;
            }
        }
        $this->images()->saveMany($images);
    }


    public function path()
    {
    	return url('/') . '/academy/' . $this->id;
    }


    protected $geofields = array('location');
     

    public function setLocationAttribute($value)
    {
        $this->attributes['location'] = DB::raw("POINT($value)");
    }

 
    public function getLocationAttribute($value)
    {
        $loc = substr($value, 6);
        $loc = preg_replace('/[ ,]+/', ',', $loc, 1);
 
        return substr($loc,0,-1);
    }


    public function getLocation()
    {
        $location = explode(',', $this->location);
        foreach ($location as $key => $value) {
            $location[$key] = trim($value);
        }
        return $location;
    }


    public function locationData()
    {
        $location = $this->getLocation();
        array_unshift($location, $this->name);
        array_unshift($location, $this->path());
        array_unshift($location, $this->id);
        return $location;
    }

}
