@extends('base.layout')

@section('content')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <article class="form-pages list-pages">
                    <header class="mb-3"><h1 class="text-dark"><strong>Cadastro de Noticias</strong></h1></header>
                    <form action="{{$form == 'edit' ? route('news.update', [$page->id]) : route('news.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($form == 'edit')
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" name="title" id="title" value="{{old('title') != '' ? old('title') : $new->title}}" required>
                            @if ($errors->has('title'))
                                <div class="invalid-feedback">{{$errors->first('title')}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="link">Link Noticia</label>
                            <input type="text" class="form-control {{$errors->has('link') ? 'is-invalid' : ''}}" name="link" id="link" value="{{old('link') != '' ? old('link') : $new->link}}" required>
                            @if ($errors->has('link'))
                                <div class="invalid-feedback">{{$errors->first('link')}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="contents">Contexto</label>
                            <textarea name="contents" id="contents" cols="30" rows="7" class="form-control {{$errors->has('contents') ? 'is-invalid' : ''}}">{{old('contents') != '' ? old('contents') : $new->contents}}</textarea>
                            @if ($errors->has('contents'))
                                <div class="invalid-feedback">{{$errors->first('contents')}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="active">Foto</label>
                            <input type="file" name="link_img" accept="image/png, image/jpeg">
                        </div>
                        <div class="form-group">
                            <label for="active">Status</label>
                            <div class="flex-checks">
                                <label class="c-switch c-switch-pill c-switch-success">
                                    <input type="checkbox" name="active" class="c-switch-input" value="1" {{ count($errors) != 0 ? (old('active') == null ? '' : 'checked') : ($new->active == 0 && !empty($new->id)  ?  : 'checked') }}>
                                    <span class="c-switch-slider"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="edit_id" value="{{old('edit_id') != '' ? old('edit_id') : $new->id}}">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </form>
                </article>
            </div>
        </div>
    </div>
</div>
@endsection