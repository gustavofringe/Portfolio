<h1>Se connecter</h1>
<?php
App\Form::open();
App\Form::input('username','Nom d\'utilisateur',['classDiv'=>'form-group','class'=>'form-control'],'Nom d\'utilisateur');
App\Form::input('password','Mot de passe',['classDiv'=>'form-group','type'=>'password','class'=>'form-control']);
App\Form::button(['type'=>'submit','class'=>'btn btn-default','name'=>'Se connecter']);
App\Form::close();
?>
