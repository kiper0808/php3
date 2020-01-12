<?php

namespace Polzagram\Hash;

class Bcrypt implements HashInterface
{
    const OPTION_COST ='cost';
    const OPTION_SALT ='salt';

    public function hash(string $password, array $options = [])
    {
        if(!empty($options)){
            foreach($options as $option){
                if(!in_array($options, [self::OPTION_COST, self::OPTION_SALT])){
                    throw new \Exception('Wrong params');
                }
            }
        }
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public function verify(string $password, string $hash) : bool
    {
        return password_verify($password, $hash);
    }
}