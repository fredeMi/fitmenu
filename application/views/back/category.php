<form method="post" action="/back/registerCat/" class="mt-4">
  <div class="form-row">
    <div class="form-group col-md-4">
        <input type="hidden" name="id" value="<?= $cat->id ?>">
        <input type="hidden" name="estab_id" value="<?= $cat->estab_id ?>">
      <label>Nom de la catégorie</label>
      <input type="text" name="name" class="form-control" placeholder="Nom catégorie" value="<?= $cat->name ?>">
    </div>
    <div class="form-group col-md-8">
      <label>Description</label>
      <input type="text" name="description" class="form-control" placeholder="Description" value="<?= $cat->description ?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer les informations</button>
</form>