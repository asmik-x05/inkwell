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
    public function category(Request $request)
    {
        $slugs = $request->query('filter', []);
        $slugs = is_array($slugs) ? $slugs : [$slugs];

        $articles = Post::where('status', true)
            ->when(count($slugs), function ($q) use ($slugs) {
                $q->whereHas('category', fn($q) => $q->whereIn('slug', $slugs));
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('categories', compact('articles', 'slugs'));
    }
    public function categoryRedirect(string $slug)
    {
        return redirect()->route('categories', ['filter' => [$slug]]);
    }

    public function trending()
    {
        $trending = Post::where('status', true)->orderBy('views_count', 'desc')->paginate(10);

        return view('trending', compact('trending'));
    }
    public function login()
    {
        return view('Auth.login');
    }

    public function register()
    {
        return view('Auth.register');
    }
}
