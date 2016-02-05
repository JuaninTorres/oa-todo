<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class ProfileController extends Controller
{

    /**
     * Formulario de edición de perfil
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit', ['user' => $this->user]);
    }

    /**
     * Actualización del perfil
     *
     * @param ProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        $this->user->update($request->all());

        Flash::success('Su perfil se ha actualizado');

        return redirect()->back();
    }
}
