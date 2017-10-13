<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class News extends Model
{
    use Sluggable;


    protected $table = 'news';
    protected $fillable = ['head','main_image', 'desc', 'slug'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'head'
            ]
        ];
    }
}
