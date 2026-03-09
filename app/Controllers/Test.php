<?php

namespace App\Controllers;

use CodeIgniter\Database\Exceptions\DatabaseException;
use Config\Database;

class Test extends BaseController
{
    public function index()
    {
    }

    public function testconnect()
    {
        $db = Database::connect();

        try {
            $db->initialize();

            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Conexion a la base de datos exitosa',
            ]);
        } catch (DatabaseException $e) {
            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'status'  => 'error',
                    'message' => 'Error de conexion: ' . $e->getMessage(),
                ]);
        }
    }
}
