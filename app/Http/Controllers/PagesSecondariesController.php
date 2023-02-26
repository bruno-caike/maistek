<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contacts as RequestsContacts;
use App\Models\Contacts;
use App\Models\Pages;
use Illuminate\Http\Request;

class PagesSecondariesController extends Controller
{
    // Texcnologia da informação
    public function informationTechnology() {
        $title_menu = 'Tecnologia da Informação';
        $description = Pages::where('menu_page', 'tecnologia_da_informacao')->first();
        return view('site.secondary.informationTechnology', compact('title_menu', 'description'));
    }

    // Design
    public function design() {
        $title_menu = 'Design';
        $description = Pages::where('menu_page', 'design')->first();
        return view('site.secondary.design', compact('title_menu', 'description'));
    }

    // Ui
    public function ui() {
        $title_menu = 'UI/UX';
        $description = Pages::where('menu_page', 'ux_ui')->first();
        return view('site.secondary.uxUi', compact('title_menu', 'description'));
    }

    // Ux
    public function ux() {
        $title_menu = 'UI/UX';
        $description = Pages::where('menu_page', 'ux_ui')->first();
        return view('site.secondary.uxUi', compact('title_menu', 'description'));
    }

    // MARKETING
    public function marketing() {
        $title_menu = 'MARKETING';
        $description = Pages::where('menu_page', 'marketing')->first();
        return view('site.secondary.marketing', compact('title_menu', 'description'));
    }

    // SERVIDOR WEB
    public function webServer() {
        $title_menu = 'SERVIDOR WEB';
        $description = Pages::where('menu_page', 'servidor_web')->first();
        return view('site.secondary.webServer', compact('title_menu', 'description'));
    }
    
     // PROGARMAÇÃO
    public function programming() {
        $title_menu = 'PROGARMAÇÃO';
        $description = Pages::where('menu_page', 'programacao')->first();
        return view('site.secondary.programming', compact('title_menu', 'description'));
    }

    // Fale conosco
    public function contactUs() {
        $title_menu = 'FALE CONOSCO';
        return view('site.secondary.contactUs', compact('title_menu'));
    }
    public function contactsUsStore(RequestsContacts $request)
    {
        Contacts::create($request->all());
        $request->session()->flash("mensagem", "success");
        return redirect()->route("contactUs.index");

    }
}
