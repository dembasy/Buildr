<?php include 'headerSurvey.php' ?>
<?php include 'controllers/usersCtl.php' ?>
  <div class="container">
    <div class="align-items-center">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">     
              <h3 class="mb-0">Inscription</h3>
              <select class="typeSelection" id="company">
                <option value="Particulier">Particulier</option>
                <option value="Professionnel">Professionnel</option>
              </select>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="#" method="POST">
            <div class="pl-lg-4">
              <div class="row">
              <div class="col-lg-6">
                <div class="form-group has-error">
                  <label class="form-control-label" for="lastname"><?= REGISTER_LASTNAME ?></label>
                  <input type="text" name="lastname" id="lastname" class="form-control form-control-alternative">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group has-error">
                  <label class="form-control-label" for="firstname"><?= REGISTER_FIRSTNAME ?></label>
                  <input type="text" name="firstname" id="firstname" class="form-control form-control-alternative">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group has-error">
                  <label class="form-control-label" for="email"><?= REGISTER_MAIL ?></label>
                  <input type="email" name="mail" id="email" class="form-control form-control-alternative">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group has-error">
                    <label class="form-control-label" for="phone">Numéro de téléphone</label>
                    <input type="phone" id="phone" class="form-control form-control-alternative">
                </div>
              </div>
            </div>
              <div class="col-lg-12">
                <div class="form-group has-error">
                    <label class="form-control-label" id="firm-label" for="firm">Société</label>
                    <input type="text" id="firm" class="form-control form-control-alternative">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group has-error">
                    <label class="form-control-label" for="password"><?= REGISTER_PASSWORD ?></label>
                    <input type="password" name="password" id="password" class="form-control form-control-alternative">
                </div>
              </div>
            <div class="col-lg-6">
              <div class="form-group has-error">
                <label class="form-control-label" for="password"><?= REGISTER_PASSWORD_VERIFY ?></label>
                <input type="password" name="passwordVerify" id="passwordVerify" class="form-control form-control-alternative">
              </div>
            </div>
            </div>
          </div>
          <hr class="my-4" />
           <!-- Address -->
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group has-error">
                  <label class="form-control-label" for="address">Adresse </label>
                  <input id="address" name="address1" class="form-control form-control-alternative" type="text">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group has-error">
                  <label class="form-control-label" for="postalCode">Code Postal</label>
                  <input type="number" name="postalCode" id="postalCode" class="form-control form-control-alternative">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group has-error">
                  <label class="form-control-label" for="city">Ville</label>
                  <input type="text" id="city" name="city" class="form-control form-control-alternative">
                </div>
                </div>
              </div>
              <button type="submit" name="register" class="btn btn-md btn-primary btn-center"><?= REGISTER_SUBMIT ?></button>
            </div>
        </form>
      </div>
    </div>
   </div>
   </div>

</div>
<?php include 'footerScript.php'?>


