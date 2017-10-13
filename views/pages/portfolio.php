<h1 class="mt-3 stripe">Mon portfolio</h1>
<div id="accordion" role="tablist" aria-multiselectable="true">
    <div class="row mt-5 mb-3 justify-content-sm-center">
        <?php foreach ($realisations as $realisation): ?>
            <div class="col-lg-3 col-sm-auto mb-3">
                <div class="d-flex justify-content-center">
                    <div class="card" role="tab" id="heading<?= $realisation->workID; ?>">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $realisation->workID; ?>"
                           aria-expanded="true" aria-controls="collapse<?= $realisation->workID; ?>">
                            <div class="content-image d-flex" role="img" aria-label="archiduchesse">
                                <img class="card-img-top image" id="image"
                                     src="<?= BASE_URL; ?>/public/img/<?= $realisation->folder; ?>/<?= $realisation->name; ?>"
                                     alt="">
                            </div>
                        </a>
                        <div class="card-block">
                            <h2 class="card-title"><?= $realisation->title; ?></h2>
                            <p class="card-text"><?= $realisation->subtitle; ?></p>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


    <!--/.col-xl-3-->
    <div class="card hidden-lg-down">
        <?php foreach ($realisations as $k => $v): ?>
            <div id="collapse<?= $v->workID; ?>" class="collapse" role="tabpanel"
                 aria-labelledby="heading<?= $v->workID; ?>">
                <div class="card card-block">
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
                            <div class="media-body ml-3">
                                <h4 class="mt-1"><?= $v->title; ?></h4>
                                <p class="mt-3"><?= $v->techno; ?></p>
                                <a href="<?= $v->link; ?>"><img class="link"
                                                                src="<?= BASE_URL; ?>/public/img/link-3.svg"
                                                                alt="lien"> -><em>Lien projet</em></a>
                            </div>
                            <!-- /.media-body -->
                        </div>
                        <!-- /.media -->
                    </div>
                    <!-- /.image-card -->

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- /.card -->

