<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeGallery extends Model
{

    protected $table = 'frontGallery';
    protected $fillable = ['name','main_image','ordering'];
}
