<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfGallery extends Model
{
    protected $table = 'profesoriGallery';
    protected $fillable = ['main_image','prof_id'];
}
