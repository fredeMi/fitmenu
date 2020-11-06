<div class="row my-4">
    <h3 class="text-info m-3">Personnalisation de votre carte:</h3>
</div>
<div class="row my-4">
    <div class="col-6">
        <img src="<?= $etab->logo ?>" alt="logo" width="250">
        <p>Votre logo actuel</p>
        <?= $error; ?>
        <?= form_open_multipart('back/do_upload'); ?>
            <label for="userfile">Pour changer le logo:</label><br>
            <input type="file" class="btn-info" name="userfile" size="40" />
            <br /><br />
            <input type="submit" class="btn-success" value="Enregistrer votre nouveau logo" />
        </form>
    </div>
    <div class="col-6">
        <form action="back/registerDescription" method="post">
            <label for="description">Texte de description de votre établissement (sera affiché en "couverture" de votre carte)</label>
            <textarea type="text" class="form-control" name="description" rows="15" cols="30">
            </textarea>
            <input type="submit" class="btn-info" value="Enregistrer votre description">
        </form>
    </div>
</div>