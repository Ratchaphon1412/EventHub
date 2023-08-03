<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = new User();
        $user->name = 'Ratchaphon1412';
        $user->email = 'ratchaphon.h111@gmail.com';
        $user->password = bcrypt('$Nueng111');
        $user->first_name = 'Ratchaphon';
        $user->last_name = 'Hinsui';
        $user->phone = '0632686119';
        $user->gender = 'Male';
        $user->save();

    }
}
