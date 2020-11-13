<div class="row mx-0 bg-secondary text-white">
    <div class="col py-4">
    <a href="http://fitmenu.frededev.fr/" class="btn btn-lg btn-outline-light"> Fit Menu </a>
    </div>
    <div class="col py-4 px-4">
        <a href="login" type="button" class="btn btn-info text-light">Se connecter</a>
    </div>
    <div class="col py-4 px-4">
        <a href="signin" type="button" class="btn btn-info text-light">S'inscrire</a>
    </div>
</div>

<div class="form-row mx-0 mt-3 bg-light text-dark p-4">
    <div class="col">
    <h3 class="mb-4">Pour accéder à votre tableau de bord:</h3>
        <form method="post" action="login/checkUser">

            <div class="form-group">
                <label for="email">Identifiant</label><br>
                <input type="email" name="email" value="" size="30"/>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label><br>
                <input type="password" name="password" value="" size="30"/>
            </div>
            <div><input type="submit" value="Se connecter" /></div>

        </form>
    </div>
    <div class="col mt-5 pt-5">
        <?= $infoLog ?>
    </div>
</div>