<?php
namespace App\Controllers;
use App\Controllers\BaseController;

class InicioController extends BaseController
{
    public function index()
    {
        if(!session()->has('usuario')){
            return redirect()->to(base_url('login'));
        }

        return view('sistema/inicio');
    }
}