<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ClubNews extends Model
{
    use Sluggable;


    protected $table = 'clubNews';
    protected $fillable = ['head','userId','main_image', 'desc', 'slug'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'head'
            ]
        ];
    }
}
