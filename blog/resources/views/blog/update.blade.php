@extends('layouts.user')

@section('blog', 'active')

@section('body')

    <form action="<?= url('/blog/'.$post->id) ?>" method="post">
        <label>Judul</label>
        <input class="form-control" type="text" name="judul" value="{{ $post->judul }}"><br/>

        <label>Isi</label>
        <textarea class="form-control" name="isi" rows="8" cols="80">{{ $post->isi }}</textarea><br/>

        <label>Kategori</label>
        <ul style="padding:0;">
            <li class="label label-info">Bla</li>
            <li class="label label-info">Bla</li>
            <li class="label label-info">Bla</li>
            <li class="label label-info">Bla</li>

            <li class="pull-right"><a href="#">Edit Kategori</a></li>
        </ul>
        <br/>

        <input class="btn btn-success" type="submit" name="submit" value="Ubah">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <a class="btn btn-danger" href="{{ url('/blog') }}">Cancel</a>
    </form>

@endsection
