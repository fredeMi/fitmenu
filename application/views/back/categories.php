<div class="row mx-0 my-4">
    <h2 class="text-info">Catégories de votre carte</h2>
</div>
<div class="row mx-0 my-4">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nom de la catégorie</th>
                <th scope="col">Description</th>
                <th scope="col">Ordre d'affichage dans la carte</th>
                <th scope="col">Image</th>
                <th scope="col">Modifier la catégorie</th>
                <th scope="col">Voir les produits de la catégorie</th>
                <th scope="col">Supprimer la catégorie</th>
            </tr>
        </thead>
        <tbody>
            <!-- affichage ligne pour chaque catégorie -->
            <?
            foreach($categories as $cat){
            ?>
            <tr>
                <td><?= $cat->name ?></td>
                <td><?= $cat->description ?></td>
                <td><?= $cat->rank ?></td>
                <td><img src="<?= $cat->image ?>" alt="<?= $cat->name ?>" width="50"></td>
                <td><a href="/back/category/<?= $etab->id ?>/<?= $cat->id ?>" type="button" class="btn btn-info">Modifier</a></td>
                <td><a href="/back/products/<?= $etab->id ?>/<?= $cat->id ?>" type="button" class="btn btn-success">Les produits</a></td>
                <td><a href="/back/deleteCat/<?= $etab->id ?>/<?= $cat->id ?>" type="button" class="btn btn-warning btn-sm">Supprimer</a></td>
            </tr>
            <?}?>
        </tbody>
    </table>
</div>
<div class="row mx-0">
<button type="button" class="btn btn-success btn-lg"><a class="text-light" href="/back/category/<?= $etab->id ?>">Créer une nouvelle catégorie</a></button>
</div>