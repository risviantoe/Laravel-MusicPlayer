<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

//use App\Http\Controllers\Auth\LoginProxy;

class UserController extends Controller
{

    public $successStatus = 200;

    use HasApiTokens;
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;
            Passport::tokensExpireIn(Carbon::now()->addDays(15));
            return response()->json(['status' => 'ok', 'token' => $token], $this->successStatus);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Unauthorised'], 401);
        }
    }

    public function register()
    {
        $err_message = '';
        $user = new User;
        $username = request('username');
        if ($username == null || $username == '') {
            $err_message = 'username cannot be empty';
        } else {
            $email = request('email');
            if ($email == null || $email == '') {
                $user->email = $email;
                $err_message = 'Email cannot be empty';
            } else {
                $password = request('password');
                if ($password == null || $password == '') {
                    $user->password = $password;
                    $err_message = 'Password cannot be empty';
                } else {
                    $user->username = request('username');
                    $user->email = request('email');
                    $user->password = Hash::make(request('password'));
                    $user->save();
                    return response()->json(['status' => 'ok'], $this->successStatus);
                }
            }
        }
        return response()->json(['status' => 'error', 'message' => $err_message], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
