<?php

namespace App\Events;

use App\Task;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TaskWasAssigned extends Event implements ShouldBroadcast
{
    use SerializesModels;


    /**
     * @var Task
     */
    public $task;
    /**
     * @var User
     */
    public $assigner;

    /**
     * Se crea una nueva instancia del evento
     *
     * @param Task $task
     * @param User $assigner
     */
    public function __construct(Task $task, User $assigner)
    {
        $this->task = $task;
        $this->assigner = $assigner;
    }


    /**
     * Data que se entregará para el breadcast
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'task' => [
                'name' => $this->task->name,
                'url' => route('Projects::Tasks::show_path', [$this->task->project->id, $this->task->id])
            ],
            'project' => [
                'name' => $this->task->project->name,
                'owner' => $this->task->project->user->name,
                'url' => route('Projects::show_path', [$this->task->project->id])
            ]
        ];
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['user.' . $this->task->responsible->uuid];
    }

    /**
     * @return Task
     */
    public function getTask()
    {
        return $this->task;
    }
}
