<div class="row">
    <nav class="navbar navbar-light navbar-expand-md flex-column">
        <a class="nav-link active text-dark" href="/alacarte/<?= $etab->menu_site ?>">
            <h3><?= $etab->name ?>:</h3> votre carte en ligne
        </a>
        <img src="/uploads/logos/logo_<?=$etab->id?>" alt="logo" width="100">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <ul class="navbar-nav collapse navbar-collapse flex-column mr-auto" id="navbarSupportedContent">
                    <?foreach($categories as $category){?>
                    <li class="nav-item">
                        <a class="nav-link active" href="/front/card/<?= $etab->id ?>/<?= $category->id ?>">
                            <h4><?= $category->name ?></h4>
                        </a>
                    </li>
                    <?}?>
            </ul>
    </nav>