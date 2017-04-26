@extends('layouts.layout')

@section('title', 'UPDATE DATA')

@section('heading')
    @foreach($post as $row)
        <a class="btn btn-info" href="<?= url('/blog/'.$row->id) ?>"><span class="glyphicon glyphicon-arrow-left"></span></a> &nbsp; UPDATE DATA
    @endforeach
@endsection

@section('body')
    @foreach($post as $row)

    <form action="<?= url('/blog/'.$row->id) ?>" method="post">
        <input class="form-control" type="text" name="judul" value="{{ $row->judul }}"><br/>
        <textarea class="form-control" name="isi" rows="8" cols="80">{{ $row->isi }}</textarea><br/>
        <input class="btn btn-success" type="submit" name="submit" value="Ubah">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
    </form>

    @endforeach
@endsection
