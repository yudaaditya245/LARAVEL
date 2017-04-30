@extends('layouts.user')

@section('blog', 'active')

@section('body')
    <form action="" method="post">

        <label>Kategori</label>
        <select class="form-control" name="assign">
            @foreach($kategori as $kategori)
                @if($kategori->id == $post->kat_id)
                    {{ $selected = 'selected' }}
                @else
                    {{ $selected = '' }}
                @endif
                <option value="{{ $kategori->id }}" {{ $selected }}>{{ $kategori->kategori }}</option>
            @endforeach
        </select>

    </form>
@endsection
