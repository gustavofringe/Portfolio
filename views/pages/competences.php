
<h1 class="stripe">Mes compétences</h1>
<h2 class="mt-3"><?= $competences[1]->techno; ?></h2>
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
                </div>
                <!-- /.block -->
            </div>
        <?php endforeach; ?>
    </div>
</div>
