<?php

namespace Polzagram\Action;

class IndexAction
{
    public function __invoke(\GuzzleHttp\Psr7\ServerRequest $request)
    {
        return view('index');
    }
}