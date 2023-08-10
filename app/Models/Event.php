<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function eventImage(): HasMany
    {
        return $this->hasMany(EventImage::class);
    }

    public function user(): BelongsTo
    {

        return $this->belongsTo(User::class);
    }

    public function team(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    public function kanban(): HasOne
    {
        return $this->hasOne(Kanban::class);
    }


    public function userEventApprove(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_event_approve', 'event_id', 'user_id')->withPivot('status');
    }
}
