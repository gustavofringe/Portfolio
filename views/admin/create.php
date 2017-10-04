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
        <label for="title">Titre</label>
        <input type="text" class="form-control" id="title" placeholder="Title" name="title">
    </div>
    <div class="form-group">
        <label for="url">Url</label>
        <input type="text" class="form-control" id="url" placeholder="Url" name="url">
    </div>
    <div class="form-group">
        <label for="folder">Folder</label>
        <input type="text" class="form-control" id="folder" placeholder="Folder" name="folder">
    </div>
    <div class="form-group">
        <label for="subtitle">Sous-titre</label>
        <input type="text" class="form-control" id="subtitle" placeholder="Sous-titre" name="subtitle">
    </div>
    <div class="form-group">
        <label for="techno">Techno</label>
        <input type="text" class="form-control" id="techno" placeholder="Techno" name="techno">
    </div>
    <div class="form-group">
        <label for="link">Link</label>
        <input type="text" class="form-control" id="link" placeholder="Link" name="link">
    </div>
    <div class="form-group">
        <label for="image">Upload image</label>
        <input type="file" class="form-control-file" id="image" name="image[]" multiple>
    </div>
    <!-- /.form-group -->
    <div class="input-group date form-group" id="datepicker" data-provide="datepicker" data-date-format="yyyy-mm-dd">
        <label for="date">Date de creation</label>
        <input type="text" class="form-control" id="date" name="date" readonly>
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <!-- /# -->
    </div>
    <!-- /.form-group -->
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
