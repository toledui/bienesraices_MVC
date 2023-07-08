<?php

namespace Controllers;
use MVC\Router;
use Model\Vendedor;


class VendedorController {

    public static function crear(Router $router){
        $vendedor = new Vendedor;
        // Arreglo con mensajes de errores
        $errores = Vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            // Crear una nueva instancia
        
            $vendedor = new Vendedor($_POST['vendedor']);
            // validar que no tengamos campos vacios
        
            $errores = $vendedor->validar();
        
            // en caso de no tener errores
            if(empty($errores)){
                $vendedor->guardar();
            }
        
        }



        $router->render('vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }


    public static function actualizar(Router $router){
        $id = validarORedireccionar('/admin');
        $vendedor = Vendedor::find($id);
        // Arreglo con mensajes de errores
        $errores = Vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asignar los valores
            $args = $_POST['vendedor'];
            // sincronizar objeto en memoria con lo que el usurio escribio
            $vendedor->sincronizar($args);
            
            // validacion
            $errores = $vendedor->validar();
            
            if(empty($errores)){
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/actualizar',[
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);

    }

    public static function eliminar(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id){

                $vendedor = Vendedor::find($id);
                $vendedor->eliminar();
    
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                        $vendedor = Vendedor::find($id);
                        $vendedor->eliminar();
                }
        }

        }
    }
}

?>