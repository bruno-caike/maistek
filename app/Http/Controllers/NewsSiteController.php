<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsSiteController extends Controller
{
    // all news
    public function allNews() {
        $title_menu = 'NOTICIAS';
        $news = News::orderBy('id', 'DESC')->get();
        return view('site.secondary.allNews', compact('title_menu', 'news'));
    }

    // new
    public function new(int $id, string $slug) {
        $title_menu = 'NOTICIAS';
        $new = News::where('id', $id)->first();
        $news = News::orderBy('id', 'DESC')->limit(3)->get();
        return view('site.secondary.new', compact('title_menu', 'new', 'news'));
    }
}
