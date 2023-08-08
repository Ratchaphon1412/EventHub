<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionAnswer extends Model
{
    use HasFactory, SoftDeletes;

    public function question(): HasOne{
        return $this->hasOne(Question::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
