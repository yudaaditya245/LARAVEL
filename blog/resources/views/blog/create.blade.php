@extends('layouts.user')

@section('blog', 'active')

@section('body')
    @if(count($errors) > 0)
        @foreach($errors->all() as $errors)
            <div class="alert alert-danger">{{ $errors }}</div>
        @endforeach
    @endif
    <form action="<?= url('/blog/post') ?>" method="post">
        <label>Judul</label>
        <input class="form-control" type="text" name="judul"><br/>
        <label>Content</label>
        <textarea class="form-control" name="isi" rows="8" cols="80"></textarea><br/>

        <label>Kategori</label>
        <select class="form-control" name="kategori">
            @foreach($kategori as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
            @endforeach
        </select>
        <br/>

        {{ csrf_field() }}
        <input class="btn btn-success" type="submit" name="submit" value="Tambah">
        <a class="btn btn-danger" href="{{ url('/blog') }}">Cancel</a>
    </form>

@endsection
