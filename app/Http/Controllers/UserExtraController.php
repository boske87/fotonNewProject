<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserExtraController extends Controller
{
    public function index($id){
        $user = User::find($id);
        $myGal = $user->userGallery;
        $callGal = $user->callGallery;


        return view('front.club.otherView.profile', compact('callGal', 'myGal', 'user'));

    }
}
