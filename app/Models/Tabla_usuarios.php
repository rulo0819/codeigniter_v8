<?php

namespace App\Models;

use CodeIgniter\Model;

class Tabla_usuarios extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $returnType = 'object';
    protected $allowedFields = [
        'estatus_usuario',
        'id_usuario',
        'nombre',
        'ap_paterno_usuario',
        'am_materno_usuario',
        'sexo_usuario',
        'correo_usuario',
        'password_usuario',
        'imagen_usuario',
        'id_rol'
    ];

    // ==================================
    //  Consultas básicas
    // ==================================
    public function create_data(array $data = [])
    {
        if (empty($data)) {
            return false;
        }

        return $this->table($this->table)->insert($data);
    }

    public function get_user(array $data = [])
    {
        return $this->table($this->table)
            ->where($data)
            ->get()
            ->getRow();
    }

    public function get_table(array $data = [])
    {
        return $this->table($this->table)
            ->get()
            ->getResult();
    }

    public function update_data(int $id = 0, array $data = [])
    {
        if (empty($data)) {
            return false;
        }

        return $this->table($this->table)
            ->where([$this->primaryKey => $id])
            ->set($data)
            ->update();
    }

    /**
     * Valida credenciales de usuario contra la tabla y roles.
     */
    public function validacion(string $email, string $pass): ?object
    {
        if (empty($email) || empty($pass)) {
            return null;
        }

        return $this->select([
                'usuarios.id_usuario',
                "CONCAT(nombre, ' ', ap_paterno_usuario, ' ', COALESCE(am_materno_usuario, '')) AS nombre",
                'usuarios.estatus_usuario',
                'usuarios.sexo_usuario',
                'usuarios.correo_usuario',
                'roles.id_rol',
                'roles.rol',
                'usuarios.password_usuario'
            ])
            ->join('roles', 'usuarios.id_rol = roles.id_rol')
            ->where('correo_usuario', $email)
            ->where('password_usuario', $pass)
            ->first();
    }
}
