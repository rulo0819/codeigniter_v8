<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        // Si ya está autenticado, redirigir al dashboard
        if (session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        
        return view('auth/login');
    }

    public function login()
    {
        $session = session();
        $userModel = new UserModel();
        
        // Validación
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ]);
        
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        // Buscar usuario
        $user = $userModel->where('email', $email)->first();
        
        if ($user) {
            // Verificar password
            if (password_verify($password, $user['password'])) {
                // Establecer sesión
                $sessionData = [
                    'user_id' => $user['id'],
                    'email' => $user['email'],
                    'name' => $user['name'],
                    'logged_in' => true
                ];
                $session->set($sessionData);
                
                return redirect()->to('/login')->with('success', 'Welcome back!');
            } else {
                return redirect()->back()->with('error', 'Invalid password');
            }
        } else {
            return redirect()->back()->with('error', 'Email not found');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Logged out successfully');
    }
}   