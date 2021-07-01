@extends('base.layout')

@section('content')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="list-pages">
                    <table class="table table-responsive-sm table-striped tables-data-tables" id="tablePeople">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>E-mail</th>
                                <th>Setor</th>
                                <th>Mensagem</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->tel }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->sector }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td class="d-flex justify-end">
                                        <form action="{{ route('contacts.destroy', [$contact->id]) }}" class="form-delete" method="POST">
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
