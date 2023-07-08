<main class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <?php include 'iconos.php'; ?>
    </main>
        <section class="contenedor seccion">
            <h2>Casas y Depas en Venta</h2>
            <?php 
                $limite = 3;
                include __DIR__ . '/listado.php' ; 
            ?>

            <div class="alinear-derecha">
                <a href="/propiedades" class="boton-verde">Ver todas</a>
            </div>
        </section>

        <section class="imagen-contacto">
            <h2>Encuentra la Casa de tus sueños</h2>
            <p>llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
            <a href="/contacto" class="boton-amarillo-inline-block">Contactanos</a>
        </section>

        <div class="contenedor seccion seccion-inferior">
            <section class="blog">
                <h3>Nuestro Blog</h3>
                <article class="entrada-blog">
                    <div class="imagen">
                        <picture>
                            <source srcset="build/img/blog1.webp" type="image/webp">
                            <source srcset="build/img/blog1.jpg" type="image/jepg">
                            <img loading="lazy" src="build/img/blog1.jpg" alt="Imagen blog 1">
                        </picture>
                    </div>
                    <div class="texto-entrada">
                        <a href="entrada.html">
                            <h4>Terraza en el techo de tu casa</h4>
                            <p class="informacion-meta">Escrito el: <span>20/10/2023</span> Por: <span>Admin</span> </p>
                            <p>Consejos para construir la terraza en el techod e tu casa con los mejores materiales y ahorrando dinero.</p>
                        </a>
                    </div>
                </article>

                <article class="entrada-blog">
                    <div class="imagen">
                        <picture>
                            <source srcset="build/img/blog2.webp" type="image/webp">
                            <source srcset="build/img/blog2.jpg" type="image/jepg">
                            <img loading="lazy" src="build/img/blog2.jpg" alt="Imagen blog 1">
                        </picture>
                    </div>
                    <div class="texto-entrada">
                        <a href="entrada.html">
                            <h4>Guia para la decoracion de tu hogar</h4>
                            <pclass="informacion-meta">Escrito el: <span>20/10/2023</span> Por: <span>Admin</span> </p>
                            <p>Consejos para construir decorar tu hogar con poco dinero y utilizando los mejores y más bellos materiales del mercado.</p>
                        </a>
                    </div>
                </article>

            </section>

            <section class="testimoniales">
                <h3>Testimoniales</h3>
                <div class="testimonial">
                    <blockquote>
                        El personal es muy amable, te asesoran en todo, saben mucho y siempre están al pendiente de lo que necesitas, ademas los precios son muy accesibles.
                    </blockquote>
                    <p>- Luis Toledo</p>
                </div>
            </section>
        </div>