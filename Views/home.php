  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h1 class="card-title">Bienvenue</h5>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <p class="card-text">
              <ul>
                <li>ID : <?= $_SESSION['auth']['id'] ?></li>
                <li>Nom : <?= $_SESSION['auth']['nom'] ?></li>
                <li>Prenom : <?= $_SESSION['auth']['prenom'] ?></li>
                <li>Adresse : <?= $_SESSION['auth']['email'] ?></li>
              </ul>
            </p>
            <!-- <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a> -->
        </div>
      </div>
    </div>
  </div>