<h1>Create project</h1>
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <p>Vous n'avez pas rempli le formulaire correctement</p>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li>
                    <?= $error; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<form action="" method="post"  enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" class="form-control" id="link" placeholder="Nom" name="name">
    </div>
    <div class="form-group">
        <label for="image">Upload image</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <!-- /.form-group -->

    <div class="form-group">
        <label for="category">Title competence</label>
        <select class="form-control" id="category" value="" name="competence_id">
            <option value="">Title</option>
            <?php foreach ($title_competence as $category): ?>
                <option class="nav-link" value="<?= $category->id?>"><?= $category->techno; ?></option>
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
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
