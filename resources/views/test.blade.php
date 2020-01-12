@extends('layout')

@section('title', 'Test Action')

@section('content')
    @empty($user)
            <p>Юзера нет</p>
    @else
        <ul>
            <li>{{ $user->id }}</li>
            <li>{{ $user->name }}</li>
            <li>{{ $user->password }}</li>
            <li>{{ $user->created_at }}</li>
            <li>{{ $user->updated_at }}</li>
            @foreach($user->languages as $language)
                <li>{{ $language['name'] }}</li>
            @endforeach
        </ul>
    @endempty
@endsection