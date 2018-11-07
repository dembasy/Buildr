<?php include 'header.php' ?>
  <div class="container">
    <div class="align-items-center">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">     
              <h3 class="mb-0">Mon compte</h3>
            </div>
            <div class="col-4 text-right">
              <a href="#!" class="btn btn-sm btn-danger">Supprimer mon compte</a>
            </div>
          </div>
        </div>
        <div class="card-body">
        <form action="#" method="POST">
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-last-name"> Nom </label>
                  <input type="text" id="input-last-name" class="form-control form-control-alternative">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-first-name"> Prénom</label>
                  <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="" value="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="email"> Adresse mail </label>
                  <input type="email" id="email" class="form-control form-control-alternative" placeholder="">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="phone">Numéro de téléphone</label>
                    <input type="phone" id="phone" class="form-control form-control-alternative" placeholder="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="password">Mot de passe</label>
                    <input type="password" id="password" class="form-control form-control-alternative" placeholder="">
                </div>
              </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-password">Confirmation du mot de passe</label>
                <input type="password" id="input-password" class="form-control form-control-alternative" placeholder="">
              </div>
            </div>
            </div>
          </div>
          <hr class="my-4" />
           <!-- Address -->
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label" for="address">Adresse 1</label>
                  <input id="address" class="form-control form-control-alternative" type="text">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label" for="address">Adresse 2</label>
                  <input id="address" class="form-control form-control-alternative" type="text">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="postalCode">Code Postal</label>
                  <input type="number" id="postalCode" class="form-control form-control-alternative">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="city">Ville</label>
                  <input type="text" id="city" class="form-control form-control-alternative">
                </div>
                </div>
              </div>
            </div>
        </form>
          <button type="submit" class="btn btn-md btn-primary btn-center">Enregistrer mes informations</button>
      </div>
    </div>
   </div>
</div>

<?php include 'footer.php' ?>