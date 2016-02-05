<?php

namespace App\Policies;

use App\Task;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * La actualización la puede realizar el creador del proyecto
     * o el responsable de la tarea
     *
     * @param User $user
     * @param Task $task
     * @return bool
     */
    public function update(User $user, Task $task)
    {
        $creator = $user->id === (int)$task->project->user_id;
        $responsible = $user->id === (int)$task->responsible_id;

        return $creator or $responsible;
    }

    /**
     * Si el usuario es un admin, entonce se salta la verificacion
     *
     * @param $user
     * @param $ability
     * @return bool
     */
    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }
}
