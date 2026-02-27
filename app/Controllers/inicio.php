<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class inicio extends BaseController
{
    public function index(): string {
    echo "inicio in controller";
        return view('usuario/inicio');
    }
}
