@extends('layout')

@section('title', 'Регистрация')

@section('header')
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
        .form-signin .checkbox {
            font-weight: 400;
        }
        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
@endsection
@section('content')
    <form class="form-signin" method="post" action="">
        <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
        <input name="token" type="hidden" value="<?=$token?>">
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Email address</label>
                    <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" value=" @isset($data['email']){{$data['email']}}@endisset" required autofocus>
                        @if($errors->has('email'))
                            @foreach($errors->get('email') as $error)
                                <small id="emailHelp" class="form-text text-muted">{{$error}}</small>
                            @endforeach
                        @endif
            </div>
            <div class="form-group">
                <label for="inputPassword" class="sr-only">Password</label>
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

                <label for="inputPasswordConfirmation" class="sr-only">Password Confirmation</label>
                <input name="password_confirmation" type="password" id="inputPasswordConfirmation" class="form-control" placeholder="Password confirmation" required>
                @if($errors->has('password'))
                    @foreach($errors->get('password') as $error)
                        <small id="emailHelp" class="form-text text-muted">{{$error}}</small>
                    @endforeach
                @endif
            </div>

        <button name="submit" class="btn btn-lg btn-primary btn-block" type="submit">Регистрация</button>
    </form>
@endsection