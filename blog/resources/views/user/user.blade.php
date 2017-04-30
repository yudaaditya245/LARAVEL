@extends('layouts.user')

@section('user', 'active')

@section('body')
    <table class="table table-hover table-striped">
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th>Username</th>
            <th>Name</th>
            <th>Level</th>
            <th>Action</th>
        </tr>

        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>
                {{ $user->email }}
                @if(session('user_id') == $user->id)
                    <span class="label label-default">You</span>
                @endif
            </td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->fname }}</td>
            @if($user->level == 1)
                <td><span class="label label-info">Admin</span></td>
            @else
                <td><span class="label label-warning">Member</span></td>
            @endif

            <td>
                <a class="btn btn-sm btn-success" href="<?= url('/user/edit/'.$user->id) ?>"><span class="glyphicon glyphicon-edit"></span></a>
                @if(session('user_id') == $user->id || $user->level == 1)
                    <a class="btn btn-sm btn-danger" href="#" disabled><span class="glyphicon glyphicon-trash"></span></a>
                @else
                    <a class="btn btn-sm btn-danger" href="<?= url('/user/delete/'.$user->id) ?>"><span class="glyphicon glyphicon-trash"></span></a>
                @endif
            </td>

        </tr>
        @endforeach
    </table>
@endsection
