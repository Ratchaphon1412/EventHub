<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class KanbanCard extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['title','description','kanban_column_id'];
    
    public function kanbanColumn():BelongsTo
    {
        return $this->belongsTo(KanbanColumn::class);
    }
}
