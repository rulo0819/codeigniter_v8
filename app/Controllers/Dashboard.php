<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Session\Session;

class Dashboard extends BaseController
{
    private string $view = 'dashboard';
    private Session $session;

    public function __construct()
    {
        helper(['array', 'panel']);
        $this->session = \Config\Services::session();
    }

    private function cargardatos(): array
    {
        $datos = [];

        $datos['nombre_pagina'] = 'Dashboard';
        $datos['titulo'] = 'Dashboard';
        $datos['hearder_page'] = [
            'titulo' => $datos['nombre_pagina'],
            'breadcrumb' => [],
        ];

        $breadcrum = [
            [
                'href' => route_to('admin.dashboard'),
                'titulo' => 'Dashboard',
            ],
        ];

        $datos['breadcrumb_panel'] = breadcrumb_panel($datos['titulo'], $breadcrum);
        $datos['menu_lateral'] = crear_menu_lateral();

        return $datos;
    }

    public function index(): string|RedirectResponse
    {
        if ($this->session->get('is_logged') === null) {
            return redirect()->to('/login')->with('error', 'Please login first');
        }

        return view($this->view, $this->cargardatos());
    }
}
