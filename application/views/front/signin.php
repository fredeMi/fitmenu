<div class="row bg-secondary text-white">
    <div class="col py-4">
        <h1>Fit Menu</h1>
    </div>
    <div class="col py-4 px-4">
        <a href="login" type="button" class="btn btn-info text-light">Se connecter</a>
    </div>
    <div class="col py-4 px-4">
        <a href="signin" type="button" class="btn btn-info text-light">S'inscrire</a>
    </div>
</div>

<div class="form-row my-3">
    <div class="col">
    <h3 class="mb-4">Pour vous inscrire et créer vos cartes sans contact:</h3>
        <form method="post" action="signin/addUser">

            <div class="form-group">
                <label for="email">Email</label><br>
                <input type="email" name="email" value="" size="30"/>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label><br>
                <input type="password" name="password" value="" size="30"/>
            </div>
            <div><input type="submit" value="S'inscrire" /></div>

        </form>
    </div>
    <div class="col mt-5 pt-5">
        <?= $info ?>
    </div>
</div>