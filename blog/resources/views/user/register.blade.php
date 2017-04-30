@extends('layouts.logreg')

@section('title', 'LOGIN PAGE')

@section('heading', 'REGISTER')

@section('body')
    <form action="{{ url('/user/valreg') }}" method="post">

        @if(count($errors) > 0)
            @foreach($errors->all() as $errors)
                <div class="alert alert-danger">{{ $errors }}</div>
            @endforeach
        @endif

        <label>First Name</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-font"></span></span>
            <input class="form-control" type="text" name="fname" value="{{ old('fname') }}">
        </div>
        <br/>
        <label>Last Name</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-bold"></span></span>
            <input class="form-control" type="text" name="lname" value="{{ old('lname') }}">
        </div>
        <br/>
        <label>Email</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            <input class="form-control" type="text" name="email" value="{{ old('email') }}">
        </div>
        <br/>
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
        <label>Comfirm Password</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input class="form-control" type="password" name="cpassword">
        </div>
        <br/>
        <input class="btn btn-success" type="submit" name="register" value="Register">
        Punya akun? <a href="{{ url('/user/login') }}">Login</a>

        {{ csrf_field() }}
    </form>
@endsection
