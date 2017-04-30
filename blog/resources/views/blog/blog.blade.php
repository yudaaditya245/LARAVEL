@extends('layouts.layout')

@section('title', 'BLOG')

@section('heading')
    <a class="btn btn-info" href="{{ url('/') }}"><span class="glyphicon glyphicon-home"></span></a>&nbsp; LARAVEL BLOG
@endsection

@section('body')

    <h2>{{ $post->judul }}</h2>
    {{ $post->isi }}
    <br/><br/>
    @if(isset($kategori) > 0)
        @foreach($kategori as $kat)
            @if($post->kategori == $kat->id)
                <b><span class="glyphicon glyphicon-tag"></span>&nbsp; <a href="<?= url('/blog/filter/'.$kat->id) ?>">{{ $kat->kategori }}</a></b>
            @endif
        @endforeach
    @endif
    <br/><br/>

@endsection
