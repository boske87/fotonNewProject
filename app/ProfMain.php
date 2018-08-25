<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class ProfMain extends Model
{

    use Sluggable;

    protected $table = 'profesori';
    protected $fillable = ['galleryName','userId','main_image','desc', 'slug','gallery_id','created_at'];



    public function gallery()
    {
        return $this->hasMany('App\ProfGallery','prof_id','id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
