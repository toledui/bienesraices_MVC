<?php

namespace Model;

class Propiedad extends ActiveRecord {
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;


    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? '';

    }

    public function validar() {
        if(!$this->titulo){
            self::$errores[] = "Debes añadir un titulo";
        }
        if(!$this->precio){
            self::$errores[] = "El precio es obligatorio";
        }
    
        if(strlen($this->descripcion) < 50){
            self::$errores[] = "La descripción es obligatoria y debe contener por lo menos 50 caracteres!";
        }
    
        if(!$this->habitaciones){
            self::$errores[] = "Debes incluír el número de habitaciones";
        }
    
        if(!$this->wc){
            self::$errores[] = "Debes indicar el número de baños";
        }
    
        if(!$this->estacionamiento){
            self::$errores[] = "Debes añadir el número de lugares de estacionamiento";
        }
    
        if(!$this->vendedores_id){
            self::$errores[] = "Elige el número del vendedor";
        }
    
        if(!$this->imagen){
            self::$errores[] = "La imagen es obligatoria, sube una imagen por favor";
        }

        return self::$errores;
    }


}

?>