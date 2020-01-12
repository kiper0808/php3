<?php

namespace Polzagram\Action;

use Polzagram\Model\User;

class UsersAction
{
    public function __invoke(\GuzzleHttp\Psr7\ServerRequest $request)
    {
        $users = User::all();
        return view('users', [
            'users' => $users
        ]);
    }
}