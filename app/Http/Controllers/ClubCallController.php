<?php

namespace App\Http\Controllers;

use App\CallGallery;
use App\CallGalleryImage;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Image;


class ClubCallController extends Controller
{
    public function galleryOne($id)
    {

        $items = CallGalleryImage::where('galleryId', $id)->orderby('id', 'desc')->get();
        $gallery = CallGallery::find($id);
        $user_id = Auth::user()->id;

//        dd($gallery);

        $new_com = array();
        $comments = DB::table('comments')
            ->select('imageId', DB::raw('count(*) as comments'))
            ->where('typeId', 1)
            ->groupBy('imageId')
            ->get();

        foreach ($comments as $one) {
            $new_com [$one->imageId] = $one->comments;
        }


        return view('front.club.galZvanja.oneGal', compact('items', 'id', 'gallery','user_id','new_com'));
    }

    public function imageOne($id, $idImage)
    {

        $gallery = CallGallery::leftjoin('users', 'callGallery.userId','=','users.id')
            ->where('callGallery.id',$id)->first();

        $comments = Comment::where('galleryId', $id)
            ->where('typeId', 1)
            ->where('imageId', $idImage)
            ->get();

        $excludeImage = CallGalleryImage::where('galleryId', $id)
            ->where('id','<>', $idImage)
            ->get();

        $item = CallGalleryImage::where('galleryId', $id)
            ->where('id', $idImage)
            ->first();


        $new_com = array();

        $comments = DB::table('comments')
            ->select('imageId', DB::raw('count(*) as comments'))
            ->where('typeId', 1)
            ->groupBy('imageId')
            ->get();

        foreach ($comments as $one) {
            $new_com [$one->imageId] = $one->comments;
        }
        

        CallGalleryImage::where('id',$item->id)->Increment('view', 1);


        return view('front.club.galZvanja.imageSlide',compact('excludeImage', 'gallery', 'id','idImage','item', 'new_com'));
    }


    public function getComments($imageId, $galleryId)
    {
        $images = Comment::where('galleryId', $galleryId)
            ->leftjoin('users', 'comments.userId','=','users.id')
            ->where('imageId', $imageId)
            ->where('typeId', 1)
            ->get();


        $image = CallGalleryImage::find($imageId);

        foreach ($images as $one) {
//            $one->fotografija_lica = Image::load('/gallery/users/'.$one->fotografija_lica, ['h' => 10]);
        }

//        $user =
        return response()->json(["result" => $images, 'image' => $image]);
    }


    public function updateAjax($type, $imageId, Request $request)
    {

        if($type == 'view') {
            CallGalleryImage::where('id',$imageId)->Increment('view', 1);
        }
        if($type == 'com') {
            Comment::create([
                'userId' => Auth::user()->id,
                'galleryId' => $request->get('galleryId'),
                'imageId' => $imageId,
                'typeId' => 1,
                'comment' => $request->get('comment')
            ]);
        }
    }
}
