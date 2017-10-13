<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Skippaz\Services\UploadService;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use UploadService;
    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        // upload
        $data['main_image'] = $this->upload('main_image', 'img/gallery');

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'ime_prezime' => $data['ime_prezime'],
            'datum_rodjenja' => $data['datum_rodjenja'],
            'mesto_rodjenja' => $data['mesto_rodjenja'],
            'tel' => $data['tel'],
            'zavrseno_obrazovanje' => $data['zavrseno_obrazovanje'],
            'zavrsena_skola_fotografije' => $data['zavrsena_skola_fotografije'],
            'fotografske_titule_zvanja_diplome' => $data['fotografske_titule_zvanja_diplome'],
            'fotografija_lica' => $data['main_image'],
            'umetnicke_aktivnosti' => $data['umetnicke_aktivnosti']
        ]);
    }


    public function register(Request $request) {


        $user = $this->create($request->all());
        dd($user,$request->all());
//        // Sending email, sms or doing anything you want
//        $this->activationService->sendActivationMail($user);
//
//        return redirect('/login')->with('message', 'We sent a comfirmation email to your email, please click on link inside before login');
    }
}
