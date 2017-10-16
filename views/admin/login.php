<?php
App\Form::open();
App\Form::csrfInput();
App\Form::input(['div'=>'form-group','label'=>'Nom d\'utilisateur', 'type'=>'text','class'=>'form-control'],'username');
App\Form::input(['div'=>'form-group','label'=>'Password', 'type'=>'password','class'=>'form-control'],'password');
App\Form::button(['type'=>'submit','class'=>'btn btn-default','name'=>'Se connecter']);
App\Form::close();
?>
