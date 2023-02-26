@extends('site.layout')
@section('content')
@include('site.components.header')
<main class="page-secondaries">
    <article class="title-page-secondaries">
        <header class="container">
            <h1><strong>{{ $title_menu }}</strong></h1>
        </header>
    </article>
    <div class="container">
        <div>
            @yield('info')
        </div>
        <div class="quick-access-pages-secondaries">
            @include('site.components.quickAccess')
        </div>
    </div>
</main>
@include('site.components.footer')
@endsection
