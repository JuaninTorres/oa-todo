<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Variable usuario que dejo disponible en todos los controladores
     *
     * @var
     */
    protected $user;

    /**
     * Creación de la instancia del controlador
     */
    public function __construct()
    {
        $this->user = Auth::user();
    }
}
