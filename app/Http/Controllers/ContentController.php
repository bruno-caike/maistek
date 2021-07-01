<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Pages;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index() {
        $news = News::orderBy('id', 'DESC')->limit(4)->get();
        $tec = Pages::where('menu_page', 'tecnologia_da_informacao')->first();
        return view('site.main.index', compact('tec', 'news'));
    }

}
