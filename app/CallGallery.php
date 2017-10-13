<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CallGallery extends Model
{
    public $timestamps = false;
    protected $table = 'callGallery';

    protected $fillable = ['galleryName','userId', 'desc_gal', 'time'];


    public function userGalleryImage(){
        return $this->hasMany('App\CallGalleryImage', 'galleryId', 'id');
    }
}
