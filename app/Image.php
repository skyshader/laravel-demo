<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = [
        'title',
        'image_path'
    ];

    protected $uploadPath = 'uploads';

    
    public function academy()
    {
        return $this->belongsTo(Slot::class);
    }


    public function uploadAndFill($imageRequest)
    {
        $imageName = $imageRequest->getClientOriginalName();
        $imageNameFiltered = preg_replace('/\s+/', '_', $imageName);
        $imageNameModified = time() . '-' . $imageNameFiltered;
        $imageRequest->move(
            $this->uploadPath,
            $imageNameModified
        );
        $this->image_path = $imageNameModified;
        $this->title = $imageName;
    }


    public function path()
    {
        return url('/') . '/' . $this->uploadPath . '/' . $this->image_path;
    }
}
