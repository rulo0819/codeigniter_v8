<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\ModelUsuario;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Session\Session;

class Login extends BaseController
{
    private Session $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index(): string|RedirectResponse
    {
        return view('usuario/inicio');
    }

    public function inicioSesion(): string|RedirectResponse
    {
        return $this->index();
    }

    public function processLogin(): RedirectResponse
    {
        $email = (string) $this->request->getPost('email');
        $password = (string) $this->request->getPost('password');

        if ($email === '' || $password === '') {
            return redirect()->back()->withInput()->with('error', 'Usuario o contraseña incorrectos');
        }

        $model = new LoginModel();
        $user = $model->where('correo_usuario', $email)->first();

        if ($user !== null && hash('sha256', $password) === (string) $user['password_usuario']) {
            $this->session->set([
                'id_usuario' => $user['id_usuario'] ?? null,
                'nombre' => $user['nombre'] ?? '',
                'correo_usuario' => $user['correo_usuario'] ?? $email,
                'logged_in' => true,
                'is_logged' => true,
            ]);
            return redirect()->to('/lt3/dashboard');
        }

        $this->session->remove(['id_usuario', 'nombre', 'correo_usuario', 'logged_in', 'is_logged']);

        return redirect()->back()->withInput()->with('error', 'Correo o contraseña incorrectos');
    }

    public function verificarSesion(): RedirectResponse
    {
        $mail = (string) $this->request->getPost('email');
        $password = (string) $this->request->getPost('password');

        if ($mail !== '' && $password !== '') {
            $modelUsuario = new ModelUsuario();
            $data = $modelUsuario->validarUsuario($mail, $password);

            if ($data !== null) {
                $arraysesion = [
                    'id_usuario' => $data->id_usuario,
                    'status' => $data->estatus_usuario,
                    'nombre' => $data->nombre,
                    'full_name' => trim($data->nombre . ' ' . $data->ap_paterno_usuario . ' ' . $data->am_materno_usuario),
                    'sexo' => $data->sexo_usuario,
                    'email' => $data->correo_usuario,
                    'correo_usuario' => $data->correo_usuario,
                    'profile_img' => $data->imagen_usuario,
                    'current_task' => 0,
                    'current_role' => [
                        'key' => $data->id_rol,
                        'name' => $data->rol,
                    ],
                    'logged_failure' => false,
                    'logged_in' => true,
                    'is_logged' => true,
                ];

                $this->session->set($arraysesion);

                return redirect()->to('/lt3/dashboard')->with('message', 'bienvenido');
            }

            $this->session->set('logged_failure', true);

            return redirect()->back()->withInput()->with('message', 'Usuario no encontrado');
        }

        return redirect()->back()->withInput()->with('message', 'Email y password son requeridos');
    }

}
