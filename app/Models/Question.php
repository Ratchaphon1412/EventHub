<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Question extends Model
{
    use HasFactory;

    public function user():BelongsToMany{
        return $this->belongsToMany(User::class);
    }

    public function event():BelongsToMany{
        return $this->belongsToMany(Event::class);
    }

    public function questionAnswer():HasOne{
        return $this->hasOne(QuestionAnswer::class);
    }

    public function questionName():HasMany{
        return $this->hasMany(QuestionName::class);
    }
}
