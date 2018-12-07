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
                    
                    <input type="submit"  class="btn btn-primary"  name="modify" id="modify" data-toggle="modal" data-target="#basicExampleModal"data-toggle="modal" data-target="#basicExampleModal" value="Modifier mes informations" />
                    <input type="submit"  class="btn btn-danger"  name="delete" id="delete" value="Supprimer mes informations" />
                    <a href=""></a>
                </fieldset>
            </form>
            
        </div>
    </div>
</div>



<?php include_once 'footer.php'; ?>