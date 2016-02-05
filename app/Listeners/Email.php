<?php

namespace App\Listeners;

use App\Events\TaskWasAssigned;
use App\Events\TaskWasFinished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class Email implements ShouldQueue
{

    public function taskWasAssigned(TaskWasAssigned $event)
    {
        $task = $event->task;
        $user = $task->responsible;
        $assigner = $event->assigner;

        Log::info('Responsible', ['id' => $user->id]);
        Log::info('Assigner', ['id' => $assigner->id]);

        if($user->id != $assigner->id)
        {
            $subject = '[OA-TODO] Se te ha asignado la tarea: ' . $task->name;
            //SEND EMAIL
            Mail::send('emails.task.assigned', compact('user', 'assigner', 'task', 'subject'),
                function ($m) use ($user, $subject)
                {
                    $m->to($user->email, $user->name)
                        ->subject($subject);
                });

            Log::info("Correo enviado", ['subject' => $subject, 'usuario' => $user->name, 'email' => $user->email]);
        }
    }

    public function taskWasFinished(TaskWasFinished $event)
    {
        $task = $event->task;
        $user = $task->project->user;
        $finisher = $event->finisher;

        if($user->id != $finisher->id)
        {
            $subject = '[OA-TODO] Tarea finalizada: ' . $task->name;
            //SEND EMAIL
            Mail::send('emails.task.finished', compact('user', 'finisher', 'task', 'subject'),
                function ($m) use ($user, $subject)
                {
                    $m->to($user->email, $user->name)
                        ->subject($subject);
                });

            Log::info("Correo enviado", ['subject' => $subject, 'usuario' => $user->name, 'email' => $user->email]);
        }
    }
}
