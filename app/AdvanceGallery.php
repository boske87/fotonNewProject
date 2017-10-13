<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvanceGallery extends Model
{
    protected $table = 'advanceGallery';
    protected $fillable = ['name','main_image','ordering'];
}
