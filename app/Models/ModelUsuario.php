<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUsuario extends Model
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombre', 'email', 'password', 'rol_id'];
    // funciones (publicas no privadas ) 
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // funciones (publicas no privadas ) 
    /**
     * create  nuevo usuario
     * @param array $data the user data to insert
     * @return bool true if the user was created successfully, false otherwise
     */
    public function CrearUsuarios(array $data = []):bool {
    if (empty($data) || !is_array($data)) {
        return false;
    }
        return $this->insert($data);
        // return true;
    }
    /**
     * actualizar usuario
     * @param int $id the ID of the user to update
     * @param array $data the user data to update
     * @return bool true if the user was updated successfully, false otherwise
     */
    public function actualizarusuarios(int $id, array $data = []):bool {
        if (empty($data) || $id <= 0 || $this->find($id) === null) {
            return false;
        }

        return $this->update($id, $data);
    }
     
        /**
        * eliminar usuario
        * @param int $id the ID of the user to delete
        * @return bool true if the user was deleted successfully, false otherwise
        */
    public function eliminarusuarios(int $id):bool {
        if ($id <= 0 || $this->find($id) === null) {
            return false;
        }

        return $this->delete($id);
    }

    /**
     * obtener usuario por ID
     * @param int $id the ID of the user to retrieve
     * @return array|null the user data as an associative array, or null if not found
     */
    public function obtenerUsuarios(int $id): object|null{
    $this->select('');
    $this->select('*');
    return $this
            ->select('*')
            ->where ('Id_usuario', $id)
            ->first ();
    
    

        
    }
    /**
     * obtener usuario por constraints     * @param array $constraints the constraints to apply to the query
     * @return array|null the user data as an associative array, or null if not found
     */
    // consulta datos de ususarios simepre y cuando se encutere constraseña y correo electronico 

     public function obtenerUsuariosconstraint(array $constraints = []): object|null{
    if (empty($constraints)) {
        return null;
    }
    
    return $this
            ->select('*')
            ->where ($constraints)
            ->first ();
    

    }


    //protected array $casts = [];
    //protected array $castHandlers = [];
//
    //// Dates
    //protected $useTimestamps = true;
    //protected $dateFormat    = 'datetime';
    //protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';
//
    //// Validation
    //protected $validationRules      = [];
    //protected $validationMessages   = [];
    //protected $skipValidation       = false;
    //protected $cleanValidationRules = true;
//
    //// Callbacks
    //protected $allowCallbacks = true;
    //protected $beforeInsert   = [];
    //protected $afterInsert    = [];
    //protected $beforeUpdate   = [];
    //protected $afterUpdate    = [];
    //protected $beforeFind     = [];
    //protected $afterFind      = [];
    //protected $beforeDelete   = [];
    //protected $afterDelete    = [];
}
