<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthorController extends Controller
{
    public function show($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token')
        ])->get(env('API_URL').'/authors/'.$id);
        
        if($response->failed()) {
            return redirect()->back()->with(['failed' => 'Get Author Failed']);
        }

        $author = json_decode($response->body());
        
        return view('author_show', compact('author'));
    }
    
    public function destroy($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token')
        ])->get(env('API_URL').'/authors/'.$id);

        $author = json_decode($response->body());

        if(!empty($author->books)) {
            return redirect()->back()->with(['failed' => 'You cannot delete author that has books.']);
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token')
        ])->delete(env('API_URL').'/authors/'.$id);
        
        if($response->failed()) {
            return redirect()->back()->with(['failed' => 'Delete Failed']);
        }
        
        return redirect()->back()->with(['success' => 'Successfully Deleted']);
    }
}
