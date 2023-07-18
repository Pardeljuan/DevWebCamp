<main class="devwebcamp">
    <h2 class="devwebcamp__heading"><?php echo $titulo; ?></h2>
    <p class="devwebcamp__descripcion">Conoce la conferencia mas importante de Latinoamérica</p>

    <div class="devwebcamp__grid">
        <div <?php aos_animacion() ?> class="devwebcamp__imagen">
            <picture>
                <source srcset="build/img/sobre_devwebcamp.avif" type="imagen/avif">
                <source srcset="build/img/sobre_devwebcamp.webp" type="imagen/webp">
                <img loading="lazy" width="200" height="300" src="build/img/sobre_devwebcamp.jpg" alt="Imagen DevWebCamp">
            </picture>
        </div>
        <div <?php aos_animacion() ?> class="devwebcamp__contenido">
            <p class="devwebcamp__texto">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Amet natus soluta non ex, itaque distinctio ab vel eum quod ipsa fuga provident,
                autem sint quidem quos enim veritatis obcaecati?
            </p>
            <p class="devwebcamp__texto">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Amet natus soluta non ex, itaque distinctio ab vel eum quod ipsa fuga provident,
                autem sint quidem quos enim veritatis obcaecati?
            </p>
        </div>
    </div>
</main>