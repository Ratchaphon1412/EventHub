<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionName extends Model
{
    use HasFactory, SoftDeletes;
    public function question(): HasMany{
        return $this->hasMany(Question::class);
    }
    public function event(): BelongsToMany{
        return $this->belongsToMany(Event::class);
    }

    public function questionAnswer(): HasMany{
        return $this->hasMany(QuestionName::class);
    }
}