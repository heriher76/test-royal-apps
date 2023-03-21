<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $response = Http::post(env('API_URL').'/token', [
                'email' => $request->email,
                'password' => $request->password,
        ]);
        
        if($response->failed()) {
            return redirect()->back()->with(['failed' => 'Login Failed']);
        }
        $body = json_decode($response->body());
        $token = $body->token_key;
        $first_name = $body->user->first_name;
        $last_name = $body->user->last_name;
        session(['token' => $token, 'first_name' => $first_name, 'last_name' => $last_name]);
        
        return redirect('/');
    }

    public function logout(Request $request)
    {
        session()->flush();
        
        return redirect('/');
    }
}
