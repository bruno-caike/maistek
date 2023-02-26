@extends('site.secondary.index')
@section('info')
@if (isset($new->id))
    <div class="new">
        <article class="page-sencodary">
            <header>
                <img src="{{ !empty($new->link_img) ? url('storage/img-news/'.$new->link_img.'') : 'img/sem-img.jpg'}}" alt="{{ isset($new->title) ? $new->title : '' }}">
                <span>{{ isset($new->created_at) ? $new->created_at->format('d/m/Y') : '' }}</span>
                <h1><strong>{{ isset($new->title) ? $new->title : '' }}</strong></h1>
            </header>
            <div>{{ isset($new->contents) ? $new->contents : '' }}</div>
        </article>
    </div>
    <div class="all-news">
        @foreach ($news as $n)
            <a href="{{route('new.show', ['id'=>$n->id, 'slug'=>\Str::slug($n->title)])}}">
                <article>
                    <img src="{{ !empty($n->link_img) ? url('storage/img-news/'.$n->link_img.'') : 'img/sem-img.jpg'}}" class="imgNoticia">
                    <header>
                        <span>{{$n->created_at->format('d/m/Y')}}</span>
                        <h1><strong>{{$n->title}}</strong></h1>
                        <div>{{$n->contents}}</div>
                    </header>
                </article>
            </a>
        @endforeach
    </div>
@endif
@endsection