@extends('base.layout')

@section('content')
<nav class="nav-form">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="change-password-tab" data-toggle="tab" href="#change-password" role="tab" aria-controls="data" aria-selected="true">ALTERAR SENHA</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
            <article class="form-people">
                <form action="{{route('users.changePassword')}}" method="POST" id="form-change-password">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="current_password">Senha atual</label>
                        <div class="d-flex">
                            <div class="w-100">
                                <input type="password" class="form-control {{$errors->has('current_password') ? 'is-invalid' : ''}}" name="current_password" id="input_current_password" value="{{ old('current_password') }}" required>
                                <div class="invalid-feedback" id="invalid_input_current_password">{{ $errors->has('current_password') ? $errors->first('current_password') : '' }}</div>
                            </div>
                            <button type="button" class="btn btn-secondary p-0 pl-1 pr-1 view-password" id="current_password"><img src="{{ asset('img/view.svg') }}" alt="eye"></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="new_password">Nova senha</label>
                        <div class="d-flex">
                            <div class="w-100">
                                <input type="password" class="form-control {{$errors->has('new_password') ? 'is-invalid' : ''}}" name="new_password" id="input_new_password" value="{{ old('new_password') }}" required>
                                <div class="invalid-feedback" id="invalid_input_new_password">{{ $errors->has('new_password') ? $errors->first('new_password') : '' }}</div>
                            </div>
                            <button type="button" class="btn btn-secondary p-0 pl-1 pr-1 view-password" id="new_password"><img src="{{ asset('img/view.svg') }}" alt="eye"></button>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="confirm_new_password">Comfirmar nova senha</label>
                        <div class="d-flex">
                            <div class="w-100">
                                <input type="password" class="form-control {{$errors->has('confirm_new_password') ? 'is-invalid' : ''}}" name="confirm_new_password" id="input_confirm_new_password" value="{{ old('confirm_new_password') }}" required>
                                <div class="invalid-feedback" id="invalid_input_confirm_new_password">{{ $errors->has('confirm_new_password') ? $errors->first('confirm_new_password') : '' }}</div>
                            </div>
                            <button type="button" class="btn btn-secondary p-0 pl-1 pr-1 view-password" id="confirm_new_password"><img src="{{ asset('img/view.svg') }}" alt="eye"></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </article>
        </div>
    </div>
</nav>
@endsection
