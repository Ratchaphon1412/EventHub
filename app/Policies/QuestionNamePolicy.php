<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\QuestionName;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class QuestionNamePolicy
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
     */
    public function view(User $user, QuestionName $questionName): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Event $event): bool
    {
        return $event->user_id === $user->id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, QuestionName $questionName): bool
    {
        if ($questionName->event->last()->user_id == $user->id) { // Owner
            return true;
        }

        foreach ($questionName->event->last()->userTeam as $teamUser) { // Team
            if ($teamUser->id == $user->id) {
                return true;
            }
        }
        return false;
//        if ($user->eventOwner->count() == 0) {
//            return false;
//        }
//
//        foreach ($user->eventOwner as $event) {
//            foreach ($event->questionName as $qName) {
//                if ($qName->id == $questionName->id) {
//                    return true;
//                }
//            }
//        }
//        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, QuestionName $questionName): bool
    {
        return $this->update($user, $questionName);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, QuestionName $questionName): bool
    {
        return $this->update($user, $questionName);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, QuestionName $questionName): bool
    {
        return $this->update($user, $questionName);
    }
}
