<?php
declare(strict_types=1);

if (!function_exists('configurar_menu')) {
    /*FUNCION PARA CONFIGURAR EL MENU LATERAL PHP 8*/
    function configurar_menu(): array
    {
        $menu = [];
        $menu['dashboard'] = [
            'is_active' => false,
            'href' => route_to('admin.dashboard'),
            'text' => 'Dashboard',
            'icon' => '',
            'submenu' => []
        ];

        $menu['opcion_b'] = [
            'is_active' => false,
            'href' => '#',
            'text' => 'Opcion A',
            'icon' => '',
            'submenu' => [
                'opcion_b1' => [
                    'is_active' => false,
                    'href' => route_to('admin.dashboard'),
                    'text' => 'Opcion 1',
                    'icon' => '',
                ],
                'opcion_b2' => [
                    'is_active' => false,
                    'href' => route_to('admin.dashboard'),
                    'text' => 'Opcion 2',
                    'icon' => ''
                ]
            ]
        ];

        return $menu;
    }
}

if (!function_exists('crear_menu_lateral')) {
    function crear_menu_lateral(): string
    {
        $menu = configurar_menu();
        $html = '';

        $html .= '<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-header">MENU PRINCIPAL</li>';
        foreach ($menu as $opcion) {
            if ($opcion['href'] != '#') {
                $html .= '
                <li class="nav-item">
                    <a href="' . $opcion['href'] . '" class="nav-link ' . (($opcion['is_active'] == true) ? 'active' : '') . '">
                        <i class="' . $opcion['icon'] . ' nav-icon"></i>
                        <p>' . $opcion['text'] . '</p>
                    </a>
                </li>
            ';
            } else {
                $html .= '
            <li class="nav-item">
                <a href="#" class="nav-link ' . (($opcion['is_active'] == true) ? 'active' : '') . '">
                    <i class="' . $opcion['icon'] . ' nav-icon"></i>
                    <p>
                        ' . $opcion['text'] . '
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>';
                if (sizeof($opcion['submenu']) > 0) {
                    $html .= '<ul class="nav nav-treeview">';
                    foreach ($opcion['submenu'] as $sub_opcion_menu) {
                        $html .= '
                            <li class="nav-item">
                                <a href="' . $sub_opcion_menu['href'] . '" class="nav-link ' . (($sub_opcion_menu['is_active'] == true) ? 'active' : '') . '">
                                    <i class="' . $sub_opcion_menu['icon'] . ' nav-icon"></i>
                                    <p>' . $sub_opcion_menu['text'] . '</p>
                                </a>
                            </li>
                        ';
                    }
                    $html .= '</ul>';
                }
                $html .= '</li>
            ';
            }
        }
        $html .= '</ul>';

        return $html;
    }
}
