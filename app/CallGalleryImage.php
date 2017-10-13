<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CallGalleryImage extends Model
{
    public $timestamps = false;
    protected $table = 'callGalleryImage';

    protected $fillable = ['main_image','galleryId','ordering'];
}
