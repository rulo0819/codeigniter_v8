<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $returnType = 'array';
    protected $allowedFields = ['nombre', 'correo_usuario', 'password_usuario', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];
    
    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password_usuario'])) {
            $data['data']['password_usuario'] = hash('sha256', (string) $data['data']['password_usuario']);
        } elseif (isset($data['data']['password'])) {
            $data['data']['password'] = hash('sha256', (string) $data['data']['password']);
        }
        return $data;
    }
}


//namespace App\Controllers;
////use CodeIgniter\Controllers\BaseController; 
//use App\Models\LoginModel;
//class Login extends BaseController
//{
//    public function index()
//    {
//        return view('usuario/inicio');
//    }
//
//    public function processLogin()
//    {
//        $model = new LoginModel(); 
//
//        $usuarioPost = $this->request->getPost('nombre');
//        $password = $this->request->getPost('password_usuario');
//
//        $user = $model->where('nombre', $usuarioPost)->first();
//
//        if ($user && $password === $user->password_usuario) {
//            session()->set([
//                'id'   => $user->id_usuario,
//                'nombre'  => $user->nombre_usuario,
//                'logged_in' => true
//            ]);
//            return redirect()->to('lt3/dashboard');
//        } else {
//            return redirect()->back()->with('error', 'Usuario o contraseña incorrectos');
//        }
//    }
//}
//
