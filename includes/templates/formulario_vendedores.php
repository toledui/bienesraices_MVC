           <fieldset>
                <legend>Información General del vendedor</legend>
                <label for="nombre">Nombre del Vendedor</label>
                <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre del vendedor" value="<?php echo s($vendedor->nombre); ?>">
                
                <label for="apellido">Apellido del Vendedor</label>
                <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido del vendedor" value="<?php echo s($vendedor->apellido); ?>">

                <label for="telefono">Telefono del Vendedor</label>
                <input type="text" id="telefono" name="vendedor[telefono]" placeholder="Telefono del vendedor" value="<?php echo s($vendedor->telefono); ?>">
            </fieldset>