<div class="row">
    <div class="col-md-12">
        <form action="" method="post">
        <h1>Ajout des notes de frais</h1>
            <div class="form-group">
                <label for="visiteur">visiteur :</label>
                <select name="visiteur" class="form-control">
                    <?php foreach ($allData['visiteurs'] as $visiteur) : ?>
                        <option value="<?= $visiteur['id'] ?>"><?= $visiteur['nom'] ?> <?= $visiteur['prenom'] ?></option>
                    <?php endforeach ?>
                </select>
                <label for="mois">Mois :</label>
                <input type="text" name="mois" class="form-control">
                <label for="forfait">Forfait :</label>
                <select name="forfait" class="form-control">
                    <?php foreach ($allData['libelles'] as $libelle) : ?>
                        <option value="<?= $libelle['id'] ?>"><?= $libelle['libelle'] ?></option>
                    <?php endforeach ?>
                </select>
                <label for="quantite">Quantité :</label>
                <input type="text" name="quantite" class="form-control">
                <label for="justificatifs">Nombre de justificatifs :</label>
                <input type="text" name="justificatifs" class="form-control">
            </div>
        </form>
    </div>
</div>