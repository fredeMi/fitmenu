<div class="row">
    <h2 class="text-info">Tableau de bord</h2>
</div>
<div class="row">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nom resto</th>
                <th scope="col">Adresse</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Site web</th>
                <th scope="col">Mode maintenance</th>
                <th scope="col">Modifier les infos</th>
            </tr>
        </thead>
        <tbody>
            <!-- affichage ligne pour chaque etablissement du user connecté -->
            <?
            foreach($etabs as $etab){
            ?>
            <tr>
                <td><?= $etab->name ?></td>
                <td><?= $etab->adress ?> <?= $etab->zip_code ?> <?= $etab->city ?></td>
                <td><?= $etab->phone ?></td>
                <td><?= $etab->web_site ?></td>
                <td>
                    <? echo ($etab->maintenance)? "Activé (carte non visible de vos clients)" : "Désactivé (carte visible de vos clients)" ?>
                </td>
                <td><a href="/back/establishment/<?= $etab->id ?>" type="button" class="btn btn-info">Modifier</a></td>
            </tr>
            <?}?>
        </tbody>
    </table>
</div>
<div class="row">
<button type="button" class="btn btn-success btn-lg"><a class="text-light" href="/back/createEtab/">Créer un nouvel établissement</a></button>
</div>