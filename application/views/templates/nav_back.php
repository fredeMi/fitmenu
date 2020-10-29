<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/back/establishment/<?= $etab->id ?>">Etablissement <p class="text-primary"><?= $etab->name ?></p></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Menus</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Produits</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Personnalisation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/back/categories/<?= $etab->id ?>">Catégories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/back">Tous vos établissements</a>
            </li>
        </ul>
    </div>
</nav>