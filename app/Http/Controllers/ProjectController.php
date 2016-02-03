<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Project;
use App\Http\Requests;
use Illuminate\Support\Facades\Gate;
use Laracasts\Flash\Flash;

class ProjectController extends Controller
{

    /**
     * Listado de los proyectos del usuario
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('projects.own');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }


    /**
     * Actualización del proyecto
     *
     * @param ProjectRequest $request
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $this->authorize($project);
        $project->update($request->all());
        Flash::success('El proyecto se ha actualizado de manera correcta');

        return redirect()->back();
    }

    /**
     * Formulario de creacion de un nuevo proyecto
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Creación de un nuevo proyecto
     *
     * @param ProjectRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProjectRequest $request)
    {
        $inputs = $request->only(['name', 'description']);
        $this->user->projects()->create($inputs);
        Flash::success('Se ha creado este nuevo proyecto');

        return redirect()->route('Projects::list_path');
    }
}