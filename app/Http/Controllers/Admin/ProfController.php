<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProfGalleryRequest;
use App\Http\Requests\ProfMainRequest;
use App\ProfGallery;
use App\ProfMain;
use App\ProfText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Skippaz\Services\UploadService;
use App\Skippaz\Admin\AdminTrait;

class ProfController extends Controller
{
    use UploadService;
    use AdminTrait;

    public function index()
    {
        $items = ProfMain::all();
        return view('admin.prof.index', compact('items'));

    }

    public function add()
    {
        return view('admin.prof.add');
    }


    public function store(ProfMainRequest $request)
    {
        $input = $request->all();

        // upload
        $input['main_image'] = $this->upload('main_image', 'img/gallery');


        ProfMain::create($input);

        return redirect()->route('admin.prof')->withFlashMessage("Insert image successfully.")->withFlashType('success');
    }

    public function edit($id){

        $item = ProfMain::find($id);
        return view('admin.prof.edit', compact('id','item'));

    }

    public function update($id, Request $request)
    {
        $homeText = ProfMain::find($id);

        $input = $request->all();

        // upload
        if(isset($input['main_image']))
            $input['main_image'] = $this->upload('main_image', 'img/gallery');


        $homeText->update($input);



        return redirect()->route('admin.prof', '1')->withFlashMessage("Updated successfully.")->withFlashType('success');
    }

    public function view($id)
    {
        $prof = ProfMain::find($id);

        return view('admin.prof.gallery', compact('prof'));
    }


    public function galleryAdd($id)
    {


        return view('admin.prof.gallery-add', compact('id'));

    }

    public function galleryStore(ProfGalleryRequest $request)
    {
        $input = $request->all();

        // upload
        $inputNew['prof_id'] = $input['id'];
        $inputNew['main_image'] = $this->upload('main_image', 'img/gallery');

        ProfGallery::create($inputNew);

        return redirect()->route('admin.prof.view', $input['id'])->withFlashMessage("Insert image successfully.")->withFlashType('success');
    }

    public function delete($id)
    {
        ProfMain::destroy($id);

        return redirect()->route('admin.prof')->withFlashMessage("Delete image successfully.")->withFlashType('success');
    }

    public function deleteImageGallery($id)
    {
        ProfGallery::destroy($id);

        return redirect()->back()->withFlashMessage("Delete image successfully.")->withFlashType('success');
    }

    public function editText($id){
        $homeText = ProfText::find($id);


        return view('admin.prof.text', compact('id','homeText'));
    }

    public function editUpdate($id, Request $request)
    {
        $homeText = ProfText::find($id);

        $input = $request->all();

        $homeText->update($input);


        return redirect()->route('admin.prof-text', '1')->withFlashMessage("Updated successfully.")->withFlashType('success');
    }
}
