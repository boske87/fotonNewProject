<?php

namespace App\Http\Controllers;

use App\ClubNews;
use App\News;
use App\UserGalleryImage;
use Illuminate\Http\Request;
use App\Skippaz\Services\UploadService;

use Illuminate\Support\Facades\Auth;

class ClubExtraController extends Controller
{
    use UploadService;
    public function newImage()
    {
        $items = UserGalleryImage::where('created_at','>=', Auth::user()->last_login)->get();

        return view('front.club.newImage', compact('items'));
    }

    public function news()
    {
        $news = ClubNews::orderBy('created_at', 'desc')->get();
        return view('front.club.news', compact('news'));
    }

    public function storeNews(Request $request)
    {
        $input = $request->all();
        $input['userId'] = Auth::user()->id;
        // upload
        $input['main_image'] = $this->upload('main_image', 'img/gallery/club-news');

        ClubNews::create($input);

        return redirect()->route('foton-klub.vesti')->withFlashType('success');
    }

    public function oneNews($slug)
    {
        $newsOne = ClubNews::whereSlug($slug)->first();
        return view('front.club.news-one', compact('newsOne'));
    }

}
