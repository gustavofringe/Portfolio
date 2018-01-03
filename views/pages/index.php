
<div class="border">
    <div class="row">
        <!-- /.col-xl-6 -->
        <div class="col-xl-12 col-lg-12 mb-3">
            <article class="description title">
                <h1 class="text-center mb-4">Dussart Guillaume</h1>
                <h2 class="text-center mt-3">Artisan du Web</h2>
                <h3 class="text-center mt-5">Besoin de créer un site WEB ?</h3>
                <p class="mt-3 text-center">N'attendez plus, je peux vous offrir mes services selon vos besoins</p>
            </article>
        </div>
        <!-- /.col-xl-6 -->
    </div>
    <!-- /.row --></div>
<!-- /.border -->
<!--<div class="border">
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
                    <img src="<?= BASE_URL; ?>/public/img/simplonco.png" class="d-flex align-self-center mr-3 pb-1" alt="simplon">
                    <div class="media-body text-justify">
                        <p class="mt-4">Alors j'ai décidé de plaquer mon ancien
                            métier et de suivre une formation très enrichissante à Simplon !
                        </p>
                    </div>
                    <!-- /.media-body

                </div>
            </article>
            <!--/.apropos
        </div>
        <!--/.col-xl-6
        <div class="col-12 col-xl-6 col-lg-6 description">
            <h2>Mes passions en images</h2>
            <img src="<?= BASE_URL; ?>/public/img/hobbies/black-basketball.svg" alt="ballon">
            <img src="<?= BASE_URL; ?>/public/img/hobbies/bricolage.svg" alt="outils">
            <img src="<?= BASE_URL; ?>/public/img/hobbies/kitchen.svg" alt="cuisine">
            <img src="<?= BASE_URL; ?>/public/img/hobbies/Musical_notes.svg" alt="musique">
            <img src="<?= BASE_URL; ?>/public/img/hobbies/tennis.svg" alt="tennis">

        </div>
        <!-- /.col-xl-6 col-lg-6
    </div>
    <!--/.row</div>
<!-- /.border -->


<h3 class="mt-3 stripe">Mes dernières réalisations</h3>
<div class="row mt-5 mb-3 justify-content-sm-center">
    <?php foreach ($realisations as $realisation): ?>
        <div class="col-lg-3 col-sm-auto mb-3">
            <div class="d-flex justify-content-center">
                <div class="card" style="width: 15.1rem; height: 18rem;">
                    <a href="<?php echo $realisation->getLink();?>">
                        <div class="first content-image d-flex" role="img" aria-label="archiduchesse">
                            <!--<img class="d-flex mr-3" src="img/archiduchesse_s.png" alt="archiduchesse">-->
                            <div class="image" style="width:20rem">
                                <img src="<?php echo BASE_URL; ?>/img/sites/<?php echo $realisation->getFolder(); ?>/<?php echo $realisation->getName(); ?>"
                                     alt="<?php echo $realisation->getName(); ?>">
                            </div>

                        </div>
                    </a>
                    <div class="card-block">
                        <h4 class="card-title"><?= $realisation->getTitle(); ?></h4>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!--/.col-xl-3-->
</div>
<!--/.row-->