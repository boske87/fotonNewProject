<?php

namespace App\Http\Controllers\Admin;

use App\Doc;
use App\Skippaz\Admin\AdminTrait;
use App\Skippaz\Services\UploadService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocsController extends Controller
{

    use UploadService;
    use AdminTrait;
    public function index()
    {
        $items = Doc::where('front', 0)->get();


        return view('admin.docs.index', compact('items'));
    }


    public function add()
    {
        return view('admin.docs.add');
    }

    public function addStore(Request $request)
    {
        $input = $request->all();

        // upload
        $input['file'] = $this->upload('file', 'img/docs');

        Doc::create($input);

        if($input['front'] == 1)
            return redirect()->route('admin.docs-front')->withFlashMessage("Insert doc successfully.")->withFlashType('success');
        else
            return redirect()->route('admin.docs')->withFlashMessage("Insert doc successfully.")->withFlashType('success');
    }

    public function docDelete($id)
    {
        Doc::destroy($id);

        return redirect()->route('admin.docs')->withFlashMessage("Delete doc successfully.")->withFlashType('success');
    }


    public function indexFront()
    {
        $items = Doc::where('front', 1)->get();
        $title = 'Dokumenti web sajt';


        return view('admin.docs.index', compact('items', 'title'));
    }

    public function addFront()
    {
        $type = 1;
        return view('admin.docs.add', compact('type'));
    }

    public function addStoreFront(Request $request)
    {
        $input = $request->all();

        // upload
        $input['file'] = $this->upload('file', 'img/docs');

        Doc::create($input);
        if($input['front'] == 1)
            return redirect()->route('admin.docs-front')->withFlashMessage("Insert doc successfully.")->withFlashType('success');
        else
            return redirect()->route('admin.docs')->withFlashMessage("Insert doc successfully.")->withFlashType('success');
    }

    public function docDeleteFront($id)
    {
        Doc::destroy($id);

        return redirect()->route('admin.docs-front')->withFlashMessage("Delete doc successfully.")->withFlashType('success');
    }
}
