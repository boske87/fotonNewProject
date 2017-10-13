<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\GalleryText;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $id = 1;
        $items = Gallery::orderBy('ordering', 'asc')->get();
        $text = GalleryText::find($id);
        return view('front.gallery-new',compact('items','text'));
    }
}
