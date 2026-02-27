<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        
        return view('login');
    }

    public function processLogin()
    {

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
       
        // test@test.com / password123
        if ($email === 'test@test.com' && $password === 'password123') {
            // Establecer sesión
            $sessionData = [
                'user_id' => 1,
                'email' => $email,
                'name' => 'Usuario Prueba',
                'logged_in' => true
            ];
            session()->set($sessionData);
            
            return redirect()->to('/')->with('success', '¡Bienvenido!');
        } else {
            return redirect()->back()
                ->with('error', 'Email o contraseña incorrectos')
                ->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Sesión cerrada correctamente');
    }
}
