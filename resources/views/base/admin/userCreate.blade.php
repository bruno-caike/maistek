@extends('base.layout')

@section('content')
<nav class="nav-form">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="data" aria-selected="true">USUÁRIOS</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card form-people">
                                <form action="{{ route('users.store') }}" method="POST">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col-sm-6 col-xs-12">
                                            <label for="name">Nome</label>
                                            <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name" id="name" value="{{ old('name') }}" required>
                                            @if ($errors->has('name'))
                                                <div class="invalid-feedback">{{$errors->first('name')}}</div>
                                            @endif
                                        </div>
                                        <div class="col-sm-6 col-xs-12">
                                            <label for="email">E-mail</label>
                                            <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" name="email" id="email" value="{{ old('email') }}" required>
                                            @if ($errors->has('email'))
                                                <div class="invalid-feedback">{{$errors->first('email')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-6 col-xs-12">
                                            <label for="password">Senha</label>
                                            <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" name="password" id="password" value="{{ old('password') }}" required>
                                            @if ($errors->has('password'))
                                                <div class="invalid-feedback">{{$errors->first('password')}}</div>
                                            @endif
                                        </div>
                                        <div class="col-sm-6 col-xs-12">
                                            <label for="password_confirmation">Confirmar Senha</label>
                                            <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group btn-form">
                                        <button type="submit" class="btn btn-success">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
@endsection

