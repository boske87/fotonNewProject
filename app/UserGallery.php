<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGallery extends Model
{
    public $timestamps = false;
    protected $table = 'usersGallery';

    protected $fillable = ['galleryName','userId', 'desc_gal', 'time'];


    public function userGalleryImage(){
        return $this->hasMany('App\UserGalleryImage', 'galleryId', 'id');
    }
}
