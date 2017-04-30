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

    <form action="<?= url('/kategori/ubahval/'.$kat->id) ?>" method="post">
        <label>Nama Kategori</label>
        <input class="form-control" type="text" name="kategori" value="{{ $kat->kategori }}">
        <br/>
        {{ csrf_field() }}

        <input class="btn btn-success" type="submit" name="ubah" value="Ubah">
    </form>
@endsection
