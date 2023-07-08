<?php
namespace Model;

use Model\ActiveRecord;

class Admin extends ActiveRecord{
    // Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'contraseña'];

    public $id;
    public $email;
    public $contraseña;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->contraseña = $args['contraseña'] ?? '';
    }

    public function validar(){
        if(!$this->email){
            self::$errores[] = 'El email es obligatorio';
        }
        if(!$this->contraseña){
            self::$errores[] = 'El password es obligatorio';
        }

        return self::$errores;
    }

    public function existeUsuario(){
        $query = "SELECT * FROM " . self::$tabla . " WHERE email= '" . $this->email . "'";
        $resultado = self::$db->query($query);
        if(!$resultado->num_rows){
            self::$errores[] = 'El usuario o contraseña son incorrectos';
            return;
        }
        return $resultado;
    }


    public function comprobarPassword($resultado){
        $usuario = $resultado->fetch_object();
        // debuggear($usuario);
        $autenticado = password_verify($this->contraseña, $usuario->contraseña);

        if(!$autenticado){
            self::$errores[] = 'El password es incorrecto';
            
        }
        return $autenticado;
    }

    public function autenticar(){
        session_start();

        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;
        header('Location: /admin');
    }
}

?>