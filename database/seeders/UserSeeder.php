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

        if(User::count() > 0){

            echo "Have some user in database \n";
            
            return;
        }
        $user = new User();
        $user->name = 'Ratchaphon1412';
        $user->email = 'ratchaphon.h111@gmail.com';
        $user->password = bcrypt('$Nueng111');
        $user->first_name = 'Ratchaphon';
        $user->last_name = 'Hinsui';
        $user->phone = '0632686119';
        $user->gender = 'Male';
        $user->save();

        $user = new User();
        $user->name = 'Ratchaphon111';
        $user->email = 'sevenknight5570@gmail.com';
        $user->password = bcrypt('$Nueng111');
        $user->first_name = 'Ratchaphon';
        $user->last_name = 'Hinsui';
        $user->phone = '0632686119';
        $user->gender = 'Male';
        $user->save();

        $user = new User();
        $user->name = 'Test 1';
        $user->email = 'Test111@gmail.com';
        $user->password = bcrypt('$Nueng111');
        $user->first_name = 'Ratchaphon';
        $user->last_name = 'Hinsui';
        $user->phone = '0632686119';
        $user->gender = 'Male';
        $user->save();


    }
}
