<div class="contenedor-anuncios">
        <?php  foreach($propiedades as $propiedad):  ?>
        <div class="anuncio">

            <img class="imagen-anuncio" loading="lazy" src="imagenes/<?php echo $propiedad->imagen ;?>" alt="anuncio 1 de casa">

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo ;?></h3>
                <p><?php echo $propiedad->descripcion ;?></p>
                <p class="precio">$ <?php echo $propiedad->precio ;?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono-anuncio" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p><?php echo $propiedad->wc ;?></p>
                    </li>
                    <li>
                        <img class="icono-anuncio" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p><?php echo $propiedad->estacionamiento ;?></p>
                    </li>
                    <li>
                        <img class="icono-anuncio" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                        <p><?php echo $propiedad->habitaciones ;?></p>
                    </li>
                </ul>

                <a href="/propiedad?id=<?php echo $propiedad->id ;?>" class="boton boton-amarillo">Ver propiedad</a>
            </div><!--contenido anuncio-->
        </div><!--se cierra el card del anuncio-->
        <?php endforeach; ?>
    </div><!--contenedor de anuncios-->