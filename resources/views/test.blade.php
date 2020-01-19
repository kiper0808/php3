@extends('layout')

@section('title', 'Test Action')

@section('content')
    @empty($data)
            <p>Инфы нет</p>
    @else
        <ul>
            @foreach($data as $element)
                @if(is_array($element))
                    @foreach($element as $elem)
                        <li>{{ $elem }}</li>
                    @endforeach
                @endif
                <li>{{ $element }}</li>
            @endforeach
        </ul>
    @endempty
@endsection