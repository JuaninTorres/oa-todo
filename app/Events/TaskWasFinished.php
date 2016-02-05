<?php

namespace App\Events;

use App\Events\Event;
use App\Task;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TaskWasFinished extends Event implements ShouldBroadcast
{
    use SerializesModels;
    /**
     * @var Task
     */
    public $task;
    /**
     * @var User
     */
    public $finisher;

    /**
     * Create a new event instance.
     *
     * @param Task $task
     * @param User $finisher
     */
    public function __construct(Task $task, User $finisher)
    {
        $this->task = $task;
        $this->finisher = $finisher;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['user.' . $this->task->project->user->uuid];
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
                'responsible' => $this->task->responsible->name,
                'url' => route('Projects::Tasks::show_path', [$this->task->project->id, $this->task->id])
            ],
            'project' => [
                'name' => $this->task->project->name,
                'url' => route('Projects::show_path', [$this->task->project->id]),
                'progress' => $this->task->project->progress
            ]
        ];
    }
}
