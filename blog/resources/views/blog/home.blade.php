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
        <br/><br/>
        @if(isset($kategori) > 0)
            @foreach($kategori as $kat)
                @if($row->kategori == $kat->id)
                    <b><span class="glyphicon glyphicon-tag"></span>&nbsp; <a href="<?= url('/blog/filter/'.$kat->id) ?>">{{ $kat->kategori }}</a></b>
                @endif
            @endforeach
        @endif

		  	<hr>
    @endforeach

@endsection
