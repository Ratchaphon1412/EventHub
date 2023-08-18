<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Team;
use App\Models\User;
use App\Models\Event;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $team = new Team();
        $team->event_id = Event::find(1)->get()[0]->id;
        $team->user_id = User::find(1)->id;
        $team->save();

        $team = new Team();
        $team->event_id = Event::find(1)->get()[0]->id;
        $team->user_id = User::find(2)->id;
        $team->save();

        $team = new Team();
        $team->event_id = Event::find(2)->id;
        $team->user_id = User::find(1)->id;
        $team->save();

    }
}
