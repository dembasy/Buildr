<?php
session_start();
include_once 'controllers/profileCtl.php';
include_once 'header.php';
?>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Votre profil</h3>
    </div>
</div>
<div class="align-items-center mt-4 mb-4">
    <div class="card shadow">
        <div class="card-body">
            <form action="#" method="POST">
                <fieldset>
                    <legend class="mb-4">Vos informations</legend>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="lastname"><?= REGISTER_LASTNAME ?></label>
                                <input type="text" name="lastname" id="lastname" class="form-control form-control-alternative deactivation " value="<?= $userProfile->lastname ?>">
                                <p class="text-danger"><?= isset($errorList['firstname']) ? $errorList['lastname'] : ''; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="firstname"><?= REGISTER_FIRSTNAME ?></label>
                                <input type="text" name="firstname" id="firstname" class="form-control form-control-alternative deactivation" value="<?= $userProfile->firstname ?>">
                                <p class="text-danger"><?= isset($errorList['firstname']) ? $errorList['firstname'] : ''; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="email"><?= REGISTER_MAIL ?></label>
                                <input type="email" name="email" id="email" class="form-control form-control-alternative deactivation" value="<?= $userProfile->email ?>">
                                <p class="text-danger"><?= isset($errorList['email']) ? $errorList['email'] : ''; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="phoneNumber"><?= REGISTER_NUMBER ?></label>
                                <input type="number" id="phoneNumber" name="phoneNumber" class="form-control form-control-alternative deactivation" value="<?= $userProfile->phoneNumber ?>"/>
                                <p class="text-danger"><?= isset($errorList['phoneNumber']) ? $errorList['phoneNumber'] : ''; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="address"><?= REGISTER_ADDRESS ?></label>
                        <input id="address" name="address" class="form-control form-control-alternative deactivation" type="text" value="<?= $userProfile->address ?>">
                        <p class="text-danger"><?= isset($errorList['address']) ? $errorList['address'] : ''; ?></p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="postalCode"><?= REGISTER_POSTALCODE ?></label>
                                <input type="number" name="postalCode" id="postalCode" class="form-control form-control-alternative deactivation" value="<?= $userProfile->postalCode ?>">
                                <p class="text-danger"><?= isset($errorList['postalCode']) ? $errorList['postalCode'] : ''; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="city"><?= REGISTER_CITY ?></label>
                                <select name="city" id = "city" >
                                    <option selected value="<?= $userProfile->idCity?>"><?= $userProfile->cityName ?></option>
                                </select>
                                <p class="text-danger"><?= isset($errorList['city']) ? $errorList['city'] : ''; ?></p>
                            </div>
                        </div>
                    </div>
                    
                    <input type="submit"  class="btn btn-primary"  name="modify" id="modify" value="Modifier mes informations" />
                    
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#basicExampleModal">
  Supprimer mon compte
</button>
<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Suppression du compte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Etes vous sur de vouloir supprimer votre compte
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <input  type="submit" name="delete" id="delete" value="Oui" class="btn btn-danger"/>
      </div>
    </div>
  </div>
</div>
                </fieldset>
            </form>
            
        </div>
    </div>
</div>



<?php include_once 'footer.php'; ?>