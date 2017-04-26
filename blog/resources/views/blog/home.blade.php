@extends('layouts.layout')

@section('title', 'HOMEPAGE')

@section('heading')
    <a class="btn btn-info" href="<?= url('/blog/create') ?>">Tambah Artikel</a>
@endsection

@section('body')

	  @foreach ($post as $row)

        <a href="<?= url('/blog/'.$row->id) ?>"><h2>{{ $row->judul }}</h2></a>
        {{ substr($row->isi, 0, 380) }} ... <a href="<?= url('/blog/'.$row->id) ?>"> Selengkapnya >></a>
		  	<br/><br/>
		    <form action="<?= url('/blog/'.$row->id) ?>" method="post">
            <a class="btn btn-success" href="<?= url('/blog/'.$row->id) ?>">Lihat</a>
		    		<input class="btn btn-danger" type="submit" name="delete" value="Hapus">
		    		{{ csrf_field() }}
		      	<input type="hidden" name="_method" value="DELETE">
				  	</br>
		    </form>

		  	<hr>
    @endforeach

@endsection
