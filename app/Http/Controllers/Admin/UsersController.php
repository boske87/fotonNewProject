<?php

namespace App\Http\Controllers\Admin;

use App\Categorie;
use App\Http\Requests\UserMainRequest;
use App\Skippaz\Admin\AdminTrait;
use App\Skippaz\Services\UploadService;
use App\User;
use App\UserGallery;
use App\UserGalleryImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    use UploadService;
    use AdminTrait;
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

    public function add(){
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

        return view('admin.users.create', compact('cat', 'userStatus', 'color'));
    }

    public function store(UserMainRequest $request)
    {
        $input = $request->all();

        // upload
        $input['fotografija_lica'] = $this->upload('main_image', 'img/gallery');

        User::create($input);

        return redirect()->route('admin.users')->withFlashMessage("Insert new user successfully.")->withFlashType('success');
    }


    public function update($id, Request $request)
    {

        $user = User::find($id);
        $input = $request->all();
        // upload
        if(isset($input['main_image']))
            $input['fotografija_lica'] = $this->upload('main_image', 'img/gallery');

        $user->update($input);

        return redirect()->route('admin.users', '1')->withFlashMessage("Updated successfully.")->withFlashType('success');
    }

    public function delete($id)
    {
        User::destroy($id);

        return redirect()->route('admin.users')->withFlashMessage("Delete user successfully.")->withFlashType('success');
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
