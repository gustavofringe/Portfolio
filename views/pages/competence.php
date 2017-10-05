<h1 class="stripe">Mes compétences</h1>
<?php foreach ($competences as $competence): ?>
<h2 class="mt-3"><?=$competence->techno; ?></h2>
<div class="border">
    <div class="row mt-4">
        <div class="col-xl-2">
            <div class="block text-center">
                <img src="<?= BASE_URL;?>/public/img/competences/<?= $competence->images;?>" alt="html" class="img-thumbnail language">
                <!-- /.rounded-circle -->
                <p class="text-center"><?=$competence->name;?></p>
                <p class="text-center font-italic text-muted"><?= $date; ?></p>
            </div>
            <!-- /.block -->
        </div>
    </div>
</div>
<?php endforeach;?>
