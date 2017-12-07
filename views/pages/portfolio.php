<h1 class="mt-3 stripe">Mon portfolio</h1>

    <div class="row mt-5 mb-3 justify-content-sm-center" id="accordion">
        <?php foreach ($realisations as $k => $v): ?>
        <div class="d-flex justify-content-center col-lg-4 col-sm-auto mb-3">
            <div role="tablist" aria-multiselectable="true">
                    <div class="card" role="tab" id="heading<?= $v->workID; ?>" style="width: 20rem; height: 30rem;">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $v->workID; ?>"
           <div role="tablist" aria-multiselectable="true"  aria-expanded="true" aria-controls="collapse<?= $v->workID; ?>">
                    <div class="content-image d-flex" role="img" aria-label="archiduchesse">
                        <img class="card-img-top image" id="image"
                             src="<?= BASE_URL; ?>/public/img/<?= $v->folder; ?>/<?= $v->name; ?>"
                             alt="">
                    </div>
                </a>
                <div class="card-block">
                    <h2 class="card-title"><?= $v->title; ?></h2>
                    <p class="card-text"><?= $v->subtitle; ?></p>
                    <p class="mt-3"><?= $v->techno; ?></p>
                    <a href="<?= $v->link; ?>">
                        <img class="link" src="<?= BASE_URL; ?>/public/img/link-3.svg" alt="lien">
                        -><em>Lien
                            projet</em>
                    </a>
                </div>

            </div>
           <!-- <div class="card hidden-lg-down">-->
                <div id="collapse<?= $v->workID; ?>" class="collapse" role="tabpanel"
                     aria-labelledby="heading<?= $v->workID; ?>">
                   <!-- <div class="card card-block">-->
                        <div class="image-card">
                            <div class="media media-back">
                                <div id="carouselExampleSlidesOnly<?= $v->workID; ?>" class="carousel slide"
                                     data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <img class="d-block img-fluid d-flex"
                                                 src="<?= BASE_URL; ?>/public/img/<?= $v->folder; ?>/<?= $v->name; ?>"
                                                 alt="<?= $v->name; ?>">
                                        </div>
                                        <?php for ($i = 0; $i < count($tab[$v->workID]['name']); ++$i): ?>
                                            <div class="carousel-item">
                                                <img class="d-block img-fluid d-flex"
                                                     src="<?= BASE_URL; ?>/public/img/<?= $v->folder; ?>/<?= $tab[$v->workID]['name'][$i]; ?>"
                                                     alt="<?= $tab[$v->workID]['name'][$i]; ?>">
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                                <div class="media-body" style="width: 100%">
                                    <h4 class="mt-1"><?= $v->title; ?></h4>
                                    <p class="mt-3"><?= $v->techno; ?></p>
                                    <a href="<?= $v->link; ?>">
                                        <img class="link" src="<?= BASE_URL; ?>/public/img/link-3.svg" alt="lien">
                                        -><em>Lien
                                            projet</em>
                                    </a>
                                </div>
                                <!-- /.media-body -->
                            </div>
                            <!-- /.media -->
                        </div>
                        <!-- /.image-card -->

                    </div>



             </div>
            </div>
            <?php endforeach; ?>

            <!--/.col-xl-3-->

    </div>

