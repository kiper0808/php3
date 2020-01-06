<?php


namespace Polzagram\Model;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }
}