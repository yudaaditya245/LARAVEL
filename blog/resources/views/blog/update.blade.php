@extends('layouts.layout')

@section('title', 'UPDATE DATA')

@section('heading')

    <a class="btn btn-info" href="<?= url('/blog/'.$post->id) ?>"><span class="glyphicon glyphicon-arrow-left"></span></a> &nbsp; UPDATE DATA

@endsection

@section('body')

    <form action="<?= url('/blog/'.$post->id) ?>" method="post">
        <input class="form-control" type="text" name="judul" value="{{ $post->judul }}"><br/>
        <textarea class="form-control" name="isi" rows="8" cols="80">{{ $post->isi }}</textarea><br/>
        <input class="btn btn-success" type="submit" name="submit" value="Ubah">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
    </form>

@endsection
