<?php 

namespace Model;

class ActiveRecord {
        // BASE DE DATOS
        protected static $db;
        protected static $columnasDB = [];
        protected static $tabla = '';
        // errores
        protected static $errores = [];
    
            // definir la conexión a la base de datos
            public static function setDB($database){
                self::$db = $database;
            }
    
        public function guardar(){
            if(!is_null($this->id)){
                 // actualizando un nuevo registro
                $this->actualizar();
            }else{
                // crear
                $this->crear();
            }
        }
    
        public function crear(){
           
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();
        
        $string = join(', ', array_keys($atributos));
        $valores = join("', '", array_values($atributos));
        $query = " INSERT INTO " . static::$tabla . " ($string) VALUES ('$valores')";
        $resultado = self::$db->query($query);
    
        if($resultado){
            // Redireccionar al usurio
            header('Location: /admin?resultado=1');
        }
    
        }
    
        public function actualizar(){
    
            // Sanitizar los datos
            $atributos = $this->sanitizarAtributos();
    
            $valores = [];
            foreach($atributos as $key => $value){
                $valores[] = "{$key}='{$value}'";
            }
            $query = " UPDATE " . static::$tabla . " SET " . join(', ', $valores) . " WHERE id = '" . self::$db->escape_string($this->id) . "' LIMIT 1";
    
            $resultado = self::$db->query($query);
    
            if($resultado){
                // Redireccionar al usurio
                header('Location: /admin?resultado=2');
            }
    
        }
    
        // Eliminar un registro
        public function eliminar(){
                    // elimanr el archivo
                    $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
                    $resultado = self::$db->query($query);
                    if($resultado){
                        $this->borrarImagen();
                        header('Location: /admin?resultado=3');
                    }
        }
    
    
        public function atributos(){
            $atributos =[];
            foreach(static::$columnasDB as $columna){
                if($columna === 'id') continue;
                $atributos[$columna] = $this->$columna;
            }
            return $atributos;
        }
    
        public function sanitizarAtributos(){
            $atributos = $this->atributos();
            $sanitizado = [];
            foreach($atributos as $key => $value){
                $sanitizado[$key] = self::$db->escape_string($value);
            }
    
            return $sanitizado;
        }
    
    // Subida de archivos
    public function setImagen($imagen){
        // Elimina la imagen previa
        if(!is_null($this->id)){
            $this->borrarImagen();
        }   
    
        if($imagen){
            $this->imagen = $imagen;
        }
    }
    
        // Borrar imagen del servidor
        public function borrarImagen(){
                    // comprobar si existe el archivo
                    $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
                    if($existeArchivo){
                        unlink(CARPETA_IMAGENES . $this->imagen);
                    }
        }
    
        // validacion
        public static function getErrores(){
            return static::$errores;
        }
    
        
        public function validar(){

            static::$errores = [];

            return static::$errores;
        }



        // Lista todos los registros
    
        public static function all(){
            $query = "SELECT * FROM " . static::$tabla;
            $resultado = self::consultarSQL($query);
    
            return $resultado;
    
        }

        // Obtiene determinado número de registros

        public static function get($cantidad){
            $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
            $resultado = self::consultarSQL($query);
    
            return $resultado;
    
        }
    
        // busca un registro por su id
        public static function find($id){
            $query = "SELECT * FROM " . static::$tabla . " WHERE id = $id;";
            $resultado = self::consultarSQL($query);
            return array_shift($resultado);
        }
    
    
        public static function consultarSQL($query){
            // consultar la base de datos
            $resultado = self::$db->query($query);
            // iterar los resultados
            $array = [];
            
            while($registro = $resultado->fetch_assoc()){
                $array[] = static::crearObjeto($registro);
            }
            // liberar la memoria
            $resultado->free();
            // retornar los resultados
            return $array;
        }
    
        protected static function crearObjeto($registro){
            $objeto = new static;
            foreach($registro as $key => $value){
                if(property_exists($objeto, $key)){
                    $objeto->$key = $value;
                }
            }
            return $objeto;
        }
    
        // Sincronizar el objeto en memoria con los cambios realizados por el usuario
        public function sincronizar($args = []){
            foreach($args as $key => $value){
                if(property_exists($this, $key) && !is_null($value)){
                    $this->$key = $value;
                }
            }
        }
}

?>