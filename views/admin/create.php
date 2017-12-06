<h1>Create project</h1>
<?php
App\Form::open();
App\Form::input('title','Titre',['classDiv'=>'form-group','class'=>'form-control','place'=>'titre'],'Titre','','');
App\Form::input('url','Url',['classDiv'=>'form-group','class'=>'form-control','place'=>'titre'],'Url','','');
App\Form::input('folder','Dossier',['classDiv'=>'form-group','class'=>'form-control','place'=>'titre'],'Dossier','','');
App\Form::input('subtitle','Sous-titre',['classDiv'=>'form-group','class'=>'form-control','place'=>'titre'],'Sous-titre','','');
App\Form::input('techno','Technologie',['classDiv'=>'form-group','class'=>'form-control','place'=>'titre'],'Technologie','','');
App\Form::input('link','Lien',['classDiv'=>'form-group','class'=>'form-control','place'=>'titre'],'Lien','','');
?>
<!-- /.form-group -->
<div class="date form-group" id="datepicker" data-provide="datepicker" data-date-format="yyyy-mm-dd">
    <label for="date">Date de creation</label>
    <input type="text" class="form-control" id="date" name="date" readonly>
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</div>
<?php
App\Form::input('image[]','Upload d\'image',['type'=>'file','classDiv'=>'form-group','class'=>'form-control','place'=>''],'','','multiple');
App\Form::input('content','Contenu',['type'=>'textarea','classDiv'=>'form-group','class'=>'form-control','col'=>10,'row'=>10],'','','');
App\Form::button(['type'=>'submit','class'=>'btn btn-primary','name'=>'Envoyer']);
App\Form::close();
?>
