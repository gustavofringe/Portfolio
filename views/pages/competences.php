<?php print_r($competences) ?>
<h1 class="stripe">Mes compétences</h1>
<div class="border">

    <h2 class="mt-4"><?= $competences[$id]->techno; ?></h2>
    <div class="row mt-4">
        <?php foreach ($competences as $competence): ?>
        <div class="col-xl-3">
            <div class="block text-center">
                <img src="<?= BASE_URL; ?>/public/img/competences/<?= $competences[$competence->titleCompetenceID]->images; ?>" alt="apple"
                     class="rounded-circle img-thumbnail w-75">
                <!-- /.rounded-circle -->
                <p class="text-center"><?= $competences[$competence->titleCompetenceID]->name; ?></p>
                <p class="text-center font-italic text-muted"><?= $competences[$competence->titleCompetenceID]->sentence; ?></p>
            </div>

            <!-- /.block -->

        </div>
        <?php endforeach; ?>
        <!-- /.col-xl-3 -->
    </div>
</div>

<h2 class="mt-3"><?= $competences[$id]->techno; ?></h2>
<div class="border">
    <div class="row mt-4">
        <?php foreach ($competences as $competence): ?>
            <div class="col-xl-2">
                <div class="block text-center">
                    <img src="<?= BASE_URL; ?>/public/img/competences/<?= $competence->images; ?>"
                         alt="<?= $competence->name; ?>"
                         class="img-thumbnail language">
                    <!-- /.rounded-circle -->
                    <p class="text-center"><?= $competence->name; ?></p>
                    <p class="text-center font-italic text-muted"><?= $competence->sentence; ?></p>
                </div>
                <!-- /.block -->
            </div>
        <?php endforeach; ?>
    </div>
</div>
