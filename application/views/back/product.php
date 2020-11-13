<form method="post" action="/back/registerProd/<?= $etab->id ?>" class="mt-4">
  <div class="form-row">
    <div class="form-group col-md-4">
        <input type="hidden" name="id" value="<?= $prod->id ?>">
        <input type="hidden" name="cat_id" value="<?= $prod->cat_id ?>">
      <label>Nom du produit</label>
      <input type="text" name="name" class="form-control" placeholder="Nom produit" value="<?= $prod->name ?>">
    </div>
    <div class="form-group col-md-8">
      <label>Description</label>
      <input type="text" name="description" class="form-control" placeholder="Description" value="<?= $prod->description ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label>Prix</label>
      <input type="number" name="price" class="form-control" step="0.01" placeholder="00.00 €" value="<?= $prod->price ?>">
    </div>
    <div class="form-group col ml-5 mt-3">
        <p>Rupture de stock</p>
      <input type="radio" name="sold_out" value="1" <? echo ($prod->sold_out)? "checked" : "" ?>>
      <label>Oui (désactive l'affichage du produit dans la carte)</label><br>
      <input type="radio" name="sold_out" value="0" <? echo ($prod->sold_out)? "" : "checked" ?>>
      <label>Non (l'affichage du produit dans la carte est activé)</label>

    </div>
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer les informations</button>
</form>