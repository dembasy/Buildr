<?php 
    // session_start();
    include_once 'headerSurvey.php';
    include_once 'class/database.php';
    include_once 'controllers/registerCtl.php';
    
  if (isset($_POST['submitRegister']) && (count($errorList) === 0)) {?> 
      <div class="alert">
        <h1>Votre inscription a bien été prise en compte !</h1>
        <p><?= $_POST['lastname']?></p>
        <p><?= $_POST['firstname'] ?></p>
        <p><?= $_POST['email'] ?></p>
        <p><?= $_POST['phoneNumber'] ?></p>
        <p><?= $_POST['address'] ?></p>
        <p><?= $_POST['city'] ?></p>
        <p><?= $_POST['postalCode'] ?></p>       
    </div>
    <?php 
    } else { ?>
    
  <div class="container">
    <div class="align-items-center">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">     
              <h3 class="mb-0">Inscription</h3>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="#" method="POST">
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group has-error">
                    <select class="typeSelection" id="company">
                      <option value="1">Particulier</option>
                      <option value="2">Professionnel</option>
                    </select>
                  <label class="form-control-label mb-2" for="lastname"><?= REGISTER_LASTNAME ?></label>
                  <input type="text" name="lastname" id="lastname" class="form-control form-control-alternative">
                  <p class="text-danger"><?= isset($errorList['lastname']) ? $errorList['lastname'] : ''; ?></p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group has-error">
                  <label class="form-control-label mb-2" for="firstname"><?= REGISTER_FIRSTNAME ?></label>
                  <input type="text" name="firstname" id="firstname" class="form-control form-control-alternative">
                  <p class="text-danger"><?= isset($errorList['firstname']) ? $errorList['firstname'] : ''; ?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group has-error">
                  <label class="form-control-label mb-2" for="email"><?= REGISTER_MAIL ?></label>
                  <input type="email" name="email" id="email" class="form-control form-control-alternative">
                  <p class="text-danger"><?= isset($errorList['email']) ? $errorList['email'] : ''; ?></p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group has-error">
                    <label class="form-control-label mb-2" for="phoneNumber"><?= REGISTER_NUMBER ?></label>
                    <input type="number" id="phoneNumber" name="phoneNumber" class="form-control form-control-alternative">
                    <p class="text-danger"><?= isset($errorList['phoneNumber']) ? $errorList['phoneNumber'] : ''; ?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group has-error">
                    <label class="form-control-label mb-2" id="firm-label" for="firm"><?= REGISTER_COMPANY ?></label>
                    <input type="text" name="firm" id="firm" class="form-control form-control-alternative">
                    <p class="text-danger"><?= isset($errorList['firm']) ? $errorList['firm'] : ''; ?></p>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group has-error">
                  <label class="form-control-label mb-2" for="password"><?= REGISTER_PASSWORD ?></label>
                  <input type="password" name="password" id="password" class="form-control form-control-alternative">
                  <p class="text-danger"><?= isset($errorList['password']) ? $errorList['password'] : ''; ?></p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group has-error">
                  <label class="form-control-label mb-2" for="passwordVerify"><?= REGISTER_PASSWORD_VERIFY ?></label>
                  <input type="password" name="passwordVerify" id="passwordVerify" class="form-control form-control-alternative">
                  <p class="text-danger"><?= isset($errorList['passwordVerify']) ? $errorList['passwordVerify'] : ''; ?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group has-error">
                  <label class="form-control-label mb-2" for="address"><?= REGISTER_ADDRESS ?></label>
                  <input id="address" name="address" class="form-control form-control-alternative " type="text">
                  <p class="text-danger"><?= isset($errorList['address']) ? $errorList['address'] : ''; ?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group has-error">
                  <label class="form-control-label mb-2" for="postalCode"><?= REGISTER_POSTALCODE ?></label>
                  <input type="number" name="postalCode" id="postalCode" class="form-control form-control-alternative">
                  <p class="text-danger"><?= isset($errorList['postalCode']) ? $errorList['postalCode'] : ''; ?></p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group has-error">
                  <label class="form-control-label ml-5" for="city"><?= REGISTER_CITY ?></label>
                  <select name = "city" id = "city" >
                    <option selected disabled>Veuillez séléctionner une ville</option>
                    <?php foreach ($cityName as $cityValue) { ?>
                      <option value="<?= $cityValue->cityValue.id ?>"></option>     
                      <?php
                                }
                                ?>
                  </select>
                  
                  <p class="text-danger"><?= isset($errorList['city']) ? $errorList['city'] : ''; ?></p>
                </div>
              </div>
            </div>
            <input type="submit" class="btn align-items-center" value="<?= REGISTER_SUBMIT ?>" name="submitRegister" />
          </div>
          </div>
        </form>
      </div>
    </div>
   </div>
  </div>
</div>
<?php
  }
include 'footerScript.php';
  ?>



