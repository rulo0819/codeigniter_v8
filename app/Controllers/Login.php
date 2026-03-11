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

        $email = (string) $this->request->getPost('email');
        $password = (string) $this->request->getPost('password');

        $user = $model->where('correo_usuario', $email)->first();

        $passwordHash = hash('sha256', $password);

        if ($user && $passwordHash === $user['password_usuario']) {
            session()->set([
                'id_usuario' => $user['id_usuario'],
                'nombre'  => $user['nombre'],
                'correo_usuario' => $user['correo_usuario'],
                'logged_in' => true
            ]);
            return redirect()->to('/lt3/dashboard');
        } else {
            return redirect()->back()->with('error', 'Usuario o contraseña incorrectos');
        }
    }
}

//postman 
