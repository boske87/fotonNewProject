<?php

namespace App\Http\Controllers\Admin;

use App\AdvanceGallery;
use App\AdvanceText;
use App\Http\Requests\AdvanceGalleryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Skippaz\Services\UploadService;
use App\Skippaz\Admin\AdminTrait;

class AdvanceController extends Controller
{
    use UploadService;
    use AdminTrait;

    public function index($id)
    {
        $homeText = AdvanceText::find($id);

        return view('admin.advance.index', compact('id','homeText'));
    }

    public function advanceUpdate($id, Request $request)
    {
        $homeText = AdvanceText::find($id);

        $input = $request->all();


        if(isset($input['imageHiden'])) {
            $input['imageHiden'] = $this->upload('imageHiden', 'img/advancePage');
        }


        $homeText->update($input);

        return redirect()->route('admin.advance', '1')->withFlashMessage("Updated successfully.")->withFlashType('success');
    }

    public function advanceGallery(){
        $items = AdvanceGallery::orderBy('ordering', 'asc')->get();
        return view('admin.advance.gallery', compact('items'));
    }

    public function advanceGalleryAdd()
    {
        return view('admin.advance.gallery-add');
    }

    public function advanceGalleryAddStore(AdvanceGalleryRequest $request)
    {
        $input = $request->all();



        // upload
        $input['main_image'] = $this->upload('main_image', 'img/gallery');

        AdvanceGallery::create($input);

        return redirect()->route('admin.advance-gallery')->withFlashMessage("Insert image successfully.")->withFlashType('success');
    }

    public function advanceGalleryDelete($id)
    {
        AdvanceGallery::destroy($id);

        return redirect()->route('admin.advance-gallery')->withFlashMessage("Delete image successfully.")->withFlashType('success');
    }
}
