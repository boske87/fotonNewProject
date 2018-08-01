<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkClub extends Model
{
    protected $table = 'linksClub';
    protected $fillable = ['head','desc','url', 'userId'];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'userId');
    }
}
