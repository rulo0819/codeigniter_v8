<?php

namespace App\Controllers\Pane1;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    private string $view = 'pane1/dashboard';

    public function __construct()
    {
        helper('array'); // carga app/Helpers/array_helper.php
    }

    private function cargardatos(): array
    {
        $datos = [];

        $datos['nombre_pagina'] = 'Dashboard';
        $datos['titulo']        = 'Dashboard AdminLTE 3';

        // breadcrumb
        $breadcrum = [
            [
                'href'   => route_to('dashboard'),
                'titulo' => 'Dashboard lt3',
            ],
            [
                'href'   => '#',
                'titulo' => 'Dashboard vista',
            ],
        ];

        $datos['breadcrumb_panel'] = breadcrumb_panel($datos['titulo'], $breadcrum);

        return $datos;
    }

    public function index(): string
    {
        return view($this->view, $this->cargardatos());
    }
}