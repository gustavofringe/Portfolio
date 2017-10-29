<div class="border">
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <figure class="figure">
                <img src="<?= BASE_URL; ?>/public/img/logo.svg" alt="ma photo" class="rounded-circle photo" style="background-color: grey;">
                <!-- /.rounded-circle -->
            </figure>
            <!-- /.figure -->
        </div>
        <!-- /.col-xl-6 -->
        <div class="col-xl-6 col-lg-6">
            <article class="description title">
                <h1>Besoin de créer un site WEB ?</h1>
                <p>N'attendez plus, je peux vous offrir mes services selon vos besoins</p>
            </article>
        </div>
        <!-- /.col-xl-6 -->
    </div>
    <!-- /.row --></div>
<!-- /.border -->
<div class="border">
    <div class="row mt-3">
        <div class="col-12 col-xl-6 col-lg-6">
            <article class="apropos description">
                <h2><span>à</span> propos</h2>
                <p class="text-justify">Je m'appelle Guillaume Dussart, j'ai commencé le développement web entant
                    qu'autodidacte
                    et pour le fun... tout en exercant parallèlement mon activité d'électricien d'équipement.
                    Cela est très vite devenue une vraie passion et j'ai voulu en faire mon
                    métier.</p>
                <div class="simplon media">
                    <img src="<?= BASE_URL;?>/public/img/simplonco.png" class="d-flex align-self-center mr-3 pb-1" alt="simplon">
                    <div class="media-body text-justify">
                        <p class="mt-4">Alors j'ai décidé de plaquer mon ancien
                            métier et de suivre une formation très enrichissante à Simplon !
                        </p>
                    </div>
                    <!-- /.media-body -->

                </div>
            </article>
            <!--/.apropos-->
        </div>
        <!--/.col-xl-6-->
        <div class="col-12 col-xl-6 col-lg-6 description">
            <h2>Mes passions en images</h2>
            <img src="<?= BASE_URL;?>/public/img/hobbies/black-basketball.svg" alt="ballon">
            <img src="<?= BASE_URL;?>/public/img/hobbies/bricolage.svg" alt="outils">
            <img src="<?= BASE_URL;?>/public/img/hobbies/kitchen.svg" alt="cuisine">
            <img src="<?= BASE_URL;?>/public/img/hobbies/Musical_notes.svg" alt="musique">
            <img src="<?= BASE_URL;?>/public/img/hobbies/tennis.svg" alt="tennis">

        </div>
        <!-- /.col-xl-6 col-lg-6 -->
    </div>
    <!--/.row--></div>
<!-- /.border -->


<h3 class="mt-3">Mes dernières réalisations</h3>
<div class="row mt-5 mb-3 justify-content-sm-center">
    <?php foreach ($realisations as $realisation): ?>
    <div class="col-lg-3 col-sm-auto mb-3">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 242px;">
                <a href="https://gustavofringe.github.io/projectArchiduchesse/">
                    <div class="first content-image d-flex" role="img" aria-label="archiduchesse">
                        <!--<img class="d-flex mr-3" src="img/archiduchesse_s.png" alt="archiduchesse">-->

                        <div class="image">
                            <img src="<?php echo BASE_URL;?>/public/img/" alt="">
                        </div>

                    </div>
                </a>
                <div class="card-block">
                    <h4 class="card-title"><?= $realisation->title;?></h4>
                    <p class="card-text"><?= $realisation->subtitle;?></p>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <!--/.col-xl-3-->
    <div class="col-lg-3 col-sm-auto mb-3">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 242px;">
                <a href="https://gustavofringe.github.io/projectLeBonCoin/">
                    <div class="second content-image d-flex" role="img" aria-label="leboncoin">
                        <!--<img class="d-flex mr-3" src="img/archiduchesse_s.png" alt="archiduchesse">-->
                        <div class="image"></div>
                    </div>
                </a>
                <div class="card-block">
                    <h4 class="card-title">projectLeboncoin</h4>
                    <p class="card-text">Reproduction du site leboncoin</p>
                </div>
            </div>
        </div>
    </div>
    <!--/.col-xl-3-->
    <div class="col-lg-3 col-sm-auto mb-3">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 242px;">
                <a href="https://gustavofringe.github.io/projectSportsCoach/">
                    <div class="third content-image d-flex" role="img" aria-label="coachsportif">
                        <!--<img class="d-flex mr-3" src="img/archiduchesse_s.png" alt="archiduchesse">-->
                        <div class="image"></div>
                    </div>
                </a>
                <div class="card-block">
                    <h4 class="card-title">projectSportscoach</h4>
                    <p class="card-text">Création d'un site de coaching sportif</p>
                </div>
            </div>
        </div>
    </div>
    <!--/.col-xl-3-->
    <div class="col-lg-3 col-sm-auto mb-3">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 242px;">
                <a href="https://gustavofringe.github.io/projectAirbnb/">
                    <div class="fourth content-image d-flex" role="img" aria-label="airbnb">
                        <!--<img class="d-flex mr-3" src="img/archiduchesse_s.png" alt="archiduchesse">-->
                        <div class="image"></div>
                    </div>
                </a>
                <div class="card-block">
                    <h4 class="card-title">projectAirbnb</h4>
                    <p class="card-text">Reproduction du site airbnb</p>
                </div>
            </div>
        </div>
    </div>
    <!--/.col-xl-3-->
</div>
<!--/.row-->
