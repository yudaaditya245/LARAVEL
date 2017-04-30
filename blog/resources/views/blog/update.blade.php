@extends('layouts.user')

@section('blog', 'active')

@section('body')
    @if(count($errors) > 0)
        @foreach($errors->all() as $errors)
            <div class="alert alert-danger">{{ $errors }}</div>
        @endforeach
    @endif

    <form action="<?= url('/blog/'.$post->id) ?>" method="post">
        <label>Judul</label>
        <input class="form-control" type="text" name="judul" value="{{ $post->judul }}"><br/>

        <label>Isi</label>
        <textarea class="form-control" name="isi" rows="8" cols="80">{{ $post->isi }}</textarea><br/>

        <label>Kategori</label>
        <select class="form-control" name="kategori">
            @foreach($kategori as $kategori)
                @if($kategori->id == $post->kategori)
                    {{ $selected = 'selected' }}
                @else
                    {{ $selected = '' }}
                @endif
                <option value="{{ $kategori->id }}" {{ $selected }}>{{ $kategori->kategori }}</option>
            @endforeach
        </select>
        <br/>

        <input class="btn btn-success" type="submit" name="submit" value="Ubah">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <a class="btn btn-danger" href="{{ url('/blog') }}">Cancel</a>
    </form>

@endsection
