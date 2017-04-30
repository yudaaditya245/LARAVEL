@extends('layouts.user')

@section('blog', 'active')

@section('body')

    <form action="<?= url('/blog/post') ?>" method="post">
        <label>Judul</label>
        <input class="form-control" type="text" name="judul"><br/>
        <label>Content</label>
        <textarea class="form-control" name="isi" rows="8" cols="80"></textarea><br/>
        {{ csrf_field() }}
        <input class="btn btn-success" type="submit" name="submit" value="Tambah">
        <a class="btn btn-danger" href="{{ url('/blog') }}">Cancel</a>
    </form>

@endsection
