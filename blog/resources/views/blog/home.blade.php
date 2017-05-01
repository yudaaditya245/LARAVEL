@extends('layouts.layout')

@section('title', 'HOMEPAGE')

@section('heading')
    HOME PAGE
@endsection

@section('body')

    @if (count($post) < 1)
        <b>POST YANG ANDA CARI TIDAK DITEMUKAN</b>
    @endif

	  @foreach ($post as $row)

        <a href="<?= url('/blog/'.$row->id) ?>"><h2>{{ $row->judul }}</h2></a>

        @foreach ($user as $u)
            @if($row->author == $u->id)
                <span class="glyphicon glyphicon-user"></span>&nbsp;<a href="<?= url('/user/profile/'.$row->author) ?>">{{ $u->fname }}</a>
            @endif
        @endforeach
        &nbsp;
        @if(isset($kategori) > 0)
            @foreach($kategori as $kat)
                @if($row->kategori == $kat->id)
                    <span class="glyphicon glyphicon-tag"></span>&nbsp;<a href="<?= url('/blog/filter/'.$kat->id) ?>">{{ $kat->kategori }}</a>
                @endif
            @endforeach
        @endif
        &nbsp;
        <span class="glyphicon glyphicon-calendar"></span>&nbsp;{{ $row->created_at }}
        
        <br/><br/>

        @if(strlen($row->isi) > 380 )
            {{ substr($row->isi, 0, 380) }} ... <a href="<?= url('/blog/'.$row->id) ?>">Selengkapnya >></a>
        @else
            {{ $row->isi }}
        @endif

		  	<hr>
    @endforeach

@endsection
