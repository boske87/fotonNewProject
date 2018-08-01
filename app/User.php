<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','ime_prezime','datum_rodjenja','mesto_rodjenja','tel',
        'zavrseno_obrazovanje','trenutno_zaposlenje','zavrsena_skola_fotografije',
        'fotografske_titule_zvanja_diplome','fotografija_lica','umetnicke_aktivnosti',
        'status','type','paketKategorija', 'last_login', 'titula', 'color', 'optionDesc'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function category()
    {
        return $this->hasOne('App\Categorie', 'id', 'paketKategorija');
    }

    public function userGallery(){
        return $this->hasMany('App\UserGallery', 'userId', 'id')->orderBy('id','DESC');
    }

    public function callGallery(){
        return $this->hasMany('App\CallGallery', 'userId', 'id')->orderBy('id','DESC');
    }

}
