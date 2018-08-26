<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\GalleryText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Skippaz\Services\UploadService;
use App\Skippaz\Admin\AdminTrait;

class GalleryController extends Controller
{
    use UploadService;
    use AdminTrait;

    protected $per_page_items = 20;

    protected $reorderEnabled = true;

    public function index()
    {
        $items = Gallery::orderBy('ordering', 'asc')->get();

        return view('admin.gallery.index',compact('items'));
    }

    public function add()
    {
        return view('admin.gallery.add');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        // upload
        $input['main_image'] = $this->upload('main_image', 'img/gallery');

        Gallery::create($input);

        return redirect()->route('admin.gallery')->withFlashMessage("Insert image successfully.")->withFlashType('success');
    }

    public function delete($id)
    {

        Gallery::destroy($id);

        return redirect()->route('admin.gallery')->withFlashMessage("Delete image successfully.")->withFlashType('success');
    }


    public function text()
    {
        $id = 1;
        $homeText = GalleryText::find($id);

        return view('admin.gallery.text', compact('id','homeText'));
    }

    public function textStore(Request $request)
    {
        $id = 1;
        $homeText = GalleryText::find($id);

        $input = $request->all();

        $homeText->update($input);

        return redirect()->route('admin.gallery')->withFlashMessage("Insert image successfully.")->withFlashType('success');
    }
}
