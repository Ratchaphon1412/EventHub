<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Kanban extends Model
{
    use HasFactory,SoftDeletes;

    public function columns():HasMany
    {
        return $this->hasMany(KanbanColumn::class);
    }
}
