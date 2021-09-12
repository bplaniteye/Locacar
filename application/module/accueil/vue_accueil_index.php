<section class="container mt-5 pt-5 border border-3 border-danger p-5">
    <!-- Carousel -->
    <!-- Créer un carousel -->
    <div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <!-- Indicateurs -->
        <ul class="carousel-indicators">
            <li data-bs-target="#carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#carousel" data-bs-slide-to="2"></li>
        </ul>

        <!-- Contenu du carousel -->
        <div class="carousel-inner">
            <!--  Slide 1 -->
            <div class="carousel-item active" data-bs-interval="1000">
                <img src="../www/_images/promo.jpg" class="w-100 d-block" alt="Japon">
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="../www/_images/car6.jpg" class="w-100 d-block" alt="Japon">
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="../www/_images/contact1.jpg" class="w-100 d-block" alt="Japon">
            </div>
        </div>

            <!-- Controles -->
            <button class="carousel-control-prev" href="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark"></span>
                <span class="sr-only">Précédent</span>
            </button>
            <button class="carousel-control-next" href="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark"></span>
                <span class="sr-only">Suivant</span>
            </button>
    </div> <!--  -->

</section> <!-- /Carousel -->

<section class="container mt-5 p-5 border border-3 border-danger">
    <!-- Catégories  -->
    <div>
        <!-- 2 -->
        <h3 class="text-center border p-2 bg-danger text-white">NOS CATEGORIES DE VOITURES</h3>

        <div class="row pt-5">

            <!-- row1  -->
            <div class="col m-3">
                <div class="card" style="width: 18rem;">
                    <a href='<?= hlien("categorie", "voitures", "cat_id", $row["cat_id"] = 1) ?>'>
                        <img src="../www/_images/car1.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-title text-center bg-danger">
                        <p>Petit</p>
                    </div>
                </div>
            </div>

            <div class="col m-3">
                <div class="card" style="width: 18rem;">
                    <img src="../www/_images/car2.jpg" class="card-img-top" alt="...">
                    <div class="card-title text-center">
                        <a class='btn btn-primary' href='<?= hlien("categorie", "voitures", "cat_id", $row["cat_id"] = 2) ?>'>MOYEN</a>
                    </div>
                </div>

            </div>

            <div class="col m-3">
                <div class="card" style="width: 18rem;">
                    <img src="../www/_images/car3.jpg" class="card-img-top" alt="...">
                    <div class="card-title text-center">
                        <a class='btn btn-primary' href='<?= hlien("categorie", "voitures", "cat_id", $row["cat_id"] = 3) ?>'>GRAND</a>
                    </div>
                </div>

            </div>

            <div class="col m-3">
                <div class="card" style="width: 18rem;">
                    <img src="../www/_images/car4.jpg" class="card-img-top" alt="...">
                    <div class="card-title text-center">
                        <a class='btn btn-primary' href='<?= hlien("categorie", "voitures", "cat_id", $row["cat_id"] = 4) ?>'>UTILITAIRE</a>
                    </div>
                </div>

            </div>

            <div class="col m-3">
                <div class="card" style="width: 18rem;">
                    <img src="../www/_images/car5.jpg" class="card-img-top" alt="...">
                    <div class="card-title text-center">
                        <a class='btn btn-primary' href='<?= hlien("categorie", "voitures", "cat_id", $row["cat_id"] = 5) ?>'>PRESTIGE</a>
                    </div>
                </div>

            </div>

            <div class="col m-3">
                <div class="card" style="width: 18rem;">
                    <img src="../www/_images/car6.jpg" class="card-img-top" alt="...">
                    <div class="card-title text-center">
                    </div> <a class='btn btn-primary' href='<?= hlien("categorie", "voitures", "cat_id", $row["cat_id"] = 6) ?>'>CAMPING CAR</a>
                </div>
            </div>

        </div>
        <!--row1  -->
    </div>
    <!--row2  -->




    </div> <!-- 2 -->
</section> <!-- Catégories  -->

<section>

</section>