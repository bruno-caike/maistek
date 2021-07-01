<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pages as RequestsPages;
use Illuminate\Http\Request;
use App\Models\Pages;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Pages::all();
        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = new Pages();
        $form = 'create';
        return view('pages.create', ['page' => $page, 'form' => $form]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsPages $request)
    {
        Pages::create($request->all());
        $request->session()->flash("mensagem", "Registro inserido com sucesso!");
        return redirect()->route("pages.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Pages::where('id', $id)->first();
        $form = 'edit';
        return view('pages.create', ['page' => $page, 'form' => $form]);
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
    public function update(RequestsPages $request, $id)
    {
        $sp = Pages::find($id);
        $sp->update($request->all());
        $request->session()->flash("mensagem", "Registro atualizado com sucesso!");
        return redirect()->route("pages.index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Pages::destroy($id);
        $request->session()->flash("mensagem", "Registro excluido com sucesso!");
        return redirect()->route("pages.index");

    }
}
