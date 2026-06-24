<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class SearchController extends Controller
{
    public function index(Request $request)
    {
    //     $blogs = Blog::where('title', 'like', '%' . $request->q . '%')->get();

    //     // return view('search', compact('blogs'));

    

    $query = $request->q;

    $blogs = Blog::where('title', 'like', '%' . $query . '%')
        ->orWhere('short_desc', 'like', '%' . $query . '%')
        ->get();
return view('user.layout.search', compact('blogs'));
    
}
    

    public function suggestions(Request $request)
    {
        $blogs = Blog::where('title', 'like', '%' . $request->q . '%')
                    ->select('id', 'title')
                    ->limit(4)
                    ->get();

        return response()->json($blogs);
    }
}