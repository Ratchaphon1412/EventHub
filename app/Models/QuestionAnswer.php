<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionAnswer extends Model
{
    use HasFactory, SoftDeletes;

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function questionName(): BelongsTo{
        return $this->belongsTo(QuestionName::class);
    }

    public function getFileUrl() {
        return url('storage/' . $this->image_path);
    }
}