<!-- /.card -->
        <!--
       =========================VIVE LES BOUCLES ;)
        -->
        <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="row mt-5 mb-3 justify-content-sm-center">
                <!--
            ============================================================================ archiduchesse
                -->
                <div class="col-lg-3 col-sm-auto mb-3">
                    <div class="d-flex justify-content-center">
                        <div class="card" style="width: 242px;" role="tab" id="headingOne">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                               aria-expanded="true" aria-controls="collapseOne">
                                <div class="first content-image d-flex" role="img" aria-label="archiduchesse">

                                    <div class="image"></div>

                                </div>
                            </a>
                            <div class="card-block">
                                <h4 class="card-title">projectArchiduchesse</h4>
                                <p class="card-text">Reproduction du site l'Archiduchesse</p>
                            </div>

                        </div>
                    </div>
                </div>
                <!--/.col-xl-3-->
                <!--
                ===================================================================== leboncoin
                -->
                <div class="col-lg-3 col-sm-auto mb-3">
                    <div class="d-flex justify-content-center">
                        <div class="card" style="width: 242px;" role="tab" id="headingTwo">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                               href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
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
                <!--
                ================================================================= sportcoach
                -->
                <div class="col-lg-3 col-sm-auto mb-3">
                    <div class="d-flex justify-content-center">
                        <div class="card" style="width: 242px;" role="tab" id="headingTree">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTree"
                               aria-expanded="true" aria-controls="collapseTree">
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
                <!--
                =============================================================== airbnb
                -->
                <!--/.col-xl-3-->
                <div class="col-lg-3 col-sm-auto mb-3">
                    <div class="d-flex justify-content-center">
                        <div class="card" style="width: 242px;"  role="tab" id="headingFour">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"
                               aria-expanded="true" aria-controls="collapseFour">
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
            <!--
            ====================================================collapse & slider first level
            =============================== slide archiduchesse
            -->
            <div class="card hidden-lg-down">
                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="card card-block">
                        <div class="image-card">
                            <div class="media media-back">
                                <div class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <img class="d-block img-fluid d-flex" src="../img/sites/archiduchesse/arch1.png" alt="archiduchesse">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block img-fluid d-flex" src="../img/sites/archiduchesse/arch2.png" alt="archiduchesse">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block img-fluid d-flex" src="../img/sites/archiduchesse/arch3.png" alt="archiduchesse">
                                        </div>
                                    </div>
                                </div>
                                <div class="media-body ml-5">
                                    <h4 class="mt-1">projectArchiduchesse</h4>
                                    <p class="mt-3">Projet réaliser avec Bootstrap</p>
                                    <a href="https://gustavofringe.github.io/projectArchiduchesse/"><img class="link" src="../img/link-3.svg"
                                                                                                         alt="lien">  -><em>Lien projet</em></a>
                                </div>
                                <!-- /.media-body -->
                            </div>
                            <!-- /.media -->
                        </div>
                        <!-- /.image-card -->
                    </div>
                </div>
                <!--
                ===================================================== slide leboncoin
                -->
                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="card card-block">
                        <div class="image-card">
                            <div class="media media-back">
                                <div id="carouselExampleSlidesOnlytwo" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <img class="d-block img-fluid d-flex" src="../img/sites/leboncoin/lebc.png" alt="airbnb">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block img-fluid d-flex" src="../img/sites/leboncoin/lebc2.png" alt="airbnb">
                                        </div>
                                    </div>
                                </div>
                                <div class="media-body ml-5">
                                    <h4 class="mt-1">projectLeboncoin</h4>
                                    <p class="mt-3">Projet réaliser en parti avec Bootstrap</p>
                                    <a href="https://gustavofringe.github.io/projectLeBonCoin/"><img class="link" src="../img/link-3.svg"
                                                                                                     alt="lien">  -><em>Lien projet</em></a>
                                </div>
                                <!-- /.media-body -->
                            </div>
                            <!-- /.media -->
                        </div>
                        <!-- /.image-card -->
                    </div>
                </div>
                <!--
                ================================================================== slide coach sportif
                -->
                <div id="collapseTree" class="collapse" role="tabpanel" aria-labelledby="headingTree">
                    <div class="card card-block">
                        <div class="image-card">
                            <div class="media media-back">
                                <div id="carouselExampleSlidesOnlytree" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <img class="d-block img-fluid d-flex" src="../img/sites/coachsportif/pcs.png" alt="coach sportif">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block img-fluid d-flex" src="../img/sites/coachsportif/pcs2.png" alt="coach sportif">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block img-fluid d-flex" src="../img/sites/coachsportif/pcs3.png" alt="coach sportif">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block img-fluid d-flex" src="../img/sites/coachsportif/pcs4.png" alt="coach sportif">
                                        </div>
                                    </div>
                                </div>
                                <div class="media-body ml-5">
                                    <h4 class="mt-1">projectSportCoach</h4>
                                    <p class="mt-3">Projet réaliser avec Bootstrap</p>
                                    <a href="https://gustavofringe.github.io/projectSportsCoach/"><img class="link" src="../img/link-3.svg"
                                                                                                       alt="lien">  -><em>Lien projet</em></a>
                                </div>
                                <!-- /.media-body -->
                            </div>
                            <!-- /.media -->
                        </div>
                        <!-- /.image-card -->
                    </div>
                </div>
                <!--
                ====================================================== slide airbnb
                -->
                <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                    <div class="card card-block">
                        <div class="image-card">
                            <div class="media media-back">
                                <div id="carouselExampleSlidesOnlyFour" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <img class="d-block img-fluid d-flex" src="../img/sites/airbnb/airbnb1.png" alt="airbnb">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block img-fluid d-flex" src="../img/sites/airbnb/airbnb2.png" alt="airbnb">
                                        </div>
                                    </div>
                                </div>
                                <div class="media-body ml-5">
                                    <h4 class="mt-1">projectAirbnb</h4>
                                    <p class="mt-3">Projet réaliser à la main</p>
                                    <a href="https://gustavofringe.github.io/projectAirbnb/"><img class="link" src="../img/link-3.svg"
                                                                                                  alt="lien">  -><em>Lien projet</em></a>
                                </div>
                                <!-- /.media-body -->
                            </div>
                            <!-- /.media -->
                        </div>
                        <!-- /.image-card -->

                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
