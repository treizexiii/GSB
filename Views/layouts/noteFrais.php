<?php $total = 0 ?>


<?php if (!empty($allData['frais'])) : ?>
    <h1>Etats des frais</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Mois</th>
                <th>Montant Validé</th>
                <th>Etat de la note</th>
                <th></th>
            </tr>
        </thead>
        <?php $allData['frais'] = array_reverse($allData['frais']) ?>
        <?php foreach ($allData['frais'] as $frais) : ?>
            <tr>
                <td><?= $frais['mois'] ?></td>
                <td><?= $frais['montantValide'] ?></td>
                <td><?= $frais['idEtat'] ?></td>
                <td><button class="btn btn-primary"><a href="" style="color: white;">voir</a></button></td>
                <?php $total += $frais['montantValide'] ?>
            </tr>
        <?php endforeach ?>
        <tr>
            <th>
                <h3>Total</h1>
            </th>
            <th><?= $total ?></th>
            <th></th>
        </tr>
    </table>
<?php endif ?>