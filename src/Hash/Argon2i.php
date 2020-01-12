<?php


namespace Polzagram\Hash;


class Argon2i implements HashInterface
{
    const OPTION_MEMORY_COST ='memory_cost';
    const OPTION_TIME_COST ='time_cost';
    const OPTION_THREADS = 'threads';

    public function hash(string $password, array $options = [])
    {
        if(!empty($options)){
            foreach($options as $option){
                if(!in_array($options, [self::OPTION_MEMORY_COST, self::OPTION_TIME_COST, self::OPTION_THREADS])){
                    throw new \Exception('Wrong params');
                }
            }
        }
        return password_hash($password, PASSWORD_ARGON2I, $options);
    }

    public function verify(string $password, string $hash) : bool
    {
        return password_verify($password, $hash);
    }
}