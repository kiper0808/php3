<?php


namespace Polzagram\Hash;


interface HashInterface
{

    public function verify(string $password, string $hash) : bool;

    public function hash(string $password, array $options = []);

}