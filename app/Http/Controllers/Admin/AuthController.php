<?php


namespace App\Http\Controllers\Admin;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller {

    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password , 'type' => 1])) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
    }


    public function logout()
    {
        Auth::logout();

    }

    public function getUser()
    {
        return response()->json(["name" => Auth::user()->name]);
    }
}