<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        // return in_array($user->role, ['admin', 'user', 'manager', 'superadmin']);
        // return $user->role == 'manager';
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        //
        return in_array(Auth::user()->role, ['manager', 'superadmin']);
        // return in_array($user->role, ['superadmin', 'manager', 'admin', 'user']) || (auth()->check() && $task->user_id == auth()->id());
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return in_array($user->role, ['admin', 'manager']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        //
        // return in_array($user->role, ['manager', 'superadmin']);
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        //
        return in_array(Auth::user()->role, ['manager', 'superadmin']);
        // return $this->update($user, $task);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Task $task): bool
    {
        //
        return in_array($user->role, ['manager', 'superadmin']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Task $task): bool
    {
        //
        return $user->role == 'superadmin';
    }

    // 
    // Determine whether user can accept or decline a task
    // 
    public function acceptTask(){
        return Auth::user()->role === 'user';
    }
}
