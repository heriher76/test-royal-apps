<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token')
        ])->get(env('API_URL').'/authors');
        
        $body = json_decode($response->body());
        $authors = $body->items;

        return view('welcome', compact('authors'));
    }

    public function profile()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token')
        ])->get(env('API_URL').'/me');
        
        $me = json_decode($response->body());

        return view('profile', compact('me'));
    }
}
