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
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 0])) {
            $user = User::find(Auth::user()->id);
            $user->last_login = $user->updated_at;
            $user->updated_at = Carbon::now();
            $user->save();

            return response()->json(["result" => true]);
            //return redirect()->intended('foton-klub/galerije');
        } else {

            return response()->json(["result" => false]);
        }
    }
    public function getUser()
    {
        return response()->json(["name" => Auth::user()->name]);
    }
    public function checkEmail(Request $request)
    {
        $res = User::where('name', $request->get('username'))
            ->orWhere('email', $request->get('email'))->count();

        if($res > 0) {
            return response()->json(["result" => false]);
        } else {
            return response()->json(["result" => true]);
        }

    }


    public function logout()
    {
        Auth::logout();
    }
}
