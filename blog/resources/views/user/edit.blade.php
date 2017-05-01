@extends('layouts.user')

@section('user', 'active')

@section('body')
    <form action="<?= url('/user/editval/'.$users->id) ?>" method="post">
        @if(count($errors) > 0)
            @foreach($errors->all() as $errors)
                <div class="alert alert-danger">{{ $errors }}</div>
            @endforeach
        @endif

        <label>First Name</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-font"></span></span>
            <input class="form-control" type="text" name="fname" value="{{ $users->fname }}">
        </div>
        <br/>

        <label>Last Name</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-bold"></span></span>
            <input class="form-control" type="text" name="lname" value="{{ $users->lname }}">
        </div>
        <br/>

        <label>Email</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            <input class="form-control" type="text" name="email" value="{{ $users->email }}">
        </div>
        <br/>

        @if(session('user_id') == $users->id)
        <label>Username</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input class="form-control" type="text" name="username" value="{{ $users->username }}">
        </div>
        <br/>
        @else
        <label>Username</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input class="form-control" type="text" name="username" value="{{ $users->username }}" readonly>
        </div>
        <br/>
        @endif
        <label>Level</label>
        <div class="input-group col-md-3">
            <span class="input-group-addon"><span class="glyphicon glyphicon-wrench"></span></span>
            @if(session('level') == 1 && $users->level == 0)
                <select class="form-control" name="level">
                    <option value="1">Admin</option>
                    <option value="0" SELECTED>Member</option>
                </select>
            @elseif(session('level') == 0)
                <select class="form-control" name="level">
                    <option value="1" disabled>Admin</option>
                    <option value="0" SELECTED>Member</option>
                </select>
            @else
                <select class="form-control" name="level">
                    <option value="1" SELECTED>Admin</option>
                    <option value="0" disabled>Member</option>
                </select>
            @endif
        </div>
        <br/>

        <label>Password</label>
        @if(session('user_id') == $users->id)
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input class="form-control" type="password" name="password" value="{{ $users->password }}">
            <span class="input-group-addon"><a href="<?= url('/user/upass/'.$users->id) ?>">Ubah password?</a></span>
        </div>
        @else
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input class="form-control" type="password" name="password" value="{{ $users->password }}" readonly>
        </div>
        @endif
        <br/>

        <input class="btn btn-success" type="submit" name="update" value="Update">
        @if(session('level') == 1)
        <a class="btn btn-danger" href="{{ url('/user') }}">Cancel</a>
        @endif

        {{ csrf_field() }}
    </form>
@endsection
