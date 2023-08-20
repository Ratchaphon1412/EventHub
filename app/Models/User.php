<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Question;

use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'gender',
        'age',
        'facebook',
        'instagram',
        'line',
        'first_name',
        'last_name',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function eventOwner(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function teamJoined(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    public function questionAnswer(): HasMany
    {
        return $this->hasMany(QuestionAnswer::class);
    }
    public function kanbanCards(): HasMany
    {
        return $this->hasMany(KanbanCard::class);
    }
    public function approveEvents(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'user_event_approve', 'user_id', 'event_id')->withPivot('status');
    }

    public function joinedTeam(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'Team_Event', 'user_id', 'event_id');
    }

    public function getSubmitEvents()
    { //get all event that this user submit answer
        return Question::where('user_id', $this->id)->select('event_id')->distinct()->get();
    }

    public function getImageUrlFromPath()
    {
        return url('storage/' . $this->profile_photo_path);
    }

    public function answerQuestionEvent()
    {
        return $this->belongsToMany(Event::class, 'questions', 'user_id', 'event_id');
    }

    public function getContacts(): String
    {
        $contact = '';
        $count = 0;
        if ($this->phone != null) {
            $contact = "phone : " . $this->phone;
            $count++;
        }
        if ($this->facebook != null) {
            $contact = $contact . "\nfacebook : " . $this->facebook;
            $count++;
        }
        if ($this->instagram != null and $count < 2) {
            $contact = "\ninstagram : " . $this->instagram;
            $count++;
        }
        if ($this->line != null and $count < 2) {
            $contact = "\nline : " . $this->line;
        }
        return $contact;
    }
}
