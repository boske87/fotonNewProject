<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClubText extends Model
{
    protected $table = 'clubText';
    public $timestamps = false;
    protected $fillable = ['Text1','Text2'];
}
