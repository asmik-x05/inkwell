<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        // return $request;
        $q = $request->q;

        $posts = Post::where('title', "like", "%$q%")->orWhere('body', "like", "%$q%")
            ->latest()
            ->paginate(10);

        return view('search', compact("posts", "q"));
    }
}
