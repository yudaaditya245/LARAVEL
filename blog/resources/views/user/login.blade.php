@extends('layouts.logreg')

@section('title', 'LOGIN PAGE')

@section('heading', 'LOGIN')

@section('body')
    @if(count($errors) > 0)
        @foreach($errors->all() as $errors)
            <div class="alert alert-danger">{{ $errors }}</div>
        @endforeach

    @elseif(isset($succes_msg))
        <div class="alert alert-success">{{ $succes_msg }}</div>
    @endif

    <form action="<?= url('/user/vallog') ?>" method="post">
        <label>Username</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input class="form-control" type="text" name="username" value="{{ old('username') }}">
        </div>
        <br/>
        <label>Password</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input class="form-control" type="password" name="password">
        </div>
        <br/>
        <input class="btn btn-success" type="submit" name="login" value="Login">
        Belum punya akun? <a href="{{ url('/user/register') }}">Register</a>
        {{ csrf_field() }}
    </form>
@endsection
