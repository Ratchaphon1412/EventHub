<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\QuestionAnswer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class QuestionAnswerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */                     // Auth
    public function view(User $user, Event $event): bool
    {
        if ($user->id == $event->user_id) { // Owner Event
            return true;
        }

        foreach ($event->userTeam as $team) { // Team
            if ($team->id == $user->id) {
                return true;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): bool
    {
        return false;
    }
}
