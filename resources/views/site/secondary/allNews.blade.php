@extends('site.secondary.index')
@section('info')
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
@endsection