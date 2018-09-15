<?php

namespace App\Http\Controllers\Admin;

use App\BasicGallery;
use App\BasicText;
use App\Http\Requests\BasicGalleryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Skippaz\Services\UploadService;
use App\Skippaz\Admin\AdminTrait;

class BasicController extends Controller
{
    use UploadService;
    use AdminTrait;

    protected $per_page_items = 20;

    protected $reorderEnabled = true;

    public function index($id)
    {
        $homeText = BasicText::find($id);

        return view('admin.basic.index', compact('id','homeText'));
    }

    public function basicUpdate($id, Request $request)
    {
        $homeText = BasicText::find($id);

        $input = $request->all();

        // upload
        $input['imageHiden'] = $this->upload('imageHiden', 'img/basicPage');

        $homeText->update($input);

        return redirect()->route('admin.basic', '1')->withFlashMessage("Updated successfully.")->withFlashType('success');
    }

    public function basicGallery(){
        $items = BasicGallery::orderBy('ordering', 'asc')->get();
        return view('admin.basic.gallery', compact('items'));
    }

    public function basicGalleryAdd()
    {
        return view('admin.basic.gallery-add');
    }

    public function basicGalleryAddStore(BasicGalleryRequest $request)
    {
        $input = $request->all();

        // upload
        $input['main_image'] = $this->upload('main_image', 'img/gallery');

        BasicGallery::create($input);

        return redirect()->route('admin.basic-gallery')->withFlashMessage("Insert image successfully.")->withFlashType('success');
    }

    public function basicGalleryDelete($id)
    {
        BasicGallery::destroy($id);

        return redirect()->route('admin.basic-gallery')->withFlashMessage("Delete image successfully.")->withFlashType('success');
    }
}
