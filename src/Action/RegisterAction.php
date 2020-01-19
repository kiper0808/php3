<?php


namespace Polzagram\Action;


use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;
use Polzagram\Hash\Argon2i;
use Polzagram\Hash\Bcrypt;
use Polzagram\Hash\HashInterface;
use Polzagram\Model\User;

class RegisterAction
{
    protected string $token;
    protected array $errors = [
        'email' => [],
        'password' => [],
        'status' => 0
    ];

    private $hash;

    protected string $argument_email;
    private $validator;

    public function __construct(HashInterface $hash, $validator)
    {
        $this->validator = $validator;
        $this->hash = $hash;
    }

    public function __invoke(\GuzzleHttp\Psr7\ServerRequest $request)
    {
        $token = uniqid();
        $bag = new MessageBag();
        $data = [];

          $method = $request->getServerParams()['REQUEST_METHOD'];
//        $token = $request->getParsedBody()['token'] ?? '';
//        $email = $request->getParsedBody()['email'] ?? '';le
//        $password = $request->getParsedBody()['password'] ?? '';
//        $password_confirmation = $request->getParsedBody()['password_confirmation'] ?? '';

        if($method === 'POST') {
            $data = $request->getParsedBody();
            //
//            if($_SESSION['token'] != $token) {
//                exit("hacker attack");
//            }

            try{
                $this->validator->validate($data, [
                    'email' => ['required', 'email', 'unique:users,email'],
                    'password' => ['required', 'min: 8', 'confirmed'],
                    'password_confirmation' => ['required', 'min: 8']
                ]);

                $user = new User();
                $user->email = $data['email'];
                $user->password = $this->hash->hash($data['password']);
                $user->save();

                header('Location: /');
            } catch (ValidationException $exception){
                $bag = $exception->validator->errors();
            }

            return view('register', [
                'title' => 'Регистрация',
                'errors' => $bag,
                'data' => $data,
                'token' => $token
            ]);

//            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//                $this->errors['email'][] = 'Некорректный email';
//                $this->errors['status'] = 1;
//            }
//            else{
//                $this->argument_email = $email;
//            }
//
//            if($this->errors['status'] === 1) {
//
//                $this->token = uniqid();
//                $_SESSION['token'] = $this->token;
//
//                return view('register', [
//                    'title' => 'Регистрация',
//                    'errors' => $this->errors,
//                    'argument_email' => $this->argument_email,
//                    'token' => $this->token
//                ]);
//            }
//            if($this->errors['status'] === 0) {
////
////                $hash = password_hash($password, PASSWORD_DEFAULT);
////                $user = new User();
////                $user->email = $email;
////                $user->password = $hash;
////                $user->save();
////
////                header('Location: /');
////            }
////        }
////        elseif($request->getServerParams()['REQUEST_METHOD'] === 'GET') {
////
////            $this->token = uniqid();
////            $_SESSION['token'] = $this->token;
////
////            return view('register', [
////                'title' => 'Регистрация',
////                'token' => $this->token
////            ]);
            }
        }

//    public function __invoke(\GuzzleHttp\Psr7\ServerRequest $request)
//    {
//        return view('register');
//
//    }
}