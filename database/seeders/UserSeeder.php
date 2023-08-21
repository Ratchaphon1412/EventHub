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
        $user->name = 'FolkXa';
        $user->email = 'jirakit11619@gmail.com';
        $user->password = bcrypt('123456789');
        $user->first_name = 'Jirakit';
        $user->last_name = 'Chanaklang';
        $user->phone = '555 555 5555';
        $user->gender = 'Male';
        $user->save();

        $user = new User();
        $user->name = 'Tirawat';
        $user->email = 't31494384@gmail.com';
        $user->password = bcrypt('123456789');
        $user->first_name = 'Tirawat';
        $user->last_name = 'Pongpratisonthi';
        $user->phone = '555 555 5555';
        $user->gender = 'Male';
        $user->save();

        $users = User::factory(10)->create();
    }
}
