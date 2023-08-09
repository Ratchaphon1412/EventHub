<?php

namespace App\Repositories;

use App\Interfaces\KanbanRepositoryInterface;
use App\Models\Kanban;

class KanbanRepository implements KanbanRepositoryInterface
{
     



    public function findById($kanban_id)
    {
        return Kanban::find($kanban_id);
    }


    public function createKanban($event){

        return Kanban::create([
            'name' => $event->title,
            'event_id' => $event->id
        ]);

        
    }


  





}