<?php

namespace App\Repositories;

use App\Interfaces\KanbanCardRepositoryInterface;
use App\Models\KanbanCard;


class  KanbanCardRepository implements KanbanCardRepositoryInterface
{


    public function createCard($column,$card_title,$card_description,$user)
    {
      return KanbanCard::create([
            'title' => $card_title,
            'description' => $card_description,
            'kanban_column_id' => $column->id,
            'user_id' => $user->id,
        ]);
    }
    public function findById($card_id)
    {
        return KanbanCard::find($card_id);
    }
    public function editCard($card_title,$card_description,$card)
    {
        return KanbanCard::where('id',$card->id)->update([
            'title' => $card_title,
            'description' => $card_description
        ]);
    
    }
    
    public function updateColumn($card,$column){
        return $card->update([
            "kanban_column_id" => $column->id
        ]);

    }
    public function deleteCard($card_id){
        return KanbanCard::where('id',$card_id)->delete();

    }



}