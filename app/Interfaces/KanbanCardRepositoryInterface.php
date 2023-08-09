<?php

namespace App\Interfaces;

interface KanbanCardRepositoryInterface
{
    public function createCard($column,$card_title,$card_description,$user);
    public function findById($card_id);
    public function editCard($card_title,$card_description,$card);
    public function updateColumn($card,$column);
    public function deleteCard($card_id);

}