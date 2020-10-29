<form method="post" action="/back/updateCat/" class="mt-4">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label>Nom de la catégorie</label>
      <input type="text" class="form-control" value="<?= $cat->name ?>">
    </div>
    <div class="form-group col-md-8">
      <label>Description</label>
      <input type="text" class="form-control" value="<?= $cat->description ?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer les informations</button>
</form>