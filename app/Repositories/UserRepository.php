<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;



class UserRepository implements UserRepositoryInterface
{
    public function findById($user_id)
    {
        return User::find($user_id);
    }

    public function checkUserExist($email)
    {
        return User::where('email', $email)->exists();
    }
    public function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }
}
