<?php

namespace Database\Seeders;

use App\Interfaces\KanbanColumnsRepositoryInterface;
use App\Interfaces\KanbanRepositoryInterface;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Kanban;
use App\Models\KanbanColumn;
use App\Models\KanbanCard;
use App\Models\Event;
use function Sodium\add;


class KanbanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private function addCards(Event $event, KanbanColumn $column, int $numberCard) {
        for ($i = 1; $i <= $numberCard; $i++) {
            $card = new KanbanCard();
            $card->title = "Card " . $i;
            $card->description = "Description ". $i;
            $card->kanban_column_id = $column->id;
            $card->user_id = $event->user_id;
            $card->save();
        }
    }
    public function run(): void
    {
        $events = Event::all();
        foreach ($events as $event) {
            if ($event->kanban != null) {
                echo "There are some kanbans in  ". $event->title. " event \n";
                continue;
            }
            $kanban = new Kanban();
            $kanban->name = "Kanban ". $event->id;
            $kanban->event_id = $event->id;
            $kanban->save();

            $column = new KanbanColumn();
            $column->name = "Todo";
            $column->kanban_id = $kanban->id;
            $column->save();

            $cardNumber = fake()->numberBetween(0, 3);
            $this->addCards($event, $column, $cardNumber);

            $column = new KanbanColumn();
            $column->name = "Working";
            $column->kanban_id = $kanban->id;
            $column->save();

            $cardNumber = fake()->numberBetween(0, 3);
            $this->addCards($event, $column, $cardNumber);

            $column = new KanbanColumn();
            $column->name = "Done";
            $column->kanban_id = $kanban->id;
            $column->save();

            $cardNumber = fake()->numberBetween(0, 3);
            $this->addCards($event, $column, $cardNumber);
        }

//        $kanban = new Kanban();
//
//        if(Kanban::count() > 0){
//            echo "There are some kanbans in database \n";
//            return;
//        }
//        //
//        $kanban = new Kanban();
//        $kanban->name = "Kanban 1";
//        $kanban->event_id = Event::find(1)->get()[0]->id;
//        $kanban->save();
//
//        $column = new KanbanColumn();
//        $column->name = "Todo";
//        $column->kanban_id = $kanban->id;
//        $column->save();
//
//        $column = new KanbanColumn();
//        $column->name = "Working";
//        $column->kanban_id = $kanban->id;
//        $column->save();
//
//        $column = new KanbanColumn();
//        $column->name = "Done";
//        $column->kanban_id = $kanban->id;
//        $column->save();
//
//        $card = new KanbanCard();
//        $card->title = "Card 1";
//        $card->description = "Description 1";
//        $card->kanban_column_id = $kanban->columns[0]->id;
//        $card->user_id = 1;
//        $card->save();
//
//        $card = new KanbanCard();
//        $card->title = "Card 2";
//        $card->description = "Description 2";
//        $card->kanban_column_id = $kanban->columns[0]->id;
//        $card->user_id = 1;
//        $card->save();
//
//        $card = new KanbanCard();
//        $card->title = "Card 3";
//        $card->description = "Description 3";
//        $card->kanban_column_id = $kanban->columns[1]->id;
//        $card->user_id = 1;
//        $card->save();
//
//        $card = new KanbanCard();
//        $card->title = "Card 4";
//        $card->description = "Description 4";
//        $card->kanban_column_id = $kanban->columns[1]->id;
//        $card->user_id = 1;
//        $card->save();
//
//        $card = new KanbanCard();
//        $card->title = "Card 5";
//        $card->description = "Description 5";
//        $card->kanban_column_id = $kanban->columns[2]->id;
//        $card->user_id = 1;
//        $card->save();





    }
}
