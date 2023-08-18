<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
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
    protected $fillable = [
        'title', 'description', 'category_id', 'image_poster', 'date_post', 'registration_start_date',
        'registration_end_date', 'announcement_date', 'event_start_date', 'event_end_date',
        'event_latitude', 'event_longitude', 'document_payment', 'user_id'
    ];


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
<<<<<<< HEAD
=======
    public function question():BelongsToMany
    {
        return $this->belongsToMany(Question::class);
    }
>>>>>>> 3f7c3bcb61640c9adf02869bbc88069fba4dd91e

    public function userEventApprove(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_event_approve', 'event_id', 'user_id')->withPivot('status');
    }

<<<<<<< HEAD
    public function userTeam(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'Team_Event','event_id', 'user_id');
=======
    public function getApplicants(): Collection{
        return Question::getUsersByEvent($this);
>>>>>>> 3f7c3bcb61640c9adf02869bbc88069fba4dd91e
    }
}
