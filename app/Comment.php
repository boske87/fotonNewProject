<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    protected $table = 'comments';

    protected $fillable = ['userId','galleryId', 'imageId', 'typeId', 'comment'];
}
