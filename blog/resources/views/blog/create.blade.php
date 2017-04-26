@extends('layouts.layout')

@section('title', 'CREATE DATA')

@section('heading')
    <a class="btn btn-info" href="<?= url('/blog') ?>"><span class="glyphicon glyphicon-arrow-left"></span></a> &nbsp; TAMBAH ARTIKEL
@endsection

@section('body')

    <form action="<?= url('/blog/post') ?>" method="post">
        <label>Judul</label>
        <input class="form-control" type="text" name="judul"><br/>
        <label>Content</label>
        <textarea class="form-control" name="isi" rows="8" cols="80"></textarea><br/>
        {{ csrf_field() }}
        <input class="btn btn-success" type="submit" name="submit" value="Tambah">
    </form>

@endsection
