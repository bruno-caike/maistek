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
                                <div>
                                    <table class="table table-responsive-sm table-striped tables-data-tables" id="tableOrder">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Permissão</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($teams as $t)
                                                <tr>
                                                    <td>{{ $t->name }}</td>
                                                    <td>
                                                        @if (isset($t->teamUser->where('user_id', $user->id)->first()->role))
                                                            @for ($i = 0; $i < count($roles); $i++)
                                                                @if ($roles[$i]['key'] == $t->teamUser->where('user_id', $user->id)->first()->role)
                                                                    {{$roles[$i]['name']}}
                                                                @endif
                                                            @endfor
                                                        @endif
                                                    </td>
                                                    <td class="d-flex justify-content-end">
                                                        @if (Auth::user()->hasTeamPermission(Auth::user()->allTeams()->where('name', 'permissoes')->first(), 'create'))
                                                            <a href="{{ route('permissions.show', [$t->id, $user->id]) }}" class="btn btn-primary mr-2 {{isset($t->teamUser->where('user_id', $user->id)->first()->role) ? (Auth::user()->hasTeamPermission(Auth::user()->allTeams()->where('name', 'permissoes')->first(), 'update') ? '' : 'btn-disabled') : '' }}">
                                                                Atribuir
                                                            </a>
                                                        @endif
                                                        @if (Auth::user()->hasTeamPermission(Auth::user()->allTeams()->where('name', 'permissoes')->first(), 'delete'))
                                                            <form action="{{ route('permissions.destroy', [$t->id, $user->id]) }}" class="form-delete" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger" {{isset($t->teamUser->where('user_id', $user->id)->first()->role) ? '' : 'disabled'}}><i class="far fa-trash-alt"></i></button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
@endsection
