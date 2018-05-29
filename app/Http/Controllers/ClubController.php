<?php

namespace App\Http\Controllers;

use App\ClubGallery;
use App\ClubText;
use App\Comment;
use App\Skippaz\Services\UploadService;
use App\UserGallery;
use App\UserGalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ClubController extends Controller
{
    use UploadService;

    public function index()
    {
        if(Auth::user()){
            return redirect(route("foton-klub.my-profile"));
        }
        $items = ClubGallery::orderby('ordering','asc')->get();
        $text = ClubText::findOrFail(1);

        return view('front.club.index', compact('items','text'));
    }

    public function createGallery()
    {
        return view('front.club.createGal');
    }

    public function addImageGallery($id, Request $request)
    {
        $gal = UserGallery::find($id);
        return view('front.club.addImageGal', compact('gal'));
    }

    public function storeGallery(Request $request)
    {

            $gal = UserGallery::create([
                'galleryName' => $request->get('galleryName'),
                'desc_gal' => $request->get('desc_gal'),
                'userId' => Auth::user()->id
            ]);
        return view('front.club.addImageGal', compact('gal'));
    }

    public function createGalleryImage(Request $request)
    {
        // upload
        $input['main_image'] = $this->upload('qqfile', 'img/gallery/mygallery'.Auth::user()->id.'/');
        UserGalleryImage::create([
            'main_image' => $input['main_image'],
            'galleryId' => $request->get('gal_id')
        ]);

        return response()->json(["success" => true]);

    }

    public function stepOne()
    {
        $myGal = Auth::user()->userGallery;
        return view('front.club.one', compact('myGal'));
    }

    public function myProfile()
    {
        $myGal = Auth::user()->userGallery;
        $callGal = Auth::user()->callGallery;
//        dd($callGal);
//        dd($callGal);
        return view('front.club.profile', compact('callGal', 'myGal'));
    }
    public function galleryOne($id)
    {
        $items = UserGalleryImage::where('galleryId', $id)->orderby('id','desc')->get();
        $gallery = UserGallery::find($id);
        $user_id = Auth::user()->id;

        $new_com = array();
        $comments = DB::table('comments')
            ->select('imageId', DB::raw('count(*) as comments'))
            ->where('typeId', 0)
            ->groupBy('imageId')
            ->get();

        foreach ($comments as $one) {
            $new_com [$one->imageId] = $one->comments;
        }

        return view('front.club.strana3', compact('items', 'id', 'gallery','user_id','new_com'));
    }

    public function imageOne($id, $idImage)
    {

        $gallery = UserGallery::leftjoin('users', 'usersGallery.userId','=','users.id')->first();

        $comments = Comment::where('galleryId', $id)
            ->where('typeId', 0)
            ->where('imageId', $idImage)
            ->get();

        $excludeImage = UserGalleryImage::where('galleryId', $id)
            ->where('id','<>', $idImage)
            ->get();

        $item = UserGalleryImage::where('galleryId', $id)
        ->where('id', $idImage)
        ->first();

        $new_com = array();

        $comments = DB::table('comments')
            ->select('imageId', DB::raw('count(*) as comments'))
            ->groupBy('imageId')
            ->get();

        foreach ($comments as $one) {
            $new_com [$one->imageId] = $one->comments;
        }

        UserGalleryImage::where('id',$item->id)->Increment('view', 1);



        return view('front.club.imageGalSlide',compact('excludeImage', 'gallery', 'id','idImage','item', 'new_com'));
    }
    public function strana4()
    {
        return view('front.club.strana4');
    }


    public function getComments($imageId, $galleryId)
    {
        $images = Comment::where('galleryId', $galleryId)
            ->leftjoin('users', 'comments.userId','=','users.id')
            ->where('imageId', $imageId)
            ->where('typeId', 0)
            ->get();

        $image = UserGalleryImage::find($imageId);
//        $user =
        return response()->json(["result" => $images, 'image' => $image]);
    }


    public function updateAjax($type, $imageId, Request $request)
    {
        if($type == 'view') {
            UserGalleryImage::where('id',$imageId)->Increment('view', 1);
        }
        if($type == 'com') {
            Comment::create([
                'userId' => Auth::user()->id,
                'galleryId' => $request->get('galleryId'),
                'imageId' => $imageId,
                'typeId' => 0,
                'comment' => $request->get('comment')
            ]);
        }
    }


    public function deleteGall($id)
    {
        UserGallery::destroy($id);
        return redirect()->back();
    }


    public function updateGallAjax($type, $gallId, Request $request)
    {

        $gallery = UserGallery::find($gallId);

        $gallery->update(['desc_gal'=>$request->input('text')]);
    }

}
