<main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>

        <?php endforeach; ?>
        <form method="POST" action="/login" class="formulario">
            <fieldset>
                <legend>Email y Password</legend>
                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu Correo" id="email" name="email" required>
                <label for="contraseña">assword</label>
                <input type="password" placeholder="Tu Password" id="contraseña" name="contraseña" required>
            </fieldset>
            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
        </form>
    </main>