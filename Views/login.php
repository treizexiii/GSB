<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h1>Connexion</h1>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="login">E-mail :</label>
                        <input class="form-control" type="text" name="login" id="">
                        <?php if (!empty($allData['login'])) : ?>
                            <p style="color: red;"><?= $allData['login'] ?></p>
                        <?php endif ?>
                        <?php if (!empty($allData['user'])) : ?>
                            <div class="alert alert-danger" style="margin-top:5px;" role="alert">
                                <?= $allData['user'] ?>
                            </div>
                        <?php endif ?>
                        <label for="password">Mot de passe :</label>
                        <input class="form-control" type="password" name="password" id="">
                        <?php if (!empty($allData['password'])) : ?>
                            <p style="color: red;"><?= $allData['password'] ?></p>
                        <?php endif ?>
                        <?php if (!empty($allData['passVerif'])) : ?>
                            <div class="alert alert-danger" style="margin-top:5px;" role="alert">
                                <?= $allData['passVerif'] ?>
                            </div>
                        <?php endif ?>
                        <button class="btn btn-primary" type="submit" style="margin-top:5px;" name="log">Se Connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>