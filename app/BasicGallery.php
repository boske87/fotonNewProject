<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasicGallery extends Model
{
    protected $table = 'pocetniGallery';
    protected $fillable = ['name','main_image','ordering'];
}
