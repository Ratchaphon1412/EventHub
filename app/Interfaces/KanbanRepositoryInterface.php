<?php

namespace App\Interfaces;

interface KanbanRepositoryInterface
{
    public function findById($kanban_id);
    public function createKanban($event);
 
}