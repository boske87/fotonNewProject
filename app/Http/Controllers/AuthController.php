<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{


    public function authenticate(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = User::find(Auth::user()->id);
            $user->last_login = $user->updated_at;
            $user->updated_at = Carbon::now();
            $user->save();
            return redirect()->intended('foton-klub/galerije');
        }
    }


    public function logout()
    {
        Auth::logout();

    }
}
