<h1 class="mt-3 stripe">Mon portfolio</h1>
<div id="accordion" role="tablist" aria-multiselectable="true">
    <div class="row mt-5 mb-3 justify-content-sm-center">
        <?php foreach ($realisations as $realisation): ?>
        <div class="col-lg-3 col-sm-auto mb-3">
            <div class="d-flex justify-content-center">
                <div class="card" style="width: 242px;" role="tab" id="heading<?= $realisation->workID;?>">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $realisation->workID;?>"
                       aria-expanded="true" aria-controls="collapse<?= $realisation->workID;?>">
                        <div class="content-image d-flex" role="img" aria-label="archiduchesse">
                            <?php print_r($images->folder); ?>
                            <?php print_r($realisation->workID); ?>

                                <img class="card-img-top" style="width: 225px" src="<?= BASE_URL; ?>/public/img/<?= $images->folder; ?>/<?= $images->name; ?>" alt="">


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


    <?php foreach ($realisations as $realisation): ?>
    <!--/.col-xl-3-->
    <div class="card hidden-lg-down">
    <div id="collapse<?= $realisation->workID;?>" class="collapse" role="tabpanel" aria-labelledby="heading<?= $realisation->workID;?>">
        <div class="card card-block">
            <div class="image-card">
                <div class="media media-back">
                    <div id="carouselExampleSlidesOnly<?= $realisation->workID;?>" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block img-fluid d-flex"
                                     src="<?= BASE_URL; ?>/public/img/<?= $images[$realisation->workID]->folder; ?>/<?= $images[$realisation->workID]->name; ?>"
                                     alt="<?= $images[$realisation->workID]->name; ?>">
                            </div>
                            <?php for ($i = 0; $i < $count; $i++): ?>
                            <div class="carousel-item">
                                    <img class="d-block img-fluid d-flex"
                                         src="<?= BASE_URL; ?>/public/img/<?= $images[$i]->folder; ?>/<?= $images[$i]->name; ?>"
                                         alt="<?= $images[$i]->name; ?>">
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="media-body ml-3">
                        <h4 class="mt-1"><?= $realisation->title; ?></h4>
                        <p class="mt-3"><?= $realisation->techno; ?></p>
                        <a href="<?= $realisation->link; ?>"><img class="link"
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
    <?php endforeach;?>
</div>
</div>
<!-- /.card -->

