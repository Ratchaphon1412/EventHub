<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_name_id', 'event_id', 'user_id', 'question_answer_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function event(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }

    public function questionAnswer(): HasOne
    {
        return $this->hasOne(QuestionAnswer::class);
    }

    public function questionName(): BelongsTo
    {
        return $this->belongsTo(QuestionName::class);
    }

    public static function getUsersIdByEvent(Event $event): Collection
    {
        return Question::where('event_id', $event->id)->where('user_id', '!=', null)->distinct()->get('user_id');
    }

    public static function getUsersByEvent(Event $event)
    {
        return User::find(Question::getUsersIdByEvent($event));
    }

    public static function getQuestionsNameByEvent(Event $event)
    { //return collection of question with question name
        return Question::where('event_id', 2)->where('question_answer_id', null)->with('questionName')->get();
    }
}
