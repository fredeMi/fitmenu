<div class="row my-4">
    <h2 class="text-info">Vos établissements</h2>
</div>
<div class="row my-4">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nom de l'établissement</th>
                <th scope="col">Adresse</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Site web</th>
                <th scope="col">Mode maintenance</th>
                <th scope="col">Modifier vos infos</th>
                <th scope="col">Catégories de votre carte</th>
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
                <td><a href="/back/establishment/<?= $etab->id ?>" type="button" class="btn btn-info">Gérer la présentation de votre carte</a></td>
                <td><a href="/back/categories/<?= $etab->id ?>" type="button" class="btn btn-info">Gérer vos catégories de produits</a></td>
            </tr>
            <?}?>
        </tbody>
    </table>
</div>
<div class="row my-4">
<button type="button" class="btn btn-success btn-lg"><a class="text-light" href="/back/establishment/">Créer un nouvel établissement</a></button>
</div>