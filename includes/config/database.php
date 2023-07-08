<?php 
function conectarDB() : mysqli{
    $db = new mysqli('localhost', 'root', '', 'bienesraices_crud');

    if(!$db){
        echo "error en la conexión";
        exit;
    }

    return $db;
}

?>