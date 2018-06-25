<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exh extends Model
{
    protected $table = 'exh';

    protected $fillable = ['head','desc', 'userId'];


    public function user()
    {
        return $this->hasOne('App\User', 'id', 'userId');
    }
}
