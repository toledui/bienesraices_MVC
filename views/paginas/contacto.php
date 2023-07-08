<main class="contenedor seccion">
        <h1>Contacto</h1>

        <?php
        if($mensaje){
            echo "<p class='alerta exito '>" . $mensaje . "</p> " ;
        }
        
        ?>
            <picture>
                <source srcset="build/img/destacada3.webp" type="image/webp">
                <source srcset="build/img/destacada3.jpg" type="image/jepg">
                <img loading="lazy" width="200" height="300" src="build/img/destacada3.jpg" alt="imagen de contacto">
            </picture>
            <h2>Llene el formulario de contacto</h2>

            <form action="/contacto" class="formulario" method="POST">
                <fieldset>
                    <legend>información personal</legend>
                    <label for="nombre">Nombre</label>
                    <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>
                    
                    
                    <label for="mensaje">Mensaje</label>
                    <textarea name="contacto[mensaje]" id="mensaje" cols="30" rows="6" required></textarea>
                </fieldset>
                <fieldset>
                    <legend>Información sobre la propiedad</legend>
                    <label for="opciones">Vende o compra:</label>
                    <select name="contacto[tipo]" id="opciones" required>
                        <option disabled selected value="">--Seleccione--</option>
                        <option value="compra">Compra</option>
                        <option value="vende">Vende</option>
                    </select>
                    <label for="presupuesto">Precio o Presupuesto</label>
                    <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto" name="contacto[precio]" required>
                </fieldset>
                <fieldset>
                    <legend>Información de contacto</legend>
                    <p>como desea ser contactado?</p>
                    <div class="forma-contacto">
                        <label for="contactar-telefono">Telefono</label>
                        <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required> 
                        <label for="contactar-email">Email</label>
                        <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
                    </div>
                    <div id="contacto"></div>
                    
                </fieldset>

                <input type="submit" value="enviar" class="boton-verde">
            </form>
    </main>