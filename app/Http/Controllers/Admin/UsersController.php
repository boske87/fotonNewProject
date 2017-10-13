<?php

namespace App\Http\Controllers\Admin;

use App\Categorie;
use App\User;
use App\UserGallery;
use App\UserGalleryImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $items = User::where('type',0)->get();

        return view('admin.users.index', compact('items'));
    }

    public function edit($id){

        $item = User::find($id);
        $cat = Categorie::pluck('name','id');

        $userStatus = array(
            0 => 'Nekativan',
            1 => 'Aktivan'
        );

        $color = array(
            0 => 'blue',
            1 => 'green',
            2 => 'yellow',
            3 => 'red',
            4 =>'purple'
        );
        return view('admin.users.edit', compact('id','item','cat', 'userStatus', 'color'));

    }


    public function update($id, Request $request)
    {
        $user = User::find($id);
        $input = $request->all();


        $user->update($input);

        return redirect()->route('admin.users', '1')->withFlashMessage("Updated successfully.")->withFlashType('success');
    }

    public function delete($id)
    {
        User::destroy($id);

        return redirect()->route('admin.prof')->withFlashMessage("Delete user successfully.")->withFlashType('success');
    }


    public function gallery($id){
        $items = UserGallery::where('userId', $id)->get();

        return view('admin.users.gallerys', compact('items'));

    }

    public function oneGallery($id) {
        $items = UserGalleryImage::where('galleryId', $id)->get();

        return view('admin.users.oneGallery', compact('items'));
    }

    public function deleteImage($id)
    {
        UserGalleryImage::destroy($id);

        return redirect()->back()->withFlashMessage("Delete image successfully.")->withFlashType('success');
    }
}
