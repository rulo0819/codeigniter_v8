<?php

namespace App\Controllers;
//use CodeIgniter\Controllers\BaseController; 
use App\Models\LoginModel;
class Login extends BaseController
{
    public function index()
    {
        return view('usuario/inicio');
    }

    public function processLogin()
    {
        $model = new LoginModel(); 

        $usuarioPost = $this->request->getPost('nombre');
        $password = $this->request->getPost('password_usuario');

        $user = $model->where('nombre', $usuarioPost)->first();

        if ($user && $password === $user->password_usuario) {
            session()->set([
                'id'   => $user->id_usuario,
                'nombre'  => $user->nombre_usuario,
                'logged_in' => true
            ]);
            return redirect()->to('lt3/dashboard');
        } else {
            return redirect()->back()->with('error', 'Usuario o contraseña incorrectos');
        }
    }
}