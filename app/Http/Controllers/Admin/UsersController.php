<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class UsersController extends Controller
{

    /**
     * Listado de todos los usuarios
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::all()->sortBy('name');

        return view('admin.users.index', compact('users'));
    }

    /**
     * Detalles de un usuario
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Actualización de un usuario
     *
     * @param UserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        Flash::success('La información se ha actualizado de forma exitosa');

        return redirect()->back();
    }

    /**
     * Formulario de creación de usuarios
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Creación de un nuevo usuario
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->all());
        Flash::success('Se ha creado el usuario ' . $user->name);

        return redirect()->route('Admin::Users::list_path');
    }
}
