@extends('site.secondary.index')
@section('info')
@if (isset($description->id))
    <article class="page-sencodary">
        <header class="none">
            <h1>{{ isset($description->title) ? $description->title : '' }}</h1>
        </header>
        <div>{{ isset($description->contents) ? $description->contents : '' }}</div>
    </article>
@endif
@endsection
