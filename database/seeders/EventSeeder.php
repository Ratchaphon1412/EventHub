<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Event;
use App\Models\Category;
use App\Models\User;
use App\Models\Team;
use App\Models\Kanban;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $n = 3; // must more than 3
        if (Event::all()->count() > $n-1) {
            echo "There are some event in database \n";
            return;
        }
        $events = Event::factory($n)->create();
        for ($i = 0; $i < 3; $i++) {
            $event = $events->get($i);
            $event->user_id = $i+1;
            $event->save();
        }

    }
}
