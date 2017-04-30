@extends('layouts.user')

@section('user', 'active')

@section('body')
    @if(count($errors) > 0)
        @foreach($errors->all() as $errors)
            <div class="alert alert-danger">{{ $errors }}</div>
        @endforeach
    @endif

    <form action="<?= url('/user/upassval/'.$users->id) ?>" method="post">
        <label>Password Lama</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input class="form-control" type="password" name="passwordlama">
        </div>
        <br/>

        <label>Password Baru</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input class="form-control" type="password" name="password">
        </div>
        <br/>

        <label>Confirm Password Baru</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input class="form-control" type="password" name="cpassword">
        </div>
        <br/>

        <input class="btn btn-success" type="submit" name="update" value="Ubah Password">
        <a class="btn btn-danger" href="<?= url('/user/edit/'.$users->id) ?>">Cancel</a>

        {{ csrf_field() }}

    </form>
@endsection
