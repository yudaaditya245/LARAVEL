@extends('layouts.layout')

@section('title', 'BLOG')

@section('heading')
    <a class="btn btn-info" href="<?= url('/blog') ?>"><span class="glyphicon glyphicon-arrow-left"></span></a> &nbsp; LARAVEL BLOG
@endsection

@section('body')

    <h2>{{ $post->judul }}</h2>
    {{ $post->isi }}
  	<br/><br/>
    <a class="btn btn-success" href="<?= url('/blog/'.$post->id.'/update') ?>">Ubah</a>
    <a class="btn btn-danger" href="<?= url('/blog/'.$post->id.'/delete') ?>">Hapus</a>
    <br/>
@endsection
