<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function eventImage():HasMany
    {
        return $this->hasMany(EventImage::class);
    }

    public function user():BelongsTo
    {

        return $this->belongsTo(User::class);
    }

    public function team():HasMany
    {
        return $this->hasMany(Team::class);
    }

    public function kanban():HasOne
    {
        return $this->hasOne(Kanban::class);
    }
    public function question():BelongsToMany
    {
        return $this->belongsToMany(Question::class);
    }






}
