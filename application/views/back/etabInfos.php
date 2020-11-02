<div class="row">
    <h3 class="text-info m-3">Informations de votre établissement: <?= $etab->name ?></h3>
</div>
<div class="row">
    <div class="col-6">
        <form action="/back/registerEtab/" method="post">
            <input type="hidden" name="id" value="<?= $etab->id ?>">
            <label for="name">Nom de votre établissement:</label>
            <input type="text" size="30" name="name" placeholder="Nom Etablissement" value="<?= $etab->name ?>">
    </div>
    <div class="col-6">
        <label for="web_site">Adresse web de votre carte:</label>
        <input type="url" size="30" name="web_site" placeholder="exemplenom.fr" value="<?= $etab->web_site ?>">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-8">
        <label for="adress">Numéro et nom de la voie:</label><br>
        <input type="text" size="50" name="adress" placeholder="n° voie" value="<?= $etab->adress ?>"><br>
        <div class="mt-3">
            <label for="zip_code">Code postal:</label><br>
            <input type="text" size="10" name="zip_code" placeholder="00000" value="<?= $etab->zip_code ?>"><br>
            <label for="city">Ville:</label><br>
            <input type="text" size="40" name="city" placeholder="Ville" value="<?= $etab->city ?>">
        </div>
    </div>
    <div class="col-4 text-left">
        <label for="phone">Téléphone:</label><br>
        <input type="tel" name="phone" placeholder="1234567890" value="<?= $etab->phone ?>"><br>
        <label for="web_site mt-2">Site web de votre établissement:</label><br>
        <input type="url" size="30" name="web_site" placeholder="http://votreetablissement.fr" value="<?= $etab->web_site ?>">
    </div>
</div>
<br>
<div class="row">
    <div class="col-6">
        <p>Site en cours de maintenance:</p>
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