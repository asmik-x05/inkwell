<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Quotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function __construct()
    {
        $categories = Category::get();
        $postCounts = Post::where("status", true)->count();
        View::share([
            "categories" => $categories,
            "postCounts" => $postCounts
        ]);
    }
    public function home()
    {
        $published = Post::where('status', true)->latest();

        $latest_article = (clone $published)->first();
        $latest_articles = (clone $published)->skip(1)->take(4)->get();

        $total_words = Post::pluck('body')->sum(fn($b) => str_word_count($b));

        $quote = Quotes::where('day', now()->dayOfWeek + 1)->first();

        return view("index", compact('latest_article', 'latest_articles', 'quote', 'total_words'));
    }
    public function category()
    {
        return view('categories');
    }

    public function trending()
    {
        return view('trending');
    }
}
