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
                            <div class="card">
                                @if (Auth::user()->id == 1)
                                    <div>
                                        <div class="new-people">
                                            <a href="{{ route('users.create') }}" class="btn btn-success m-2 d-flex"><i class="fas fa-plus mr-1"></i><span>{{ __('Novo') }}</span></a>
                                        </div>
                                    </div>
                                @endif
                                <div>
                                    <table class="table table-responsive-sm table-striped tables-data-tables" id="tableOrder">
                                        <thead>
                                            <tr>
                                                <th>Nome do usuário</th>
                                                <th>E-mail</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td class="grid-people-options">
                                                        @if (isset(Auth::user()->allTeams()->where('name', 'permissoes')->first()->id))
                                                            <a href="{{ route('permissions.index.list', [$user->id]) }}" class="btn text-warning"><i class="fas fa-user-lock"></i></a>
                                                        @endif
                                                        @if (Auth::user()->hasTeamPermission($team, 'delete') &&  $you->id !== $user->id)
                                                            <!--<form action="{{ route('users.destroy', [$user->id]) }}" class="form-delete" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn"><i class="cil-trash text-danger"></i></button>
                                                            </form>-->
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


@section('javascript')

@endsection

