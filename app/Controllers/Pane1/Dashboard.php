<?php

namespace App\Controllers\Pane1;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    private string $view = 'pane1/dashboard';

    public function __construct()
    {
        helper(['array', 'panel']); 
    }

    private function cargardatos(): array
    {
        $datos = [];

        $datos['nombre_pagina'] = 'Dashboard';
        $datos['titulo']        = 'Dashboard AdminLTE 33';

        // breadcrumb
        $breadcrum = [
            [
                'href'   => route_to('admin.dashboard'),
                'titulo' => 'Dashboard lt3',
            ],
            [
                'href'   => '#',
                'titulo' => 'Dashboard vista',
            ],
        ];

        $datos['breadcrumb_panel'] = breadcrumb_panel($datos['titulo'], $breadcrum);
        $menu ['menu_lateral'] = crear_menu_lateral();
        $datos['menu_lateral'] = $menu['menu_lateral'];
        return $datos;
    }

    public function index(): string
    {
        return view($this->view, $this->cargardatos());
    }
}
