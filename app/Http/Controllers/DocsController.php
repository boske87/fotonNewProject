<?php

namespace App\Http\Controllers;

use App\Doc;
use App\LinkClub;
use Auth;
use Illuminate\Http\Request;

class DocsController extends Controller
{
    public function index ()
    {
        $members = Doc::where('front', 0)->orderby('id','desc')->get();

        return view('front.club.docs', compact('members'));
    }


    public function links()
    {
        $items = LinkClub::orderBy('created_at', 'DESC')->get();


        return view('front.club.links', compact('items'));
    }

    public function linksAdd(Request $request){
        $input = $request->all();


        $input['userId'] = Auth::user()->id;

        LinkClub::create($input);

        return redirect()->route('foton-klub.links')->withFlashType('success');

    }

    public function linksDelete($id) {
        LinkClub::find($id)->delete();
        return redirect()->route('foton-klub.links')->withFlashType('success');
    }

    public function linksEdit($id, Request $request) {

        $homeText = LinkClub::find($id);
        $input['userId'] = Auth::user()->id;

        $input = $request->all();

        $homeText->update($input);

        return redirect()->route('foton-klub.links')->withFlashType('success');
    }
}
