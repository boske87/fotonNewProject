<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsRequest;
use App\Link;
use App\News;
use App\NewsPopUp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Skippaz\Services\UploadService;
use App\Skippaz\Admin\AdminTrait;

class NewsController extends Controller
{
    use UploadService;
    use AdminTrait;

    public function index()
    {
        $items = News::orderBy('created_at', 'desc')->get();



        return view('admin.news.index', compact('items'));
    }

    public function add()
    {
        return view('admin.news.create');
    }

    public function store(NewsRequest $request)
    {
        $input = $request->all();

        // upload
        $input['main_image'] = $this->upload('main_image', 'img/gallery');

        News::create($input);

        return redirect()->route('admin.news')->withFlashMessage("Insert image successfully.")->withFlashType('success');
    }

    public function delete($id)
    {
        News::destroy($id);

        return redirect()->route('admin.news')->withFlashMessage("Delete image successfully.")->withFlashType('success');
    }

    public function edit($id)
    {
        $item = News::find($id);

        return view('admin.news.edit', compact('id','item'));
    }

    public function update($id, Request $request)
    {
        $homeText = News::find($id);

        $input = $request->all();

        // upload
        if(isset($input['main_image']))
            $input['main_image'] = $this->upload('main_image', 'img/gallery');

        $homeText->update($input);

        return redirect()->route('admin.news')->withFlashMessage("Updated successfully.")->withFlashType('success');
    }


    public function editPopUp ($id)
    {
        $item = NewsPopUp::find($id);

        return view('admin.news.pop', compact('id','item'));
    }


    public function updatePopUp($id, Request $request)
    {
        $popUp = NewsPopUp::find($id);
        $input = $request->all();

        $popUp->update($input);

        return redirect()->route('admin.news', 1)->withFlashMessage("Updated successfully.")->withFlashType('success');
    }


    public function links()
    {
        $items = Link::all();

        return view('admin.links.links', compact('items'));
    }

    public function linkAdd()
    {
        return view('admin.links.add');
    }

    public function linkStore(Request $request)
    {
        $input = $request->all();

        // upload
        $input['main_image'] = $this->upload('main_image', 'img/gallery');

        Link::create($input);

        return redirect()->route('admin.links')->withFlashMessage("Insert image successfully.")->withFlashType('success');
    }

    public function linkDelete($id)
    {
        Link::destroy($id);

        return redirect()->route('admin.links')->withFlashMessage("Delete image successfully.")->withFlashType('success');
    }
}
