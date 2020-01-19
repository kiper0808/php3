<?php


namespace Polzagram\Action;


use GuzzleHttp\Psr7\ServerRequest;
use Polzagram\Model\User;

class TestAction
{
    public function __invoke(ServerRequest $request)
    {
        /* https://samples.openweathermap.org/data/2.5/group?id=524901,703448,2643743&units=metric&appid=b6907d289e10d714a6e88b30761fae22
        / group
        / &lang={lang} ru язык
        / 1f80a1eba77f4444b5475851201901 wwo
        / https://api.worldweatheronline.com/premium/v1/weather.ashx?q=62.168588,129.439533&key=1f80a1eba77f4444b5475851201901&format=json&lang=ru
        */
        $apiKey = '1f80a1eba77f4444b5475851201901';
        $params = 'format=json&lang=ru';
        $target = '62.168588,129.439533';
        $url = 'https://api.worldweatheronline.com/premium/v1/marine.ashx'; // ?q=London&key=7cb31b357cdbd1712d618e54127cee17
        $open = file_get_contents("{$url}?q={$target}&key={$apiKey}&{$params}");
        $data = json_decode($open, true);
        var_dump($data); exit();
        //$user = User::find($request->getAttribute('id'));
        return view('test', [
            'data' => $data
        ]);
    }
}