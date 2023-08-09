<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class KanbanColumn extends Model
{
    use HasFactory,SoftDeletes;

    public function kanban():BelongsTo
    {
        return $this->belongsTo(Kanban::class);
    }

    public function cards():HasMany
    {
        return $this->hasMany(KanbanCard::class);
    }

 
}
