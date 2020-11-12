<div class="row bg-secondary text-white">
    <h1>Fit Menu</h1>
</div>

<div class="form-row my-3">
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