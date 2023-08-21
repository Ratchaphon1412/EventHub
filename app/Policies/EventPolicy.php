<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EventPolicy
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
    public function view(User $user, Event $event): bool
    {
        return true;
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
    public function update(User $user, Event $event): bool
    {
        return $event->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Event $event): bool
    {
        return $this->update($user, $event);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Event $event): bool
    {
        return $this->update($user, $event);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Event $event): bool
    {
        return $this->update($user, $event);
    }

    public function manageEvent(User $user, Event $event)
    {

        if ($event->user_id === $user->id) {
            return true;
        }

        return false;
    }


    public function manageEventTeam(User $user, Event $event)
    {
        if ($event->user_id === $user->id or $event->userTeam()->where('user_id', $user->id)->count() > 0) {
            return true;
        }

        return false;
    }

    public function manageEventApprove(User $user, Event $event)
    {
        if ($event->user_id === $user->id or $event->userEventApprove()->where('user_id', $user->id)->count() > 0) {
            return true;
        }

        return false;
    }

    public function kanban(User $user, Event $event)
    {
        if ($event->user_id === $user->id or $event->userTeam()->where('user_id', $user->id)->count() > 0) {
            return true;
        }

        return false;
    }

    public function question(User $user, Event $event)
    {
        if ($event->user_id === $user->id or $event->userTeam()->where('user_id', $user->id)->count() > 0) {
            return true;
        }

        return false;
    }
}
