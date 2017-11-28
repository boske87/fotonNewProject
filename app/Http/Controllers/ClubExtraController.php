<?php

namespace App\Http\Controllers;

use App\ClubNews;
use App\Comment;
use App\News;
use App\UserGalleryImage;
use DB;
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

    public function newsDelete($id)
    {
        ClubNews::find($id)->delete();
        return redirect()->route('foton-klub.vesti')->withFlashType('success');
    }

    public function profCommImage()
    {
        $items = Comment::where('comments.typeId', 0)
            ->leftjoin('usersGalleryImage', 'comments.imageId','=','usersGalleryImage.id')
            ->groupBy('comments.imageId')
            ->orderby('comments.id', 'desc')
            ->get();
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


    public function commentsImage()
    {
        $items = Comment::where('comments.typeId', 0)
            ->leftjoin('usersGalleryImage', 'comments.imageId','=','usersGalleryImage.id')
            ->groupBy('comments.imageId')
            ->orderby('comments.id', 'desc')
            ->get();
        $new_com = array();

        $comments = DB::table('comments')
            ->select('imageId', DB::raw('count(*) as comments'))
            ->where('typeId', 0)
            ->groupBy('imageId')
            ->get();

        foreach ($comments as $one) {
            $new_com [$one->imageId] = $one->comments;
        }
//        dd($items);
        return view('front.club.commentImage', compact('items', 'new_com'));

    }

}
