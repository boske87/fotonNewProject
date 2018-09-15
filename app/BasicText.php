<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasicText extends Model
{
    protected $table = 'pocetniText';
    protected $fillable = ['Text1','Text2','Text3','Text4','Text5','Text6','Text7', 'Text8', 'imageHiden'];
}
