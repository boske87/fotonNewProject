<?php

namespace App\Http\Controllers;

use App\Doc;
use Illuminate\Http\Request;

class DocsController extends Controller
{
    public function index ()
    {
        $members = Doc::where('front', 0)->get();

        return view('front.club.docs', compact('members'));
    }
}
