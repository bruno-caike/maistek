<?php

namespace App\Http\Controllers;

use App\Http\Requests\News as RequestsNews;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $new = new News();
        $form = 'create';
        return view('news.create', ['new' => $new, 'form' => $form]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsNews $request)
    {
        if (empty($request->link_img)) {
            News::create($request->all());
            $request->session()->flash("mensagem", "Registro inserido com sucesso!");
            return redirect()->route("news.index");
        } else {
            $nameFile = null;
            if ($request->hasFile('link_img') && $request->file('link_img')->isValid()) {
                $name = uniqid(date('HisYmd'));
                $extension = $request->link_img->extension();
                $nameFile = "{$name}.{$extension}";
                $upload = $request->link_img->storeAs('public/img-news', $nameFile);
                if ( !$upload ) {
                    Session::flash('erro', 'Falha ao fazer upload da imagem');
                    return back();
                } else {
                    News::create(['title' => $request->title, 'contents' => $request->contents, 'link' => $request->link, 'active' => $request->active, 'link_img' => $nameFile]);
                    $request->session()->flash("mensagem", "Registro inserido com sucesso!");
                    return redirect()->route("news.index");
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $new = News::where('id', $id)->first();
        $form = 'edit';
        return view('news.create', ['new' => $new, 'form' => $form]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsNews $request, $id)
    {
        if (empty($request->link_img)) {
            $sp = News::find($id);
            $sp->update(['title' => $request->title, 'contents' => $request->contents, 'link' => $request->link, 'active' => $request->active]);
            $request->session()->flash("mensagem", "Registro atualizado com sucesso!");
            return redirect()->route("news.index");
        } else {
            $nameFile = null;
            if ($request->hasFile('link_img') && $request->file('link_img')->isValid()) {
                $name = Str::slug($request->title);
                $extension = $request->link_img->extension();
                $nameFile = "{$name}.{$extension}";
                $upload = $request->link_img->storeAs('public/img-news', $nameFile);
                if ( !$upload ) {
                    Session::flash('erro', 'Falha ao fazer upload da imagem');
                    return back();
                } else {
                    $sp = News::find($id);
                    $sp->update(['title' => $request->title, 'contents' => $request->contents, 'link' => $request->link, 'active' => $request->active, 'link_img' => $nameFile]);
                    $request->session()->flash("mensagem", "Registro atualizado com sucesso!");
                    return redirect()->route("news.index");
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        News::destroy($id);
        $request->session()->flash("mensagem", "Registro excluido com sucesso!");
        return redirect()->route("news.index");
    }
}
