
<h1 class="stripe">Mes compétences</h1>
<h2 class="mt-4"><?= $competences[1]->techno; ?></h2>
<div class="border">
    <div class="row mt-4">
        <?php foreach ($system as $sys): ?>
        <div class="col-xl-3">
            <div class="block text-center">
                <img src="<?= BASE_URL; ?>/public/img/competences/<?= $sys->images; ?>" alt="apple"
                     class="rounded-circle img-thumbnail w-75">
                <!-- /.rounded-circle -->
                <p class="text-center"><?= $sys->name; ?></p>
                <p class="text-center font-italic text-muted"><?= $sys->sentence; ?></p>
            </div>
            <!-- /.block -->
        </div>
        <!-- /.col-xl-3 -->
        <?php endforeach; ?>
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
