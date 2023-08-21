<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Team;
use App\Models\User;
use App\Models\Event;
use PhpParser\Node\Expr\List_;
use Ramsey\Collection\Collection;
use Ramsey\Uuid\Type\Integer;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $events = Event::all();

        foreach ($events as $event) {
            if ($event->userTeam->count() > 0) {
                echo "There are some user in ". $event->title . "\n";
                continue;
            }
            $users = User::all();
            $numberOfUsersInTeam = fake()->numberBetween(0, $users->count());
            for ($i = 0; $i < $numberOfUsersInTeam; $i++) {
                $user = $users->random();
                if ($event->userTeam->contains($user->id)) {
                    $i--;
                } else {
                    $event->userTeam()->attach($user);
                }
            }
        }

//        $team = new Team();
//        $team->event_id = Event::find(1)->get()[0]->id;
//        $team->user_id = User::find(1)->id;
//        $team->save();
//
//        $team = new Team();
//        $team->event_id = Event::find(1)->get()[0]->id;
//        $team->user_id = User::find(2)->id;
//        $team->save();
//
//        $team = new Team();
//        $team->event_id = Event::find(2)->id;
//        $team->user_id = User::find(1)->id;
//        $team->save();

    }
}
