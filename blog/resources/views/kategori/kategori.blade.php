@extends('layouts.user')

@section('kategori', 'active')

@section('body')
    <a class="btn btn-success" href="{{ url('kategori/tambah') }}">Tambah Kategori</a>
    <br/><br/>
    <table class="table table-hover table-striped">
        <tr>
            <th>Id</th>
            <th>Kategori</th>
            <th>Action</th>
        </tr>

        @foreach($kategori as $kat)
        <tr>
            <td>{{ $kat->id }}</td>
            <td>{{ $kat->kategori }}</td>
            <td>
                <a class="btn btn-success" href="<?= url('/kategori/ubah/'.$kat->id) ?>"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-danger" href="<?= url('/kategori/hapus/'.$kat->id) ?>"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
