<?php

namespace App\Listeners;

use App\Events\TaskWasAssigned;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class Email implements ShouldQueue
{

    public function taskWasAssigned(TaskWasAssigned $event)
    {
        $task = $event->getTask();
        $user = $task->responsible;

        if($user->id != Auth::user()->id)
        {
            $subject = '[OA-TODO] Se te ha asignado la tarea: ' . $task->name;
            //SEND EMAIL
            Mail::send('emails.task.assigned', compact('user', 'task', 'subject'),
                function ($m) use ($user, $task, $subject)
                {
                    $m->to($user->email, $user->name)
                        ->subject($subject);
                });

            Log::info("Correo enviado", ['subject' => $subject, 'usuario' => $user->name, 'email' => $user->email]);
        }
    }
}
