<?php

    namespace App\Repositories;

    use App\Interfaces\KanbanColumnsRepositoryInterface;
    use App\Models\KanbanColumn;

    class KanbanColumnRepository implements KanbanColumnsRepositoryInterface
    {

        public function findByName($column_name){
            return KanbanColumn::where('name',$column_name)->first();

        }
        public function createKanbanColumn($kanban,$column_name){
          return KanbanColumn::create([
                'name' => $column_name,
                'kanban_id' => $kanban->id
            ]);
            

        }


    }

