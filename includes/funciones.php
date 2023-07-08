<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplate( string $nombre, bool $inicio = false){
    include TEMPLATES_URL . "/$nombre.php";
    
}

function estaAutenticado(){
    session_start();

    if(!$_SESSION['login']){
        header('Location: /');
    }
}

function debuggear($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}

// Escapa el HTML
function s($html) {
$s = htmlspecialchars($html);
return $s;
}


// Validar tipo de contenido
function validarTipoContenido($tipo){
    $tipos = ['vendedor', 'propiedad'];
    return in_array($tipo, $tipos);
}

// mostrar notificaciones
function mostrarNotificacion($codigo){
    $mensaje = '';
    switch ($codigo) {
        case 1:
            $mensaje = 'Creado correctamente';
            break;
        case 2:
                $mensaje = 'Actualizado correctamente';
                break;
        case 3:
                    $mensaje = 'Eliminado correctamente';
                    break;

        default:
                $mensaje = false;
                break;
    }
    return $mensaje;
}

function validarORedireccionar(string $url){
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

// validar que sea un id válido
if(!$id){
    header("Location: $url");
}

return $id;

}