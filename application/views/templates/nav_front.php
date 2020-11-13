<div class="row">
    <nav class="navbar navbar-light navbar-expand-md flex-column">
        <a class="nav-link active bg-dark text-light rounded" href="/alacarte/<?= $etab->menu_site ?>">
            <h3 class="border rounded px-3"><?= $etab->name ?></h3><span>votre carte en ligne</span>
        </a>
        <img src="/uploads/logos/<?= $etab->logo ?>?t=<?= time() ?>" alt="logo" class="my-4" width="100">
        <?if($etab->maintenance == 0){?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav collapse navbar-collapse flex-column mr-auto" id="navbarSupportedContent">
            <?foreach($categories as $category){?>
            <li class="nav-item">
                <a class="nav-link active text-left font-italic" href="/front/card/<?= $etab->id ?>/<?= $category->id ?>">
                    <h4><?= $category->name ?></h4>
                </a>
            </li>
            <?}?>
        </ul>
        <?}else{?>
            <h3>carte en cours de modification</h3>
            <?}?>
    </nav>