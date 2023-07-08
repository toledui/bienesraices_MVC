<?php
if(!isset($_SESSION)){
    session_start();
}
$auth = $_SESSION['login'] ?? null;
// var_dump($auth);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/bienesraices/build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php">
                    <img src="/bienesraices/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>
                <div class="mobile-menu">
                    <img src="/bienesraices/build/img/barras.svg" alt="icono menú responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/bienesraices/build/img/dark-mode.svg" alt="dark mode button">
                    <nav class="navegacion">
                        <a href="nosotros.php" class="enlace">Nosotros</a>
                        <a href="anuncios.php" class="enlace">Anuncios</a>
                        <a href="blog.php" class="enlace">Blog</a>
                        <a href="contacto.php" class="enlace">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/bienesraices/cerrarsesion.php" class="enlace">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>

            </div><!--Cierre de la barra-->
            <?php if ($inicio){ ?>
            <h1>Venta de casa y departamentos exclusivos de lujo</h1>
            <?php } ?>
        </div>
    </header><!--se termina el header-->