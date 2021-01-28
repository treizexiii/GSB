<div class="row mb-3">
    <div class="col-md-8">
        <h1>Fiche Visiteur</h1>
        <div class="form-group">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" id="" class="form-control" placeholder="<?= $allData[0]['nom'] ?>">
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" name="prenom" id="" class="form-control" placeholder="<?= $allData[0]['prenom'] ?>">
                </div>
                <div class="mb-3">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" name="adresse" id="" class="form-control" placeholder="<?= $allData[0]['adresse'] ?>">
                </div>
                <div class="mb-3">
                    <label for="cp" class="form-label">Code Postale</label>
                    <input type="text" name="cp" id="" class="form-control" placeholder="<?= $allData[0]['cp'] ?>">
                </div>
                <div class="mb-3">
                    <label for="ville" class="form-label">Ville</label>
                    <input type="text" name="ville" id="" class="form-control" placeholder="<?= $allData[0]['ville'] ?>">
                </div>
                <div class="mb-3">
                    <label for="dateEmbauche" class="form-label">Date d'embauche</label>
                    <input type="text" name="dateEmbauche" id="" class="form-control" placeholder="<?= $allData[0]['dateEmbauche'] ?>">
                </div>
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <button type="submit" class="form-control mb-3 btn btn-primary">Modifier</button><a href="#"><button class="form-control mb-3 btn btn-danger" href="#">Supprimer</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <h1>Liste des notes de frais pour </h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Date</th>
                    <th>Justificatifs</th>
                    <th>Montant Validé</th>
                    <th>Modification</th>
                    <th>Etat</th>
                </tr>
            </thead>
            <?php foreach ($allData[1] as $note) : ?>
                <tr>
                    <td><?= $note['mois'] ?></td>
                    <td><?= $note['nbJustificatifs'] ?></td>
                    <td><?= $note['montantValide'] ?></td>
                    <td><?= $note['dateModif'] ?></td>
                    <td><?= $note['idEtat'] ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>