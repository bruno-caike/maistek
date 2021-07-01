@extends('base.layout')

@section('content')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div>
                    <div class="new-pages d-flex justify-end">
                        <a href="{{ route('news.create') }}" class="btn btn-success m-2 d-flex justify-center aling-items-center"><i class="fas fa-plus mr-1"></i><span>{{ __('Novo') }}</span></a>
                    </div>
                </div>
                <div class="list-pages">
                    <table class="table table-responsive-sm table-striped tables-data-tables" id="tablePeople">
                        <thead>
                            <tr>
                                <th>Titulo Noticias</th>
                                <th>Contexto</th>
                                <th class="text-center">Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $new)
                                <tr>
                                    <td>{{ $new->title }}</td>
                                    <td>{{ $new->contents }}</td>
                                    <td class="text-center">{!! $new->active ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-lock text-danger"></i>' !!}</td>
                                    <td class="d-flex justify-end">
                                        <a href="{{route('news.show', [$new->id])}}" class="btn btn-primary mr-2"><i class="far fa-edit"></i></a>
                                        <form action="{{ route('news.destroy', [$new->id]) }}" class="form-delete" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                        </form>
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
@endsection