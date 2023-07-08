<?php
namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {
    public static function index(Router $router) {

        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        // Muestra mensaje si el registro se agregó correctamente
        $resultado = $_GET['resultado'] ?? null;
        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);

    }

    public static function crear(Router $router){

        $propiedad = new Propiedad;
        
        $vendedores = Vendedor::all();

        // Arreglo con mensajes de errores
        $errores = Propiedad::getErrores();

        // Ejecuta el código después que el usurio envía el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $propiedad = new Propiedad($_POST['propiedad']);


                // generando nombre unico de la imagen
                $nombreImagen = md5( uniqid(rand(), true) ) . ".jpg";

                if($_FILES['propiedad']['tmp_name']['imagen']){
                    // Realizaq un riseze a la imagen con intervention
                    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                    $propiedad->setImagen($nombreImagen);

                }
                $errores = $propiedad->validar();


            // Revisar que el arreglo de errores esté vacío

            if(empty($errores)){

                // crear la carpeta imagenes
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }

                // guarda la imagen en el servidor con intervention
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                // GUARDA EN LA BASE DE DATOS
                $propiedad->guardar();


            }
        }


        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router){
        $id = validarORedireccionar('/admin');

        $propiedad = Propiedad::find($id);
        $errores = Propiedad::getErrores();
        $vendedores = Vendedor::all();


        // Ejecuta el código después que el usurio envía el formulario
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                // Asignar los atributos
                $args = $_POST['propiedad'];

                $propiedad->sincronizar($args);

                $errores = $propiedad->validar();

                // Subida de archivos
                // generando nombre unico de la imagen
                $nombreImagen = md5( uniqid(rand(), true) ) . ".jpg";
                if($_FILES['propiedad']['tmp_name']['imagen']){
                    // Realizar un riseze a la imagen con intervention
                    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                    $propiedad->setImagen($nombreImagen);

                }

                // Revisar que el arreglo de errores esté vacío

                if(empty($errores)){
                    if($_FILES['propiedad']['tmp_name']['imagen']){
                    // almacenar la imagen
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                    }
                    // guardar en la base de datos
                    $propiedad->guardar();
                }
                }


        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);

    }

    // Controller para eliminar un registro de propiedades

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id){
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $propiedad = Propiedad::find($id);
                        $propiedad->eliminar();

                }


            }
        }
    }
}


?>
