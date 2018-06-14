<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function memberList() {
        $members = User::where('type', 0)->orderBy('ime_prezime','ASC')->get();

        return view('front.club.members', compact('members'));
    }
}
