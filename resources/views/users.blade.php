@extends('layout')

@section('title', 'Пользователи')

@section('content')
<h1>Пользователи</h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td><a href="/users/{{ $user['id'] }}">{{ $user['email'] }}</a></td>
            <td>{{ $user['first_name'] }}</td>
            <td>{{ $user['last_name'] }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection