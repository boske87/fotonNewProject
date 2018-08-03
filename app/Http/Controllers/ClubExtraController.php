<?php

namespace App\Http\Controllers;

use App\CallGallery;
use App\CallGalleryImage;
use App\ClubNews;
use App\Comment;
use App\Exh;
use App\Gallery;
use App\News;
use App\NewsPopUp;
use App\UserGallery;
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

        $items = UserGalleryImage::where('created_at','>=', Auth::user()->last_login)
            ->groupBy('id')
            ->orderBy('created_at', 'desc')
            ->get();

        $new_com = array();

        $commentsCount = DB::table('comments')
            ->select('imageId', DB::raw('count(*) as comments'))
            ->leftjoin('usersGalleryImage', 'comments.imageId','=','usersGalleryImage.id')
            ->where('usersGalleryImage.created_at','>=', Auth::user()->last_login)
            ->where('typeId', 0)
            ->groupBy('imageId')
            ->get();

        foreach ($commentsCount as $one) {

            $new_com [$one->imageId] = $one->comments;
        }

        //call galery

        $itemsCall = CallGalleryImage::where('created_at','>=', Auth::user()->last_login)
            ->groupBy('id')
            ->get();

        $new_comCall = array();

        $commentsCountCall = DB::table('comments')
            ->select('imageId', DB::raw('count(*) as comments'))
            ->leftjoin('callGalleryImage', 'comments.imageId','=','callGalleryImage.id')
            ->where('callGalleryImage.created_at','>=', Auth::user()->last_login)
            ->where('typeId', 1)
            ->groupBy('imageId')
            ->get();

        foreach ($commentsCountCall as $one) {

            $new_comCall [$one->imageId] = $one->comments;
        }

        $gallUser = array();
        $galle = UserGallery::all();

        foreach ($galle as $oneG){
            $gallUser[$oneG->id] = $oneG->userId;
        }

        $galleCall = CallGallery::all();
        $galleCallUser = array();
        foreach ($galleCall as $oneG){
            $galleCallUser[$oneG->id] = $oneG->userId;
        }



        return view('front.club.newImage', compact('items', 'new_com','itemsCall', 'new_comCall', 'galleCallUser', 'gallUser'));
    }

    public function newsDelete($id)
    {
        ClubNews::find($id)->delete();
        return redirect()->route('foton-klub.vesti')->withFlashType('success');
    }


    public function newsEdit($id, Request $request) {

        $homeText = ClubNews::find($id);

        $input['userId'] = Auth::user()->id;

        $input = $request->all();

        $homeText->update($input);

        return redirect()->route('foton-klub.vesti')->withFlashType('success');
    }

    public function profCommImage()
    {
        $items = Comment::where('comments.typeId', 0)
            ->leftjoin('usersGalleryImage', 'comments.imageId','=','usersGalleryImage.id')
            ->leftjoin('users', 'comments.userId','=','users.id')
            ->where('comments.created_at','>=', Auth::user()->last_login)
            ->where('users.type', 1)
            ->groupBy('comments.imageId')
            ->orderby('comments.id', 'desc')
            ->get();

        $gallUser = array();
        $galle = UserGallery::all();

        foreach ($galle as $oneG){
            $gallUser[$oneG->id] = $oneG->userId;
        }

        foreach ($galle as $oneGal){
            $galle [$oneGal->id] = $oneGal->userId;
        }

        $comments = DB::table('comments')
            ->select('imageId', DB::raw('count(*) as comments'))
            ->where('typeId', 0)
            ->groupBy('imageId')
            ->get();

        foreach ($comments as $one) {
            $new_com [$one->imageId] = $one->comments;
        }

        //user call gallery
        $itemsCall = Comment::where('comments.typeId', 1)
            ->leftjoin('callGalleryImage', 'comments.imageId','=','callGalleryImage.id')
            ->leftjoin('users', 'comments.userId','=','users.id')
            ->where('comments.created_at','>=', Auth::user()->last_login)
            ->where('users.type', 1)
            ->groupBy('comments.imageId')
            ->orderby('comments.id', 'desc')
            ->get();

        $galleCall = CallGallery::all();
        $galleCallUser = array();
        foreach ($galleCall as $oneG){
            $gallUser[$oneG->id] = $oneG->userId;
        }

        foreach ($galleCall as $oneGal){
            $galleCallUser [$oneGal->id] = $oneGal->userId;
        }

        $commentsCall = DB::table('comments')
            ->select('imageId', DB::raw('count(*) as comments'))
            ->where('typeId', 1)
            ->groupBy('imageId')
            ->get();

        foreach ($commentsCall as $one) {
            $new_comCall [$one->imageId] = $one->comments;
        }


        return view('front.club.commentProf', compact('items', 'new_com', 'galle', 'itemsCall', 'new_comCall', 'galleCall', 'gallUser', 'galleCallUser'));
    }



    public function news()
    {
        $popUp = NewsPopUp::find(2);
        $news = ClubNews::orderBy('created_at', 'desc')->get();
        return view('front.club.news', compact('news','popUp'));
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

        //user gall
        $items = Comment::where('comments.typeId', 0)
            ->leftjoin('usersGalleryImage', 'comments.imageId','=','usersGalleryImage.id')
            ->where('comments.created_at','>=', Auth::user()->last_login)
            ->groupBy('comments.imageId')
            ->orderby('comments.id', 'desc')
            ->get();

        $gallUser = array();
        $gall = UserGallery::all();

        foreach ($gall as $oneG){
            $gallUser[$oneG->id] = $oneG->userId;
        }

        foreach ($gall as $oneGal){
            $galle [$oneGal->id] = $oneGal->userId;
        }




        $new_com = array();

        $comments = DB::table('comments')
            ->select('imageId', DB::raw('count(*) as comments'))
            ->where('typeId', 0)
            ->groupBy('imageId')
            ->get();

        foreach ($comments as $one) {
            $new_com [$one->imageId] = $one->comments;
        }


        //call gall

        $itemsCall = Comment::where('comments.typeId', 1)
            ->leftjoin('callGalleryImage', 'comments.imageId','=','callGalleryImage.id')
            ->where('comments.created_at','>=', Auth::user()->last_login)
            ->groupBy('comments.imageId')
            ->orderby('comments.id', 'desc')
            ->get();



        $gallUserCall = array();
        $gallCall = CallGallery::all();
        foreach ($gallCall as $oneG){
            $gallUserCall[$oneG->id] = $oneG->userId;
        }



        foreach ($gallCall as $oneGal){
            $galleCall [$oneGal->id] = $oneGal->userId;
        }

        $new_comCall = array();

        $commentsCall = DB::table('comments')
            ->select('imageId', DB::raw('count(*) as comments'))
            ->where('typeId', 1)
            ->groupBy('imageId')
            ->get();

        foreach ($commentsCall as $one) {
            $new_comCall [$one->imageId] = $one->comments;
        }

        return view('front.club.commentImage', compact('items', 'new_com', 'galle','itemsCall', 'new_comCall', 'galleCall', 'gallUserCall', 'gallUser'));

    }


    public function exhibitions() {

        $items = Exh::orderBy('created_at', 'DESC')->get();


        return view('front.club.izlozbe', compact('items'));
    }

    public function exhibitionsAdd(Request $request){
        $input = $request->all();


        $input['userId'] = Auth::user()->id;

        Exh::create($input);

        return redirect()->route('foton-klub.izlozbe-konkursi')->withFlashType('success');

    }

    public function exhibitionsDelete($id) {
        Exh::find($id)->delete();
        return redirect()->route('foton-klub.izlozbe-konkursi')->withFlashType('success');
    }

    public function exhibitionsEdit($id, Request $request) {

        $homeText = Exh::find($id);
        $input['userId'] = Auth::user()->id;

        $input = $request->all();

        $homeText->update($input);

        return redirect()->route('foton-klub.izlozbe-konkursi')->withFlashType('success');
    }



}
