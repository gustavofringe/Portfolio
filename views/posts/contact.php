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
<h1 class="stripe">Me contacter</h1>
<form method="post">
    <div class="field">
        <label for="lastname" class="field-label">Votre nom</label>
        <input type="text" id="lastname" name="lastname" class="field-input">
    </div>
    <!-- /.field -->
    <div class="field">
        <label for="firstname" class="field-label">Votre prénom</label>
        <input type="text" id="firstname" name="firstname" class="field-input">
    </div>
    <!-- /.field -->
    <div class="field">
        <label for="email" class="field-label">Votre email</label>
        <input type="email" id="email" name="email" class="field-input">
    </div>
    <!-- /.field -->
    <div class="field">
        <label for="phone" class="field-label">Votre téléphone</label>
        <input type="tel" id="phone" name="phone" class="field-input">
    </div>
    <!-- /.field -->
    <div class="field">
        <label for="society" class="field-label">Votre société</label>
        <input type="text" id="society" name="society" class="field-input">
    </div>
    <!-- /.field -->
    <div>
        <label for="message" class="mt-5 message">Votre message</label>
        <textarea name="message" id="message" cols="50" rows="10"></textarea>
        <!-- /# -->
    </div>
    <!-- /.field -->
    <button class="btn btn-secondary mt-4 mb-4">Valider</button>
</form>
