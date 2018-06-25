<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{


    public function authenticate(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
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
    public function broker()
    {
        return Password::broker();
    }

    public function sendResetLinkEmailAjax(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        // Inserted this piece of code which checks for AJAX request


        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        if($response == 'passwords.sent'){
            $res = true;
        } else {
            $res = false;
        }
        if ($request->ajax()) {
            return response()->json($res);
        }
    }



}
