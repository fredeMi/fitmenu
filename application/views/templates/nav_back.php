<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height:120px">
    <a class="navbar-brand font-weight-bold" href="/back/establishment/<?= $etab->id ?>">Votre établissement <br> <span class="text-primary display-4"><?= $etab->name ?></span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
        <ul class="navbar-nav ml-3">
            <li class="nav-item">
                <h4><a class="nav-link" href="/back/categories/<?= $etab->id ?>">Vos catégories</a></h4>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle ml-2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <h4>Vos produits</h4>
                    </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?foreach($categories as $cat){?>
                    <a class="dropdown-item" href="/back/products/<?= $etab->id ?>/<?= $cat->id ?>"><?= $cat->name ?></a>
                    <?}?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/back/categories/<?= $etab->id ?>">Toutes les catégories</a>
                </div>
            </li>
        </ul>
        <span class="nav-item text-right">
            <a class="nav-link border border-info rounded" href="/back">Tous vos établissements</a>
        </span>

    </div>
</nav>