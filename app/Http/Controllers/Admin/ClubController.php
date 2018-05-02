<?php

namespace App\Http\Controllers\Admin;

use App\ClubGallery;
use App\Http\Requests\ClubGalleryRequest;
use App\Skippaz\Admin\AdminTrait;
use App\Skippaz\Services\UploadService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClubController extends Controller
{
    use UploadService;
    use AdminTrait;

    protected $per_page_items = 20;

    protected $reorderEnabled = true;

    public function gallery(){
        $items = ClubGallery::orderBy('ordering', 'asc')->get();

        return view('admin.club_admin.gallery', compact('items'));
    }

    public function basicGalleryAdd()
    {
        return view('admin.club_admin.gallery-add');
    }

    public function basicGalleryAddStore(ClubGalleryRequest $request)
    {
        $input = $request->all();

        // upload
        $input['main_image'] = $this->upload('main_image', 'img/galleryClub');

        ClubGallery::create($input);

        return redirect()->route('admin.club')->withFlashMessage("Insert image successfully.")->withFlashType('success');
    }

    public function basicGalleryDelete($id)
    {
        ClubGallery::destroy($id);

        return redirect()->route('admin.club')->withFlashMessage("Delete image successfully.")->withFlashType('success');
    }
}
