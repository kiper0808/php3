<?php

namespace Polzagram\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    public static function isEmailUnique($email)
    {
        $user = User::where('email',  $email)->first();
        $result = false;
        if($user === null) {
            $result = true;
        }

        return $result;

    }

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }
//
//    public function getEmail( string $email)
//    {
//        return $email->where('votes', '>', 100);
//    }
}