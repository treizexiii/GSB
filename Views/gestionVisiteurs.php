<div class="row">
    <div class="col-md-4">
        <form action="" method="post">
            <h3>Recherche :</h3><br>
            <div class="form-group">
                <input type="text" name="visteur" class="form-control"><br>
                <input type="submit" class="btn btn-primary" value="Rechercher">
            </div>
        </form>
    </div>
    <div class="col-md-8">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th></th>
                </tr>
            </thead>
            <?php foreach ($allData as $visiteur) : ?>
            <tr>
                <td><?= $visiteur['nom'] ?></td>
                <td><?= $visiteur['prenom'] ?></td>
                <td><button class="btn btn-primary"><a href="<?php App::$root ?>detailsVisiteur/<?= $visiteur['id'] ?>"
                            style="color: white;">voir</a></button></td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>