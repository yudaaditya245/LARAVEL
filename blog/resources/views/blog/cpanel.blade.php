@extends('layouts.user')

@section('blog', 'active')

@section('body')
    <a class="btn btn-success" href="{{ url('/blog/create') }}">Buat Artikel</a>
    <br/><br/>
    <table class="table table-hover table-striped">
        <tr>
            <th>Id</th>
            <th>Post</th>
            <th>Action</th>
        </tr>

        @foreach($post as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->judul }}</td>
            <td>
                <a class="btn btn-success" href="<?= url('/blog/'.$post->id.'/update') ?>"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-danger" href="<?= url('/blog/'.$post->id.'/delete') ?>"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
