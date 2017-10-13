<?php

namespace App\Http\Controllers;

use App\AdvanceGallery;
use App\AdvanceText;
use App\BasicGallery;
use App\BasicText;
use App\HomeGallery;
use App\HomeText;
use App\ProfMain;
use App\ProfText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function index()
    {
        $prof = ProfMain::get();
        $front = HomeText::find(1);
        $frontGallery = HomeGallery::orderby('ordering','asc')->get();
        return view('front.home', compact('prof','front', 'frontGallery'));
    }


    public function basic()
    {
        $basicText = BasicText::find(1);
        $basicGallery = BasicGallery::orderby('ordering','asc')->get();

        return view('front.basic', compact('basicText','basicGallery'));
    }

    public function advance()
    {
        $advanceText = AdvanceText::find(1);
        $advanceGallery = AdvanceGallery::orderby('ordering','asc')->get();

        return view('front.advance', compact('advanceText','advanceGallery'));
    }

    public function prijava()
    {
        return view('front.prijava');
    }

    public function prof()
    {
        $prof = ProfMain::get();
        $profText = ProfText::find(1);

        return view('front.prof',compact('prof', 'profText'));
    }

    public function profOne($slug)
    {
        $profOne = ProfMain::whereSlug($slug)->first();
        $prof = ProfMain::get();

        return view('front.prof-one',compact('profOne','prof'));
    }

    public function contact()
    {

        return view('front.contact');
    }

    public function sendMail(Request $request)
    {
            Mail::send('emails.send', ['title' => 'asdasdadas', 'message' => 'aaaaa'], function ($message) {
                $message->from('prijava@skolafotografije.com', 'Prijava');
                $message->to('athlon87@gmail.com')->subject('Prijava');
            });

        return redirect('kontakt');
    }

    public function links()
    {
        return view('front.links');
    }
}
