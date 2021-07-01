@extends('base.layout')

@section('content')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <article class="form-pages list-pages">
                    <header class="mb-3"><h1 class="text-dark"><strong>Cadastro de Paginas</strong></h1></header>
                    <form action="{{$form == 'edit' ? route('pages.update', [$page->id]) : route('pages.store')}}" method="POST">
                        @csrf
                        @if ($form == 'edit')
                            @method('PUT')
                        @endif
                        <div class="row form-group">
                            <div class="col-sm-6 col-12">
                                <label for="menu_page">Menu da pagina</label>
                                <input type="text" class="form-control {{$errors->has('menu_page') ? 'is-invalid' : ''}}" name="menu_page" id="menu_page" value="{{old('menu_page') != '' ? old('menu_page') : $page->menu_page}}" required>
                                @if ($errors->has('menu_page'))
                                    <div class="invalid-feedback">{{$errors->first('menu_page')}}</div>
                                @endif
                            </div>
                            <div class="col-sm-6 col-12">
                                <label for="title">Titulo da Pagina</label>
                                <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" name="title" id="title" value="{{old('title') != '' ? old('title') : $page->title}}" required>
                                @if ($errors->has('title'))
                                    <div class="invalid-feedback">{{$errors->first('title')}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contents">Descrição</label>
                            <textarea name="contents" id="contents" cols="30" rows="7" class="form-control {{$errors->has('contents') ? 'is-invalid' : ''}}">{{old('contents') != '' ? old('contents') : $page->contents}}</textarea>
                            @if ($errors->has('contents'))
                                <div class="invalid-feedback">{{$errors->first('contents')}}</div>
                            @endif
                        </div>
                
                        <div class="form-group">
                            <label for="active">Status</label>
                            <div class="flex-checks">
                                <label class="c-switch c-switch-pill c-switch-success">
                                    <input type="checkbox" name="active" class="c-switch-input" value="1" {{ count($errors) != 0 ? (old('active') == null ? '' : 'checked') : ($page->active == 0 && !empty($page->id)  ?  : 'checked') }}>
                                    <span class="c-switch-slider"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="edit_id" value="{{old('edit_id') != '' ? old('edit_id') : $page->id}}">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </form>
                </article>
            </div>
        </div>
    </div>
</div>
@endsection