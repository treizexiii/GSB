    <form action="<?php Url::$url ?>frais" method="post">
        <div class="form-group">
            <label for="user">
                <h3>Selectionner un visiteur</h3>
            </label>
            <select name="user" class="form-control">
                <?php foreach ($allData['visiteur'] as $visiteur) : ?>
                    <option value="<?= $visiteur['id'] ?>"><?= $visiteur['nom'] ?> <?= $visiteur['prenom'] ?></option>
                <?php endforeach ?>
            </select>
            <label for="etat">
                <h4>Etat de remboursement</h2>
            </label>
            <select name="etat" class="form-control">
                <option>tous</option>
                <?php foreach ($allData['etat'] as $etat) : ?>
                    <option value="<?= $etat['id'] ?>"><?= $etat['libelle'] ?></option>
                <?php endforeach ?>
            </select>
            <button class="btn btn-primary" name="userSelected" type="submit" style="margin-top: 1em;">Valider</button>
        </div>
    </form>