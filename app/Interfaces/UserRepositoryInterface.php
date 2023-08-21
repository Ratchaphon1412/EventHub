<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function findById($user_id);
    public function checkUserExist($email);
    public function findByEmail($email);
}
