@extends('base.layout')

@section('content')
<nav class="nav-form">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="data" aria-selected="true">PERMISSÕES</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card">
                                <div class="row list-term-user mb-4">
                                    <div class="col-sm-6 col-xs-12">
                                        <fieldset class="mb-2">
                                            <legend>Usuário</legend>
                                            <div>
                                                <p><strong>Nome: </strong>{{ $user->name }}</p>
                                                <p><strong>Email: </strong>{{ $user->email }}</p>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Modulo</legend>
                                            <div>
                                                <p><strong>Nome: </strong>{{ $team->name }}</p>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                    </div>
                                </div>
                                <form action="{{ route('permissions.store', [$team->id, $user->id]) }}" method="POST">
                                    @csrf
                                    <label for="role"><strong>Funções</strong></label>
                                    <div class="{{$errors->has('role') ? 'is-invalid div-invalid' : ''}}">
                                        @for ($i = 0; $i < count($roles); $i++)
                                            <div>
                                                <input type="radio" name="role" id="role-{{ $roles[$i]['key'] }}" class="d-none" value="{{ $roles[$i]['key'] }}" {{ isset($team->teamUser->where('user_id', $user->id)->first()->role) ? ($roles[$i]['key'] == $team->teamUser->where('user_id', $user->id)->first()->role ? 'checked' : '') : '' }}>
                                                <label for="role-{{ $roles[$i]['key'] }}" class="btn-roles {{ isset($team->teamUser->where('user_id', $user->id)->first()->role) ? ($roles[$i]['key'] == $team->teamUser->where('user_id', $user->id)->first()->role ? 'role-active' : '') : '' }}">
                                                    <i class="far fa-check-circle text-success mb-1"></i>
                                                    <strong class="d-block mb-1">{{$roles[$i]['name']}}</strong>
                                                    <span>{{ $roles[$i]['description'] }}</span>
                                                </label>
                                            </div>
                                        @endfor
                                    </div>
                                    @if ($errors->has('role'))
                                        <div class="invalid-feedback">Selecione Uma função</div>
                                    @endif
                                    <button type="submit" class="btn btn-success mt-3">Salvar</button>
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