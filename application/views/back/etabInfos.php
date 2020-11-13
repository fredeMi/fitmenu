<div class="row my-4">
    <h3 class="text-info m-3">Informations actuelles de votre établissement:</h3>
</div>
<div class="row my-4">
    <div class="col-6">
        <form action="/back/registerEtab/" method="post">
            <input type="hidden" name="id" value="<?= $etab->id ?>">
            <label for="name">
                <h4>Nom:</h4>
            </label><br>
            <input class="form-control input-lg" type="text" size="30" name="name" placeholder="Nom Etablissement" value="<?= $etab->name ?>">
            <hr>
            <label for="menu_site">Adresse web personnalisée de votre carte:</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">http://fitmenu.frededev.fr/alacarte/</span>
                </div>
                <input class="form-control input-sm" type="text" size="30" name="menu_site" placeholder="exemplenom.fr" value="<?= $etab->menu_site ?>">
            </div>
        <a href="http://fitmenu.frededev.fr/alacarte/<?= $etab->menu_site ?>" target="_blank">Voir le rendu de votre carte en ligne</a>
    </div>
    <div class="col-6">
        <p>Votre logo actuel:</p>
        <img src="/uploads/logos/<?=$etab->logo?>?t=<?=time()?>" class="img-thumbnail mr-3" alt="logo" width="150">
        <a href="/back/customisation/<?= $etab->id ?>" type="button" class="btn-lg btn-success">Personnaliser votre carte</a>
    </div>
</div>
<hr>
<div class="row">
    <div class="col">
        <label for="adress">Numéro et nom de la voie:</label>
        <input class="form-control" type="text" size="50" name="adress" placeholder="n° voie" value="<?= $etab->adress ?>"><br>
        <div class="mt-3">
            <label for="zip_code">Code postal:</label>
            <input class="form-control" type="text" size="10" name="zip_code" placeholder="00000" value="<?= $etab->zip_code ?>"><br>
            <label for="city">Ville:</label>
            <input class="form-control" type="text" size="40" name="city" placeholder="Ville" value="<?= $etab->city ?>">
        </div>
    </div>
    <div class="col text-left">
        <label for="phone">Téléphone:</label>
        <input class="form-control" type="tel" name="phone" placeholder="1234567890" value="<?= $etab->phone ?>"><br>
        <label for="web_site mt-2">Site web de votre établissement:</label>
        <input class="form-control" type="url" size="30" name="web_site" placeholder="http://votreetablissement.fr" value="<?= $etab->web_site ?>">
    </div>
</div>
<br>
<div class="row">
    <div class="col-6">
        <p>Mode "Site en cours de maintenance":</p>
        <input type="radio" name="maintenance" value="1" <? echo ($etab->maintenance)? "checked" : "" ?>>
        <label>Activer</label>
        <input type="radio" name="maintenance" value="0" <? echo ($etab->maintenance)? "" : "checked" ?>>
        <label>Désactiver</label>
    </div>
    <div class="col-6">
        <button type="submit" class="btn-lg btn-info">Enregistrer les informations</button>
    </div>
</div>
</form>
<hr>
<div class="row mt-4">
    <div class="col">
        <a href="/back/deleteEtab/<?= $etab->id ?>" type="button" class="btn btn-info">Supprimer cet établissement</a>
    </div>
</div>