<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Kanban;
use App\Models\KanbanColumn;
use App\Models\KanbanCard;
use App\Models\Event;


class KanbanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if(Kanban::count() > 0){
            echo "There are some kanbans in database \n";
            return;
        }
        //
        $kanban = new Kanban();
        $kanban->name = "Kanban 1";
        $kanban->event_id = Event::find(1)->get()[0]->id;
        $kanban->save();

        $column = new KanbanColumn();
        $column->name = "Todo";
        $column->kanban_id = $kanban->id;
        $column->save();

        $column = new KanbanColumn();
        $column->name = "Working";
        $column->kanban_id = $kanban->id;
        $column->save();

        $column = new KanbanColumn();
        $column->name = "Done";
        $column->kanban_id = $kanban->id;
        $column->save();

        $card = new KanbanCard();
        $card->title = "Card 1";
        $card->description = "Description 1";
        $card->kanban_column_id = $kanban->columns[0]->id;
        $card->save();

        $card = new KanbanCard();
        $card->title = "Card 2";
        $card->description = "Description 2";
        $card->kanban_column_id = $kanban->columns[0]->id;
        $card->save();

        $card = new KanbanCard();
        $card->title = "Card 3";
        $card->description = "Description 3";
        $card->kanban_column_id = $kanban->columns[1]->id;
        $card->save();

        $card = new KanbanCard();
        $card->title = "Card 4";
        $card->description = "Description 4";
        $card->kanban_column_id = $kanban->columns[1]->id;
        $card->save();

        $card = new KanbanCard();
        $card->title = "Card 5";
        $card->description = "Description 5";
        $card->kanban_column_id = $kanban->columns[2]->id;
        $card->save();




        
    }
}
