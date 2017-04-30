@extends('layouts.layout')

@section('title', 'HOMEPAGE')

@section('heading')
    HOME PAGE
@endsection

@section('body')

	  @foreach ($post as $row)

        <a href="<?= url('/blog/'.$row->id) ?>"><h2>{{ $row->judul }}</h2></a>

        @if(strlen($row->isi) > 380 )
            {{ substr($row->isi, 0, 380) }} ... <a href="<?= url('/blog/'.$row->id) ?>">Selengkapnya >></a>
        @else
            {{ $row->isi }}
        @endif

		  	<hr>
    @endforeach

@endsection
