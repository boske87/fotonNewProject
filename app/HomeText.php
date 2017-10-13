<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeText extends Model
{

    protected $table = 'frontText';
    protected $fillable = ['Text1','Text2','Text3','Text4','Text5','Text6','Text7','Text8'];
}
