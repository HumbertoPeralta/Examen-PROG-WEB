
<?php 
        include_once __DIR__.'/../layouts/header.php';
    ?>


<main>
    <section class="hero">
        <div class="hero-contenido">
            <img src="<?=ASSETS_URL?>/img/pareja.PNG" alt="Imagen central"> 
        </div>

        <a class="hero-boton" href="<?=BASE_URL?>/../src/views/public/buys/details.php">Comprar</a>

        <div class="indicadores">
            <div class="activo"></div>
            <div></div>
            <div></div>
            <div></div>
         </div>
    </section>

    <div class="producto-grid">
        <div class="producto-tarjeta">
            <img src="<?=ASSETS_URL?>/img/playera.png" alt="Playeras">
            <p class="producto-nombre">Playeras</p>
            <a class="producto-btn" href="<?=BASE_URL?>/../src/views/public/tshirts/playeras.php">Ver más</a>
        </div>

        <div class="producto-tarjeta">
            <img src="<?=ASSETS_URL?>/img/pantalones.jpg" alt="Pantalones">
            <p class="producto-nombre">Pantalones</p>
            <a class="producto-btn" href="<?=BASE_URL?>/../src/views/public/pants/pantalones.php">Ver más</a>
        </div>

        <div class="producto-tarjeta">
            <img src="<?=ASSETS_URL?>/img/sudadera.jpg" alt="Sudadera">
            <p class="producto-nombre">Sudadera</p>
            <a class="producto-btn" href="<?=BASE_URL?>/../src/views/public/hoodies/sudaderas.php">Ver más</a>
        </div>

        <div class="producto-tarjeta">
            <img src="<?=ASSETS_URL?>/img/camisas.jpg" alt="Camisas">
            <p class="producto-nombre">Camisas</p>
            <a class="producto-btn" href="<?=BASE_URL?>/../src/views/public/shirts/camisas.php">Ver más</a>
        </div>
    </div>

    <div class="promociones">
        <p class="promociones-text">Promociones 50%</p>
        <button class="promociones-btn"> Ver promociones</button>
    </div>
</main>

<?php include '../src/views/layouts/footer.php'; ?>