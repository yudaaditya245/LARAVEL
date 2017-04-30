@extends('layouts.layout')

@section('title', 'BLOG')

@section('heading')
    <a class="btn btn-info" href="{{ url('/') }}"><span class="glyphicon glyphicon-home"></span></a>&nbsp; LARAVEL BLOG
@endsection

@section('body')

    <h2>{{ $post->judul }}</h2>
    {{ $post->isi }}
    <br/><br/>

@endsection
