<div class="row">
    <div class="col-md-12">
        <div class="col-md-8">
            <h1>Créer un compte</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="firstName">Prénom :</label>
                    <input type="text" name="firstName" class="form-control">
                    <?php if (!empty($allData['firstName'])) : ?>
                        <p style="color: red;"><?= $allData['firstName'] ?></p>
                    <?php endif ?>
                    <label for="lastName">Nom :</label>
                    <input type="text" name="lastName" class="form-control">
                    <?php if (!empty($allData['lastName'])) : ?>
                        <p style="color: red;"><?= $allData['lastName'] ?></p>
                    <?php endif ?>
                    <label for="email">E-mail :</label>
                    <input type="text" name="email" class="form-control">
                    <?php if (!empty($allData['email'])) : ?>
                        <p style="color: red;"><?= $allData['email'] ?></p>
                    <?php endif ?>
                    <label for="password">Mot de passe :</label>
                    <input type="text" name="password" class="form-control">
                    <?php if (!empty($allData['password'])) : ?>
                        <p style="color: red;"><?= $allData['password'] ?></p>
                    <?php endif ?>
                    <div style="text-align: center; margin-top: 7px;">
                        <input type="submit" class="btn btn-primary" name="send" value="S'enregistrer">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>