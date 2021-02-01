<div class="row mb-3">
    <div class="col-md-8">
    <h1>Liste des notes de frais pour <?= $allData[1]['idVisiteur'] ?> </h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Date</th>
                    <th>Catégorie</th>
                    <th>Quantité</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <?php foreach ($allData as $note) : ?>
                <tr>
                    <td><?= $note['mois'] ?></td>
                    <td><?= $note['libelle'] ?></td>
                    <td><?= $note['quantite'] ?></td>
                    <td><?= $note['montant'] * $note['quantite'] ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>