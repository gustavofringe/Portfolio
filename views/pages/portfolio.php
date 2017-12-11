<h1 class="mt-3 stripe">Mes réalisations</h1>
<!--
=========================VIVE LES BOUCLES ;)
-->
<div id="accordion" role="tablist" aria-multiselectable="true">
    <div class="row mt-5 mb-3 justify-content-sm-center">
        <?php foreach ($realisations as $k => $v): ?>
            <!--
        ============================================================================ archiduchesse
            -->
        <div class="col-md-2 col-sm-auto mb-3">
            <div class="d-flex justify-content-center">
                <div class="card" style="width: 15rem; height: 25rem" role="tab" id="heading<?php echo $v->workID; ?>">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $v->workID; ?>"
                       aria-expanded="true" aria-controls="collapse<?php echo $v->workID; ?>">
                        <div class="first content-image d-flex" role="img" aria-label="archiduchesse">

                            <div class="image">
                                <img class="card-img-top image link" id="image"
                                     src="<?php echo BASE_URL; ?>/public/img/sites/<?php echo $v->folder; ?>/<?php echo $v->name; ?>"
                                     alt="<?php echo $v->name; ?>" style="width: 100%">
                            </div>

                        </div>
                    </a>
                    <div class="card-block">
                        <h4 class="card-title"><?php echo $v->title; ?></h4>
                        <p class="card-text"><?= $v->subtitle; ?></p>
                        <p class="mt-3"><?= $v->techno; ?></p>

                    </div>

                </div>
            </div>
        </div>
        <!--/.col-xl-3-->

    <!--
    ====================================================collapse & slider first level
    =============================== slide archiduchesse
    -->
    <div class="card hidden-md-down" style="height: 25rem">
        <div id="collapse<?= $v->workID; ?>" class="collapse" role="tabpanel" aria-labelledby="heading<?= $v->workID; ?>">
            <div class="card card-block">
                <div class="image-card">
                    <div class="media media-back">
                        <div class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img class="d-block"
                                         src="<?= BASE_URL; ?>/public/img/sites/<?= $v->folder; ?>/<?= $v->name; ?>"
                                         alt="<?= $v->name; ?>">
                                </div>
                                <?php for ($i = 0; $i < count($tab[$v->workID]['name']); ++$i): ?>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid d-flex"
                                             src="<?= BASE_URL; ?>/public/img/sites/<?= $v->folder; ?>/<?= $tab[$v->workID]['name'][$i]; ?>"
                                             alt="<?= $tab[$v->workID]['name'][$i]; ?>">
                                    </div>
                                <?php endfor; ?>

                            </div>
                            <div class="mt-4"><a class="linkB mt-3" href="<?= $v->link; ?>">
                                    <img class="link linked" src="<?= BASE_URL; ?>/public/img/link-3.svg" alt="lien">
                                    -><em>Lien
                                        projet</em>
                                </a></div>
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
        <?php endforeach;?>
    </div>
</div>