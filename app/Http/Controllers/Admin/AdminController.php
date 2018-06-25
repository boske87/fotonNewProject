<?php

namespace App\Http\Controllers\Admin;

use App\HomeGallery;
use App\HomeText;
use App\Http\Requests\HomeGalleryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Skippaz\Services\UploadService;
use App\Skippaz\Admin\AdminTrait;

class AdminController extends Controller
{
    use UploadService;
    use AdminTrait;

    protected $per_page_items = 20;

    protected $reorderEnabled = true;

    public function index()
    {
        return view('admin');
    }


    public function home($id)
    {
        $homeText = HomeText::find($id);

        return view('admin.pocetna.index', compact('id','homeText'));
    }


    public function homeUpdate($id, Request $request)
    {
        $homeText = HomeText::find($id);

        $input = $request->all();

        $homeText->update($input);

        return redirect()->route('admin.home', '1')->withFlashMessage("Updated successfully.")->withFlashType('success');
    }


    public function homeGallery(){
        $items = HomeGallery::orderBy('ordering', 'asc')->get();
        return view('admin.pocetna.gallery', compact('items'));
    }

    public function homeGalleryAdd()
    {
        return view('admin.pocetna.gallery-add');
    }

    public function homeGalleryAddStore(HomeGalleryRequest $request)
    {
        $input = $request->all();

        // upload
        $input['main_image'] = $this->upload('main_image', 'img/gallery');

        HomeGallery::create($input);

        return redirect()->route('admin.home-gallery')->withFlashMessage("Insert image successfully.")->withFlashType('success');
    }

    public function homeGalleryDelete($id)
    {
        HomeGallery::destroy($id);

        return redirect()->route('admin.home-gallery')->withFlashMessage("Delete image successfully.")->withFlashType('success');
    }
}
