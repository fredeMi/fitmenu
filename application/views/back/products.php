<div class="row">
    <h2 class="text-info">Produits de la catégorie <?= $cat->name ?></h2>
</div>
<div class="row">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nom du produit</th>
                <th scope="col">Description</th>
                <th scope="col">Prix</th>
                <th scope="col">Mis en avant</th>
                <th scope="col">Rupture de stock</th>
                <th scope="col">Ordre d'affichage</th>
                <th scope="col">Image</th>
                <th scope="col">Modifier le produit</th>
                <th scope="col">Supprimer le produit</th>
            </tr>
        </thead>
        <tbody>
            <!-- affichage ligne pour chaque produit -->
            <?
            foreach($products as $prod){
            ?>
            <tr>
                <td><?= $prod->name ?></td>
                <td><?= $prod->description ?></td>
                <td><?= $prod->price ?></td>
                <td><?= $prod->highlight ?></td>
                <td><?= $prod->sold_out ?></td>
                <td><?= $prod->rank ?></td>
                <td><img src="<?= $prod->image ?>" alt="<?= $prod->name ?>" width="50"></td>
                <td><a href="/back/product/<?=$etab->id?>/<?=$prod->cat_id?>/<?= $prod->id ?>" type="button" class="btn btn-info">Modifier</a></td>
                <td><a href="/back/deleteProd/<?=$etab->id?>/<?=$prod->cat_id?>/<?= $prod->id ?>/" type="button" class="btn btn-warning btn-sm">Supprimer</a></td>
            </tr>
            <?}?>
        </tbody>
    </table>
</div>
<div class="row">
<button type="button" class="btn btn-success btn-lg"><a class="text-light" href="/back/product/<?=$etab->id?>/<?= $cat->id ?>">Créer un nouveau produit</a></button>
</div>