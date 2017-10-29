<h1 class="stripe">Mes compétences</h1>
<h2 class="mt-4"><?= $competences[0]->techno; ?></h2>
<div class="border">
    <div class="row mt-4">
        <?php foreach ($system as $sys): ?>
            <div class="col-xl-3">
                <div class="block text-center">
                    <img src="<?= BASE_URL; ?>/public/img/competences/<?= $sys->name; ?>" alt="apple"
                         class="rounded-circle img-thumbnail w-75">
                    <!-- /.rounded-circle -->
                    <p class="text-center"><?= $sys->nameCompetence; ?></p>
                    <p class="text-center font-italic text-muted"><?= $sys->sentence; ?></p>
                </div>
                <!-- /.block -->
            </div>
            <!-- /.col-xl-3 -->
        <?php endforeach; ?>
    </div>
</div>
<?php foreach ($competences as $comp): ?>
    <?php if ($comp->titleCompetenceID != 1): ?>
        <h2 class="mt-3"><?= $comp->techno; ?></h2>
        <div class="border">
            <div class="row mt-4">
                <?php for ($i = 0; $i < count($tab[$comp->titleCompetenceID]['image']); ++$i): ?>
                    <?php for ($i = 0; $i < count($tab[$comp->titleCompetenceID]['name']); ++$i): ?>
                        <div class="col-xl-2">
                            <div class="block text-center">
                                <img src="<?= BASE_URL; ?>/public/img/competences/<?= $tab[$comp->titleCompetenceID]['image'][$i]; ?>"
                                     alt="<?= $tab[$comp->titleCompetenceID]['name'][$i]; ?>"
                                     class="img-thumbnail language">
                                <!-- /.rounded-circle -->
                                <p class="text-center"><?= $tab[$comp->titleCompetenceID]['name'][$i]; ?></p>
                                <p class="text-center font-italic text-muted"><?= $comp->sentence; ?></p>
                            </div>
                            <!-- /.block -->
                        </div>
                    <?php endfor; ?>
                <?php endfor; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>
