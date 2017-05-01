@extends('layouts.layout')

@section('title', 'BLOG')

@section('heading')
    <a class="btn btn-info" href="{{ url('/') }}"><span class="glyphicon glyphicon-home"></span></a>&nbsp; LARAVEL BLOG
@endsection

@section('body')

    <h2>{{ $post->judul }}</h2>

    @foreach ($user as $u)
        @if($post->author == $u->id)
            <span class="glyphicon glyphicon-user"></span>&nbsp;<a href="<?= url('/user/profile/'.$post->author) ?>">{{ $u->fname }}</a>
        @endif
    @endforeach
    &nbsp;
    @if(isset($kategori) > 0)
        @foreach($kategori as $kat)
            @if($post->kategori == $kat->id)
                <span class="glyphicon glyphicon-tag"></span>&nbsp;<a href="<?= url('/blog/filter/'.$kat->id) ?>">{{ $kat->kategori }}</a>
            @endif
        @endforeach
    @endif
    &nbsp;
    <span class="glyphicon glyphicon-calendar"></span>&nbsp;{{ $post->created_at }}
    
    <br/><br/>

    {{ $post->isi }}
    <br/><br/>

@endsection
