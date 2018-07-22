<?php

namespace App\Http\Controllers\Admin;


use App\CallGallery;
use App\CallGalleryImage;

use App\Http\Requests\Admin\AddGallRequest;
use App\Skippaz\Services\UploadService;
use App\User;
use App\UserGallery;
use App\UserGalleryImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CallController extends Controller
{
    use UploadService;

    public function index($id){
//        dd(storage_path(),resource_path(),public_path());
        $items = CallGallery::where('userId', $id)->get();
        $user = User::find($id);
        return view('admin.call.index', compact('items', 'id', 'user'));
    }

    public function addGallery($id){

        return view('admin.call.addGallery', compact('id'));
    }



    public function storeGallery(AddGallRequest $request, $id)
    {
        CallGallery::create([
            'galleryName' => $request->get('galleryName'),
            'desc_gal' => $request->get('desc_gal'),
            'userId' => $id

        ]);
        return redirect()->route('admin.user.gallery.call', $id)->withFlashMessage("Album zvanja je uspesno kreiran.")->withFlashType('success');
    }

    public function galleryImageDelete($id)
    {

        CallGallery::where('id', $id)->delete();

        CallGalleryImage::where('galleryId',$id)->delete();

        return redirect()->route('admin.user.gallery.call', Auth::user()->id)->withFlashMessage("Album zvanja je uspesno obrisan.")->withFlashType('success');
    }


    public function galleryImage($id)
    {
        $callGallery = callGallery::find($id);
        $items = CallGalleryImage::where('galleryId',$id)->get();


        return view('admin.call.indexGallery', compact('items', 'id', 'callGallery'));
    }

    public function addGalleryImage($id)
    {

        return view('admin.call.addImage', compact('id'));
    }

    public function addGalleryImageFromMyGallery($id)
    {
        $items = UserGallery::where('userId', $id)->get();


        $callGallery = callGallery::find(Input::get('callGalId'));
        foreach ($callGallery->userGalleryImage as $o) {
            $allImage [$o->main_image] = $o->main_image;
        }

        $callGalId = Input::get('callGalId');
        return view('admin.call.fromMyGallery', compact('id','items', 'callGalId', 'allImage'));
    }

    public function storeGalleryImageFromMyGallery(Request $request,$id)
    {
        $userImages = UserGalleryImage::whereIn('id',$request->get('image'))->get();
        $items = UserGallery::find($id);

        if($userImages) {
            foreach ($userImages as $oneImage) {

                $input['main_image'] = $oneImage->main_image;
                if(file_exists(public_path('img/gallery/mygallery'.Input::get('userId').'/'.$oneImage->main_image))){

                    if(!file_exists(public_path('img/gallery/galerija_zvanja'.$id.'/')) ){
                       mkdir(public_path('img/gallery/galerija_zvanja'.$id.'/'));
                    }

                    $success = \File::copy(public_path('img/gallery/mygallery'.Input::get('userId').'/'.$oneImage->main_image)
                        ,public_path('img/gallery/galerija_zvanja'.$id.'/'.$oneImage->main_image));
                }

                CallGalleryImage::create([
                    'main_image' => $input['main_image'],
                    'galleryId' => $id
                ]);
            }
        }
        return redirect()->route('admin.user.gallery.call.view', $id)
            ->withFlashMessage("Uspesno dodata slika u album zvanja")
            ->withFlashType('success');
    }


    public function storeGalleryImage(Request $request, $id)
    {
        $input = $request->all();

        // upload
        $input['main_image'] = $this->upload('main_image', 'img/gallery/galerija_zvanja'.$id.'/');

        CallGalleryImage::create([
            'main_image' => $input['main_image'],
            'galleryId' => $id
        ]);

        return redirect()->route('admin.user.gallery.call.view', $id)
                        ->withFlashMessage("Uspesno dodata slika u album zvanja")
                        ->withFlashType('success');
    }

    public function deleteImage($id)
    {
        CallGalleryImage::destroy($id);

        return redirect()->back()->withFlashMessage("Delete image successfully.")->withFlashType('success');
    }
}
