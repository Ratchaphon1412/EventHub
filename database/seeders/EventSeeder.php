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
        //
        $event = new Event();
        $event->title = fake()->name();
        $event->description = fake()->text();
        $category = Category::find(1)->get()[0];
        $event->category_id = $category->id;
        $event->image_poster = "/images/austin-distel-rxpThOwuVgE-unsplash.jpg";
        $event->registration_start_date = fake()->dateTime();
        $event->registration_end_date = fake()->dateTime();
        $event->event_start_date = fake()->dateTime();
        $event->event_end_date = fake()->dateTime();
        $event->user_id = User::find(1)->get()[0]->id;
        $event->save();

        $event = new Event();
        $event->title = fake()->name();
        $event->description = fake()->text();
        $category = Category::find(1)->get()[0];
        $event->category_id = $category->id;
        $event->image_poster = "/images/austin-distel-rxpThOwuVgE-unsplash.jpg";
        $event->registration_start_date = fake()->dateTime();
        $event->registration_end_date = fake()->dateTime();
        $event->event_start_date = fake()->dateTime();
        $event->event_end_date = fake()->dateTime();
        $event->user_id = User::find(1)->get()[0]->id;

        $event->save();
        $event = new Event();
        $event->title = fake()->name();
        $event->description = fake()->text();
        $category = Category::find(1)->get()[0];
        $event->category_id = $category->id;
        $event->image_poster = "/images/austin-distel-rxpThOwuVgE-unsplash.jpg";
        $event->registration_start_date = fake()->dateTime();
        $event->registration_end_date = fake()->dateTime();
        $event->event_start_date = fake()->dateTime();
        $event->event_end_date = fake()->dateTime();
        $event->user_id = User::find(1)->get()[0]->id;

        $event->save();
        $event = new Event();
        $event->title = fake()->name();
        $event->description = fake()->text();
        $category = Category::find(1)->get()[0];
        $event->category_id = $category->id;
        $event->image_poster = "/images/austin-distel-rxpThOwuVgE-unsplash.jpg";
        $event->registration_start_date = fake()->dateTime();
        $event->registration_end_date = fake()->dateTime();
        $event->event_start_date = fake()->dateTime();
        $event->event_end_date = fake()->dateTime();
        $event->user_id = User::find(1)->get()[0]->id;

        $event->save();
        $event = new Event();
        $event->title = fake()->name();
        $event->description = fake()->text();
        $category = Category::find(1)->get()[0];
        $event->category_id = $category->id;
        $event->image_poster = "/images/austin-distel-rxpThOwuVgE-unsplash.jpg";
        $event->registration_start_date = fake()->dateTime();
        $event->registration_end_date = fake()->dateTime();
        $event->event_start_date = fake()->dateTime();
        $event->event_end_date = fake()->dateTime();
        $event->user_id = User::find(1)->get()[0]->id;

        $event->save();
        $event = new Event();
        $event->title = fake()->name();
        $event->description = fake()->text();
        $category = Category::find(1)->get()[0];
        $event->category_id = $category->id;
        $event->image_poster = "/images/austin-distel-rxpThOwuVgE-unsplash.jpg";
        $event->registration_start_date = fake()->dateTime();
        $event->registration_end_date = fake()->dateTime();
        $event->event_start_date = fake()->dateTime();
        $event->event_end_date = fake()->dateTime();
        $event->user_id = User::find(1)->get()[0]->id;

        $event->save();
        $event = new Event();
        $event->title = fake()->name();
        $event->description = fake()->text();
        $category = Category::find(1)->get()[0];
        $event->category_id = $category->id;
        $event->image_poster = "/images/austin-distel-rxpThOwuVgE-unsplash.jpg";
        $event->registration_start_date = fake()->dateTime();
        $event->registration_end_date = fake()->dateTime();
        $event->event_start_date = fake()->dateTime();
        $event->event_end_date = fake()->dateTime();
        $event->user_id = User::find(1)->get()[0]->id;

        $event->save();
        $event = new Event();
        $event->title = fake()->name();
        $event->description = fake()->text();
        $category = Category::find(1)->get()[0];
        $event->category_id = $category->id;
        $event->image_poster = "/images/austin-distel-rxpThOwuVgE-unsplash.jpg";
        $event->registration_start_date = fake()->dateTime();
        $event->registration_end_date = fake()->dateTime();
        $event->event_start_date = fake()->dateTime();
        $event->event_end_date = fake()->dateTime();
        $event->user_id = User::find(1)->get()[0]->id;

        $event->save();
        $event = new Event();
        $event->title = fake()->name();
        $event->description = fake()->text();
        $category = Category::find(1)->get()[0];
        $event->category_id = $category->id;
        $event->image_poster = "/images/austin-distel-rxpThOwuVgE-unsplash.jpg";
        $event->registration_start_date = fake()->dateTime();
        $event->registration_end_date = fake()->dateTime();
        $event->event_start_date = fake()->dateTime();
        $event->event_end_date = fake()->dateTime();
        $event->user_id = User::find(1)->get()[0]->id;

        $event->save();
        $event = new Event();
        $event->title = fake()->name();
        $event->description = fake()->text();
        $category = Category::find(1)->get()[0];
        $event->category_id = $category->id;
        $event->image_poster = "/images/austin-distel-rxpThOwuVgE-unsplash.jpg";
        $event->registration_start_date = fake()->dateTime();
        $event->registration_end_date = fake()->dateTime();
        $event->event_start_date = fake()->dateTime();
        $event->event_end_date = fake()->dateTime();
        $event->user_id = User::find(1)->get()[0]->id;

        $event->save();
        $event = new Event();
        $event->title = fake()->name();
        $event->description = fake()->text();
        $category = Category::find(1)->get()[0];
        $event->category_id = $category->id;
        $event->image_poster = "/images/austin-distel-rxpThOwuVgE-unsplash.jpg";
        $event->registration_start_date = fake()->dateTime();
        $event->registration_end_date = fake()->dateTime();
        $event->event_start_date = fake()->dateTime();
        $event->event_end_date = fake()->dateTime();
        $event->user_id = User::find(1)->get()[0]->id;

        $event->save();
        $event = new Event();
        $event->title = fake()->name();
        $event->description = fake()->text();
        $category = Category::find(1)->get()[0];
        $event->category_id = $category->id;
        $event->image_poster = "/images/austin-distel-rxpThOwuVgE-unsplash.jpg";
        $event->registration_start_date = fake()->dateTime();
        $event->registration_end_date = fake()->dateTime();
        $event->event_start_date = fake()->dateTime();
        $event->event_end_date = fake()->dateTime();
        $event->user_id = User::find(1)->get()[0]->id;

        $event->save();
        $event = new Event();
        $event->title = fake()->name();
        $event->description = fake()->text();
        $category = Category::find(1)->get()[0];
        $event->category_id = $category->id;
        $event->image_poster = "/images/austin-distel-rxpThOwuVgE-unsplash.jpg";
        $event->registration_start_date = fake()->dateTime();
        $event->registration_end_date = fake()->dateTime();
        $event->event_start_date = fake()->dateTime();
        $event->event_end_date = fake()->dateTime();
        $event->user_id = User::find(1)->get()[0]->id;

        $event->save();
        $event = new Event();
        $event->title = fake()->name();
        $event->description = fake()->text();
        $category = Category::find(1)->get()[0];
        $event->category_id = $category->id;
        $event->image_poster = "/images/austin-distel-rxpThOwuVgE-unsplash.jpg";
        $event->registration_start_date = fake()->dateTime();
        $event->registration_end_date = fake()->dateTime();
        $event->event_start_date = fake()->dateTime();
        $event->event_end_date = fake()->dateTime();
        $event->user_id = User::find(1)->get()[0]->id;

        $event->save();
        $event = new Event();
        $event->title = fake()->name();
        $event->description = fake()->text();
        $category = Category::find(1)->get()[0];
        $event->category_id = $category->id;
        $event->image_poster = "/images/austin-distel-rxpThOwuVgE-unsplash.jpg";
        $event->registration_start_date = fake()->dateTime();
        $event->registration_end_date = fake()->dateTime();
        $event->event_start_date = fake()->dateTime();
        $event->event_end_date = fake()->dateTime();
        $event->user_id = User::find(1)->get()[0]->id;

        $event->save();
    }
}
