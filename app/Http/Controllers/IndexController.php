<?php

namespace App\Http\Controllers;

use App\AdvanceGallery;
use App\AdvanceText;
use App\BasicGallery;
use App\BasicText;
use App\Link;
use App\HomeGallery;
use App\HomeText;
use App\ProfMain;
use App\ProfText;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\EmailRequest;
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

    public function logout(){
        Auth::logout();
        return redirect('/admin');
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

    public function sendMail(EmailRequest $request)
    {
        $input = $request->all();
        $data = $input;
//        dd($input);
            Mail::send('emails.send', $data , function ($message) use ($input)  {
                $message->from('prijava@skolafotografije.com', 'Kontakt');
                $message->to('skolafotografije@gmail.com')->subject($input['naslov']);
            });

        return redirect('kontakt')->withFlashMessage("Uspesno ste poslali email.")->withFlashType('success');
    }

    public function sendMailPrijava(Request $request)
    {
        $input = $request->all();
        $data = $input;
//        dd($input);
        Mail::send('emails.send2', $data , function ($message) use ($input)  {
            $message->from('prijava@skolafotografije.com', 'Prijava');
            $message->to('skolafotografije@gmail.com')->subject('Prijava');
        });

        return redirect('prijava')->withFlashMessage("Uspesno ste poslali prijava.")->withFlashType('success');
    }

    public function links()
    {
        $items = Link::all();
        return view('front.links', compact('items'));
    }
}
