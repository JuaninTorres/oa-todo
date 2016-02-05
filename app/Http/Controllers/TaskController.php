<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use App\Project;
use App\Events\TaskWasAssigned;
use App\Events\TaskWasFinished;
use App\Http\Requests\TaskRequest;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{

    /**
     * Despliegue de una tarea
     *
     * @param Project $project
     * @param Task $task
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Project $project, Task $task)
    {
        $users = User::all()->sortBy('name')->pluck('name', 'id')->toArray();

        return view('tasks.show', compact('project', 'task', 'users'));
    }

    /**
     * Formulario de edición de una Tarea
     *
     * @param Project $project
     * @param Task $task
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Project $project, Task $task)
    {
        $this->authorize('update', $task);

        $this->checkUnfinish($task);
        $users = User::all()->sortBy('name')->pluck('name', 'id')->toArray();

        return view('tasks.edit', compact('project', 'task', 'users'));
    }

    /**
     * Actualización de la tarea
     *
     * @param TaskRequest $request
     * @param Project $project
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TaskRequest $request, Project $project, Task $task)
    {
        $this->authorize($task);
        $oldResponsible = $task->responsible;
        $task->update($request->all());

        $this->notifyToNewResponsible($request, $task, $oldResponsible);

        Flash::success('La tarea se ha actualizado de manera correcta');

        return redirect()->route('Projects::Tasks::show_path', [$project->id, $task->id]);
    }

    /**
     * Chequeo si se trata de finalizar una tarea que ya lo esté
     *
     * @param Task $task
     */
    private function checkUnfinish(Task $task)
    {
        if($task->finished)
        {
            abort(403);
        }
    }

    /**
     * Finalización de una tarea
     *
     * @param Request $request
     * @param Project $project
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function finish(Request $request, Project $project, Task $task)
    {
        $this->authorize('update', $task);

        $this->checkUnfinish($task);
        $task->update(['finished' => true]);
        Flash::success('Esta tarea se ha finalizado');
        event(new TaskWasFinished($task, $this->user));

        return redirect()->back();
    }

    /**
     * Formulario de creación de una nueva tarea
     *
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Project $project)
    {
        $users = User::all()->sortBy('name')->pluck('name', 'id')->toArray();

        return view('tasks.create', compact('project','users'));
    }

    /**
     * Creación de una tarea
     *
     * @param TaskRequest $request
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TaskRequest $request, Project $project)
    {
        $inputs = $request->only(['name', 'description', 'responsible_id']);
        $task = $project->tasks()->create($inputs);
        Flash::success('Se ha creado una nueva tarea');
        event(new TaskWasAssigned($task, $this->user));
        Log::info("Tarea Creada", ['task' => $task->name, 'responsible' => $task->responsible->name]);

        return redirect()->route('Projects::show_path', [$project->id]);
    }

    /**
     * Listado con las tareas que el usuario debe realizar
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('tasks.own');
    }

    /**
     * Se dispara el evento de que la tarea se ha asignado cuando haya un cambio de responsable
     *
     * @param TaskRequest $request
     * @param Task $task
     * @param User $oldResponsible
     */
    private function notifyToNewResponsible(TaskRequest $request, Task $task, User $oldResponsible)
    {
        if ($oldResponsible->id != $request->input('responsible_id'))
        {
            event(new TaskWasAssigned($task, $this->user));
            Log::info("Tarea Actualizada", ['task' => $task->name, 'responsible' => $task->responsible->name]);
        }
    }
}
