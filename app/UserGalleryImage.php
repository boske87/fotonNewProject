<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGalleryImage extends Model
{
    protected $table = 'usersGalleryImage';

    protected $fillable = ['main_image','galleryId','ordering','view'];



    public function userGalleryImage(){
        return $this->hasOne('App\UserGallery', 'id', 'galleryId');
    }
}
