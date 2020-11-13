<div class="col-8 my-4 border-left">
<?if($etab->maintenance == 0){?>
    <h2><?= $etab->name ?></h2>
    <?}else{?>
    <p>La carte en ligne bientôt de retour, vous pouvez nous contacter:</p>
    <address>
        <strong><?= $etab->name ?></strong><br>
        <?= $etab->adress ?><br>
        <?= $etab->zip_code ?> <?= $etab->city ?><br>
        Tel: <?= $etab->phone ?>
        Site: <a href="<?= $etab->web_site ?>" target="_blank"><?= $etab->web_site ?></a>
    </address>
<?}?>
</div>
</div>