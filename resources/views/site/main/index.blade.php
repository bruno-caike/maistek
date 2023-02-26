@extends('site.layout')
@section('content')
@include('site.components.header')
<!-- SECAO START -->
<section class="sec2">
    <div class="container">
        <header class="header-2">
            <div>
                <h1 class="fraseTopo">{{ isset($tec->title) ? $tec->title : '' }}</h1>
                <h5 class="textoTopo">
                    <p>
                        @if (isset($tec->contents))
                            {!!strlen(strip_tags($tec->contents)) > 105 ? mb_substr(strip_tags($tec->contents),0,105).' [...]' : strip_tags($tec->contents)!!}
                        @endif
                    </p>
                </H5>

                <a href="{{ route('informationTechnology.index') }}" class="botaoInfo">MAIS INFORMAÇÕES</a>

            </div>

            <img src="img/conputer.png" alt="imagem-copmputador" class="img-computatador">

        </header>
    </div>
</section>

<!-- ACESSO RÁPIDO - START -->
<div class="container">
    @include('site.components.quickAccess')
</div>

<!-- ACESSO RÁPIDO - END -->

<!-- NOTICIAS - START -->
<div class="container">
    <h2 class="tituloPrincipalNoticia">Principais noticias</h2><br>



    <section class="noticias">
        @foreach ($news as $new)
            <section>
                <a href="{{route('new.show', ['id'=>$new->id, 'slug'=>\Str::slug($new->title)])}}">
                    <div>
                        <img src="{{ !empty($new->link_img) ? url('storage/img-news/'.$new->link_img.'') : 'img/sem-img.jpg'}}" class="imgNoticia">
                        <p class="ttNoticia">{{$new->title}}</p>
                        <p class="resumoNoticia">{{$new->contents}}</p>
                    </div>
                </a>
            </section>
        @endforeach
    </section>
</div>



<!-- NOTICIAS - END -->

<!-- LINHA DIVISÓRIA NOTICIAS-FORMULARIO - START -->
<section>

    <div id="line"></div>

</section>

<!-- LINHA DIVISÓRIA NOTICIAS-FORMULARIO - END -->

<!-- FALE CONOSCO - START -->
<div class="containerForm">
    <section id="faleCo">Fale Conosco</section>

    <form action="{{ route('contacts.store') }}" method="POST" class="formulario {{ !empty(session('mensagem')) ? session('mensagem') : '' }}">
        @csrf
        <div class="grupo">
            <div>
                <div class="campo">

                    <div>
                        <label class="texForm" for="nome">Nome</label>
                        <input type="text" name="name" class="{{$errors->has('name') ? 'is-invalid' : ''}}" id="nome" value="{{ old('name') }}" required>
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">{{$errors->first('name')}}</div>
                        @endif
                    </div>
                    <div> <label class="texForm" for="nome">Telefone</label>
                        <input type="text" name="tel" class="telephone {{$errors->has('tel') ? 'is-invalid' : ''}}" id="telefone" value="{{ old('tel') }}" required>
                        @if ($errors->has('tel'))
                            <div class="invalid-feedback">{{$errors->first('tel')}}</div>
                        @endif
                    </div>

                    <div>
                        <label class="texForm" for="nome">E-mail</label>
                        <input type="email" name="email" class="{{$errors->has('email') ? 'is-invalid' : ''}}" id="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">{{$errors->first('email')}}</div>
                        @endif
                    </div>
                    <div>
                        <label class="texForm" for="nome">Setor</label>
                        <input type="text" name="sector" class="{{$errors->has('sector') ? 'is-invalid' : ''}}" id="setor" value="{{ old('sector') }}" required>
                        @if ($errors->has('sector'))
                            <div class="invalid-feedback">{{$errors->first('sector')}}</div>
                        @endif
                    </div>

                    <div>
                        <label class="texForm" for="Mensagem" class="mensagem">Mensagem</label>
                        <textarea name="message" id="mensagem" rows="10" class="mensagem {{$errors->has('message') ? 'is-invalid' : ''}}" value="{{ old('message') }}" required></textarea>
                        @if ($errors->has('message'))
                            <div class="invalid-feedback">{{$errors->first('message')}}</div>
                        @endif
                    </div>

                </div>
                <div id="bt">
                    <button class="botao" type="submit">ENVIAR</button>
                </div>
            </div>
        </div>
    </form>

</div>
@include('site.components.footer')
@endsection
