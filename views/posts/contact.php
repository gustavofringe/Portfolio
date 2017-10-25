
<h1 class="stripe">Me contacter</h1>
<?php
App\Form::open();
App\Form::input('lastname','Votre Nom',['classLabel'=>'field-label','classDiv'=>'field','class'=>'field-input']);
App\Form::input('firstname','Votre prénom',['classLabel'=>'field-label','classDiv'=>'field','class'=>'field-input']);
App\Form::input('email','Votre email',['type'=>'email','classLabel'=>'field-label','classDiv'=>'field','class'=>'field-input']);
App\Form::input('phone','Votre téléphone',['type'=>'tel','classLabel'=>'field-label','classDiv'=>'field','class'=>'field-input']);
App\Form::input('society','Votre société',['classLabel'=>'field-label','classDiv'=>'field','class'=>'field-input']);
App\Form::input('msg','Votre message',['row'=>10,'col'=>50,'classLabel'=>'mt-5 message','type'=>'textarea','classDiv'=>'form-group','class'=>'form-control']);
App\Form::button(['type'=>'submit','class'=>'btn btn-secondary','name'=>'Envoyer']);
App\Form::close();
?>

