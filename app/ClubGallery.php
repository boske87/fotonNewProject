<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClubGallery extends Model
{
    protected $table = 'clubGallery';
    protected $fillable = ['name','main_image','ordering'];
}
