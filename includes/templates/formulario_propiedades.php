           <fieldset>
                <legend>Información General de nuestra propiedad</legend>
                <label for="titulo">Titulo de la propiedad:</label>
                <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo de la propiedad" value="<?php echo s($propiedad->titulo); ?>">
                
                <label for="precio">Precio de la propiedad:</label>
                <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio de la propiedad" value="<?php echo s($propiedad->precio); ?>">

                <label for="imagen">Imagen de la propiedad:</label>
                <input type="file" id="imagen" name="propiedad[imagen]" accept="image/jpeg, image/png">

                <?php if($propiedad->imagen): ?>
                    <img src="/bienesraices/imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen de la propiedad" class="imagen-small">

                <?php endif; ?>


                <label for="descripcion">Descripción:</label>
                <textarea name="propiedad[descripcion]" name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Describe toda la información sobre la propiedad"><?php echo s($propiedad->descripcion); ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información de la Propiedad</legend>
                <label for="habitaciones">No de habitaciones:</label>
                <input type="number" name="propiedad[habitaciones]" id="habitaciones" value="<?php echo s($propiedad->habitaciones); ?>" placeholder="Ej: 3" min="1" max="9">
                <label for="wc">No de Baños:</label>
                <input type="number" id="wc" name="propiedad[wc]" value="<?php echo s($propiedad->wc); ?>" placeholder="Ej: 3" min="1" max="9">
                <label for="estacionamiento">No de cajones de estacionamientos:</label>
                <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" value="<?php echo s($propiedad->estacionamiento); ?>" placeholder="Ej: 3" min="1" max="9">
                
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="propiedad[vendedores_id]" id="vendedor">
                    <option value="">--Seleccione</option>
                    <?php foreach($vendedores as $vendedor): ?>
                    <option <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : '' ?> value="<?php echo s($vendedor->id); ?>" > <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?></option>
                   <?php endforeach; ?>
                </select>

            </fieldset>