<?php

namespace App\Http\Controllers;

use App\News;
use App\NewsPopUp;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        $popUp = NewsPopUp::find(1);

        return view('front.news', compact('news','popUp'));
    }

    public function news($slug)
    {
        $newsOne = News::whereSlug($slug)->first();
        return view('front.news-one', compact('newsOne'));
    }
}
