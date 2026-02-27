<?php 
/**
 * declaracion de helper
 *function namefunticion(arguments){
 // statement
 retunr 0;
 //end namefunction
 }
 */

 /* 
if (!function_exists('array_to_string')) {
    /**
     * Convierte un arreglo en un string separado por comas
     * Valida que el arreglo no esté vacío
     *
     * @param array $data
     * @return string
     
    function array_to_string(array $data): string
    {
        if (empty($data)) {
            return '';
        }

        $mapped = array_map(function ($item) {
            if (is_array($item) || is_object($item)) {
                return json_encode($item, JSON_UNESCAPED_UNICODE);
            }
            return (string) $item;
        }, $data);

        return implode(', ', $mapped);
    }
}

 function breadcrumb_panel($titulo_pagina, $breadcrum=array()): string
 {
    $html= '';
    $html =  '
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> '.$titulo_pagina.' </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="'.route_to("/Dashboard").'"><i class="fa fa-home" aria-hidden="true"></i></a>
              </li>';
             // <!-- 
              //< -->
             
             // dd($breadcrum);
              foreach ($breadcrum as $bd) {
            if ($bd["href"]!= "#") {
                $html.= '<li class="breadcrumb-item"><a href="'.$bd["href"].'">'.$bd["titulo"].'</a></li>';
            }
            else {
                $html.='<li class="breadcrumb-item active">'.$bd["titulo"].'</li>';
            }

              }
            $html.= '</ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
    </div>';
    return $html; 
 }//end breadcrumb_panel
*/


if (!function_exists('breadcrumb_panel')) {
    /**
     * Genera el HTML del breadcrumb para el panel
     *
     * @param string $titulo_pagina  Título que aparece en el h1
     * @param array  $breadcrum      Arreglo de items del breadcrumb
     * @return string
     */
    function breadcrumb_panel(string $titulo_pagina, array $breadcrum = []): string
    {
        $html = '
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">' . $titulo_pagina . '</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="' . route_to('/Dashboard') . '">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </a>
                    </li>';

        foreach ($breadcrum as $bd) {
            if ($bd['href'] != '#') {
                $html .= '
                    <li class="breadcrumb-item">
                        <a href="' . $bd['href'] . '">' . $bd['titulo'] . '</a>
                    </li>';
            } else {
                $html .= '
                    <li class="breadcrumb-item active">' . $bd['titulo'] . '</li>';
            }
        }

        $html .= '
                </ol>
            </div>
        </div>';

        return $html;
    }
}