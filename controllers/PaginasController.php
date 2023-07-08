<?php 
namespace Controllers;

use MVC\router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{

    public static function index(Router $router){
        $propiedades = Propiedad::get(3);
        $inicio = true;
        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);


    }




    public static function nosotros(Router $router){
       $router->render('paginas/nosotros');
    }




    public static function propiedades(Router $router){
        
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router){
        
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        $id = validarORedireccionar($id);
        
        $propiedad = Propiedad::find($id);


        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }



    public static function blog(Router $router) {
        $router->render('paginas/blog');
    }




    public static function entrada(Router $router){
        $router->render('paginas/entrada');
    }




    public static function contacto(Router $router){

        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $respuestas = $_POST['contacto'];

            // crear instancia de PHPMailer
            $mail = new PHPMailer();

            // configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = 'c63b13aa649a12';
            $mail->Password = '16a5b4b195f4b4';
            $mail->SMTPSecure = 'tls';


            // configuracion de envio de email
            $mail->setFrom('ventas@thagencia.com', 'Bienes Raices');
            $mail->addAddress('luis_toledo35@hotmail.com', 'Luis Toledo');
            $mail->Subject = 'Tienes un nuevo mensaje';

            // habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // contenido
            $contenido = '<HMTL>';
            $contenido .= '<P> Tienes un nuevo mensaje </p>';
            $contenido .= '<P> Nombre: ' . $respuestas['nombre'] . '</p>';
            $contenido .= '<P> Medio de contacto: ' . $respuestas['contacto'] . '</p>';

            if($respuestas['contacto'] === 'telefono'){
                $contenido .= '<P> Telefono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<P> Fecha: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<P> Hora: ' . $respuestas['hora'] . '</p>';
            }else{
                $contenido .= '<P> Email: ' . $respuestas['email'] . '</p>';
            }            
            $contenido .= '<P> Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<P> Vende o Compra: ' . $respuestas['tipo'] . '</p>';
            $contenido .= '<P> Precio: ' . $respuestas['precio'] . '</p>';
            $contenido .= '</HMTL>';

            $mail->Body    = $contenido;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            // Enviar el email
            if($mail->send()){
                $mensaje = 'mensaje enviado correctamente';
            } else {
                $mensaje = 'El mensaje no se pudo enviar';
            }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }


}

?>