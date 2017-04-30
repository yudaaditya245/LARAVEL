@extends('layouts.user')

@section('kategori', 'active')

@section('body')
    @if(count($errors) > 0)
        @foreach($errors->all() as $errors)
            <div class="alert alert-danger">
                {{ $errors }}
            </div>
        @endforeach
    @endif

    <form action="{{ url('/kategori/tambahval') }}" method="post">
        <label>Nama Kategori</label>
        <input class="form-control" type="text" name="kategori" value="{{ old('kategori') }}">
        <br/>
        {{ csrf_field() }}

        <input class="btn btn-success" type="submit" name="tambah" value="Tambah">
    </form>
@endsection
