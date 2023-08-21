<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\Kanban;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class KanBanPolicy
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
    public function view(User $user, Kanban $kanban): bool
    {
        if ($kanban->event->user_id == $user->id) { // Owner
            return true;
        }
        foreach ($kanban->event->userTeam as $userTeam) {
            if ($userTeam->id == $user->id) {
                return true;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Kanban $kanban): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Kanban $kanban): bool
    {
        return $this->view($user, $kanban);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Kanban $kanban): bool
    {
        return $this->view($user, $kanban);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Kanban $kanban): bool
    {
        return $this->view($user, $kanban);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Kanban $kanban): bool
    {
        return $this->view($user, $kanban);
    }
}
