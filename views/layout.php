<?php
if(!isset($_SESSION)){
    session_start();
}
$auth = $_SESSION['login'] ?? null;
// var_dump($auth);

if(!isset($inicio)){
    $inicio = false;
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menú responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="dark mode button">
                    <nav class="navegacion">
                        <a href="/nosotros" class="enlace">Nosotros</a>
                        <a href="/propiedades" class="enlace">Anuncios</a>
                        <a href="/blog" class="enlace">Blog</a>
                        <a href="/contacto" class="enlace">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/logout" class="enlace">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>

            </div><!--Cierre de la barra-->
            <?php if ($inicio){ ?>
            <h1>Venta de casa y departamentos exclusivos de lujo</h1>
            <?php } ?>
        </div>
    </header><!--se termina el header-->


                <?php echo $contenido; ?>


    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.html" class="enlace">Nosotros</a>
                <a href="anuncios.html" class="enlace">Anuncios</a>
                <a href="blog.html" class="enlace">Blog</a>
                <a href="contacto.html" class="enlace">Contacto</a>
            </nav>
        </div>
        <?php $fecha = date('Y'); ?>
        <p class="copyright">
            Todos los derechos reservados <?php echo $fecha; ?> - THagencia
        </p>
    </footer>

    <script src="/build/js/bundle.min.js"></script>
</body>
</html>