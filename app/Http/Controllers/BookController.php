<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    public function create()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token')
        ])->get(env('API_URL').'/authors');
        
        $body = json_decode($response->body());
        $authors = $body->items;

        return view('book_create', compact('authors'));    
    }

    public function store(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token')
        ])->post(env('API_URL').'/books', [
            'title' => $request->title,
            'release_date' => $request->release_date,
            'description' => $request->description,
            'isbn' => $request->isbn,
            'format' => $request->format,
            'number_of_pages' => (int)$request->number_of_pages,
            'author' => [
                'id' => $request->author
            ]
        ]);
        
        if($response->failed()) {
            return redirect()->back()->with(['failed' => 'Create book failed.']);
        }

        return redirect()->back()->with(['success' => 'Successfully created']);
    }

    public function destroy($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token')
        ])->delete(env('API_URL').'/books/'.$id);
        
        if($response->failed()) {
            return redirect()->back()->with(['failed' => 'Delete Failed']);
        }
        
        return redirect()->back()->with(['success' => 'Successfully Deleted']);
    }
}
