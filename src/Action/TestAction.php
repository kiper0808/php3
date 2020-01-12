<?php


namespace Polzagram\Action;


use GuzzleHttp\Psr7\ServerRequest;
use Polzagram\Model\User;

class TestAction
{
    public function __invoke(ServerRequest $request)
    {

        $user = User::find($request->getAttribute('id'));
        return view('test', [
            'user' => $user
        ]);
    }
}