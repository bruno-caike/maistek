@extends('site.secondary.index')
@section('info')
@if (isset($description->id))
    <article class="page-sencodary">
        <header>
            <img src="img/img-programacao.jpg" alt="{{ isset($description->title) ? $description->title : '' }}">
            <span>{{ isset($description->created_at) ? $description->created_at->format('d/m/Y') : '' }}</span>
            <h1><strong>{{ isset($description->title) ? $description->title : '' }}</strong></h1>
        </header>
        <div>{{ isset($description->contents) ? $description->contents : '' }}</div>
    </article>
@endif
@endsection