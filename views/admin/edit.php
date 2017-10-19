<h1>Editer un contenu</h1>
<?php
App\Form::open();
App\Form::csrfInput();
foreach ($work as $k=>$v) {
    App\Form::input($k, $k, ['classDiv' => 'form-group', 'class' => 'form-control'], $v);
}
App\Form::close();
?>
<form action="<?= BASE_URL;?>/admin" method="post">
<?php for ($i = 0; $i < count($tab[$work->workID]['name']); ++$i): ?>
    <button  name="test" value="<?php echo $tab[$work->workID]['name'][$i];?>">
        <img class=""
             src="<?= BASE_URL; ?>/public/img/<?= $work->folder; ?>/<?= $tab[$work->workID]['name'][$i]; ?>"
             alt="<?= $tab[$work->workID]['name'][$i]; ?>">
    </button>
<?php endfor; ?>
</form>
