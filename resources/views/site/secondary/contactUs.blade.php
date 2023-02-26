@extends('site.secondary.index')
@section('info')
<form action="{{ route('contactsUs.store') }}" method="POST" class="formulario {{ !empty(session('mensagem')) ? session('mensagem') : '' }}">
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
@endsection