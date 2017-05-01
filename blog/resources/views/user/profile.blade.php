@extends('layouts.user')

@section('profile', 'active')

@section('body')
    <table class="table table-hover table-striped">
        <tr>
            <td>Nama</td>
            <td> : </td>
            <td>{{ $user->fname }} {{ $user->lname }}</td>
        </tr>

        <tr>
            <td>Email</td>
            <td> : </td>
            <td>{{ $user->email }}</td>
        </tr>

        <tr>
            <td>Level</td>
            <td> : </td>
            @if ($user->level == 1)
            <td>Admin</td>
            @else
            <td>Member</td>
            @endif
        </tr>
    </table>

    @if (session('user_id') == $user->id)
    <a class="btn btn-sm btn-success" href="<?= url('/user/edit/'.$user->id) ?>">Edit Profile</a>
    @endif

    <a class="btn btn-sm btn-success" href="<?= url('/blog/user/'.$user->id) ?>">Lihat Semua Post</a>
@endsection
