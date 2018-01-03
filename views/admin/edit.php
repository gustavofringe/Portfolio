<h1>Editer un contenu</h1>
<?php
App\Form::open();
foreach ($work as $k=>$v) {
    App\Form::input($k, $k, ['classDiv' => 'form-group', 'class' => 'form-control'],'', $v);
}
App\Form::input('image[]','Upload d\'image',['type'=>'file','classDiv'=>'form-group','class'=>'form-control','place'=>''],'','','multiple');

App\Form::button(['type'=>'submit','class'=>'btn btn-primary mb-5','name'=>'Envoyer']);
App\Form::close();
?>
<form action="<?= BASE_URL;?>/admin" method="post">
    <?php if(isset($tab[$work->workID]['name'])):?>
<?php for ($i = 0; $i < count($tab[$work->workID]['name']); ++$i): ?>
    <a href="<?php echo BASE_URL;?>/scleroseenplaque/deleteImage/<?php echo $tab[$work->workID]['id'][$i];?>" onclick="return confirm('Sûr de vouloir supprimer?')">
        <img class=""
             src="<?= BASE_URL; ?>/public/img/sites/<?= $work->folder; ?>/<?= $tab[$work->workID]['name'][$i]; ?>"
             alt="<?= $tab[$work->workID]['name'][$i]; ?>">
    </a>
<?php endfor; ?>
    <?php endif;?>
</form>
<?php
?>