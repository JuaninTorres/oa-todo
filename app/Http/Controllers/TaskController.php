<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Task;
use App\Project;
use App\User;
use Laracasts\Flash\Flash;

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

        $task->update($request->all());

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
            //TODO: Esto se podría mejorar arrojando una excepcion que sea mas buena onda que un abort
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
        $this->checkUnfinish($task);

        $task->update(['finished' => true]);

        Flash::success('Esta tarea se ha finalizado');

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

    public function store(TaskRequest $request, Project $project)
    {
        $inputs = $request->only(['name', 'description', 'responsible_id']);
        $project->tasks()->create($inputs);
        Flash::success('Se ha creado una nueva tarea');

        return redirect()->route('Projects::show_path', [$project->id]);
    }

    public function index()
    {
        return view('tasks.own');
    }
}
