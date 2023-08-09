<?php

namespace App\Interfaces;

interface KanbanColumnsRepositoryInterface
{
    public function findByName($column_name);
    public function createKanbanColumn($kanban,$column_name);
    



}