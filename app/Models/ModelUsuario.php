<?php

namespace App\Models;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Model;

class ModelUsuario extends Model
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id_usuario';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'estatus_usuario',
        'nombre',
        'ap_paterno_usuario',
        'am_materno_usuario',
        'sexo_usuario',
        'correo_usuario',
        'password_usuario',
        'imagen_usuario',
        'id_rol',
    ];
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    public function CrearUsuarios(array $data = []): bool
    {
        if ($data === [] || ! is_array($data)) {
            return false;
        }

        return (bool) $this->insert($data);
    }

    public function actualizarusuarios(int $id, array $data = []): bool
    {
        if ($data === [] || $id <= 0 || $this->find($id) === null) {
            return false;
        }

        return $this->update($id, $data);
    }

    public function eliminarusuarios(int $id): bool
    {
        if ($id <= 0 || $this->find($id) === null) {
            return false;
        }

        return $this->delete($id);
    }

    public function obtenerUsuarios(int $id): object|null
    {
        return $this
            ->select('*')
            ->where('id_usuario', $id)
            ->first();
    }

    public function obtenerUsuariosconstraint(array $constraints = []): object|null
    {
        if ($constraints === []) {
            return null;
        }

        return $this
            ->select('*')
            ->where($constraints)
            ->first();
    }

    public function validarUsuario(string $correo, string $password): object|null
    {
        if ($correo === '' || $password === '') {
            return null;
        }

        $escapedPassword = $this->db->escape($password);

        return $this->select([
                'usuarios.id_usuario',
                'usuarios.nombre',
                'usuarios.ap_paterno_usuario',
                'usuarios.am_materno_usuario',
                'usuarios.imagen_usuario',
                'usuarios.estatus_usuario',
                "CONCAT_WS(' ', usuarios.nombre, usuarios.ap_paterno_usuario, usuarios.am_materno_usuario) AS nombre_completo",
                'usuarios.sexo_usuario',
                'usuarios.correo_usuario',
                'usuarios.id_rol',
                'roles.rol',
            ])
            ->join('roles', 'roles.id_rol = usuarios.id_rol')
            ->where('usuarios.correo_usuario', $correo)
            ->where(new RawSql("usuarios.password_usuario = SHA2({$escapedPassword}, 256)"))
            ->first();
    }
}
