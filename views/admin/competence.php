<h1>Create project</h1>

<?php
App\Form::open();
App\Form::input('name','Nom',['classDiv'=>'form-group','class'=>'form-control','place'=>'Nom']);
App\Form::input('sentence','Sentence',['classDiv'=>'form-group','class'=>'form-control','place'=>'Sentence']);
App\Form::input('image','Upload d\'image',['type'=>'file','classDiv'=>'form-group','class'=>'form-control','place'=>'']);

?>



    <div class="form-group">
        <label for="category">Title competence</label>
        <select class="form-control" id="category" value="" name="titleCompetenceID">
            <option value="">Title</option>
            <?php foreach ($title_competence as $category): ?>
                <option class="nav-link" value="<?= $category->titleCompetenceID;?>"><?= $category->techno; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="input-group date form-group" id="datepicker" data-provide="datepicker" data-date-format="yyyy-mm-dd">
        <label for="date">Date de creation</label>
        <input type="text" class="form-control" id="date" name="date" readonly>
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>
    </div>
<?php
App\Form::button(['type'=>'submit','class'=>'btn btn-primary','name'=>'Envoyer']);
App\Form::close();
