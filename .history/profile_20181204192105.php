<?php
session_start();
include_once 'header.php';
include_once 'controllers/profileCtl.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Votre profil</h1>
        </div>
    </div>
    <div class="align-items-center mt-4 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <form action="#" method="POST">
                    <fieldset>
                        <legend class="mb-4">Vos informations</legend>
                        <div class="form-group">
                            <label class="form-control-label" for="firstname"><?= REGISTER_FIRSTNAME ?></label>
                            <input type="text" name="firstname" id="firstname" class="form-control form-control-alternative deactivation col-md-6" value="<?= $userProfile->firstname ?>">
                            <p class="text-danger"><?= isset($errorList['firstname']) ? $errorList['firstname'] : ''; ?></p>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="email"><?= REGISTER_MAIL ?></label>
                            <input type="email" name="email" id="email" class="form-control form-control-alternative deactivation col-s2-6" value="<?= $userProfile->email ?>">
                            <p class="text-danger"><?= isset($errorList['email']) ? $errorList['email'] : ''; ?></p>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="phoneNumber"><?= REGISTER_NUMBER ?></label>
                            <input type="number" id="phoneNumber" name="phoneNumber" class="form-control form-control-alternative deactivation" value="<?= $userProfile->phoneNumber ?>">
                            <p class="text-danger"><?= isset($errorList['phoneNumber']) ? $errorList['phoneNumber'] : ''; ?></p>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="address"><?= REGISTER_ADDRESS ?></label>
                            <input id="address" name="address" class="form-control form-control-alternative deactivation" type="text" value="<?= $userProfile->address ?>">
                            <p class="text-danger"><?= isset($errorList['address']) ? $errorList['address'] : ''; ?></p>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="postalCode"><?= REGISTER_POSTALCODE ?></label>
                            <input type="number" name="postalCode" id="postalCode" class="form-control form-control-alternative deactivation" value="<?= $userProfile->postalCode ?>">
                            <p class="text-danger"><?= isset($errorList['postalCode']) ? $errorList['postalCode'] : ''; ?></p>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="city"><?= REGISTER_CITY ?></label>
                            <select name = "city" id = "city" >
                                <option selected disabled><?= $userProfile->cityName ?></option>
                                <?php foreach ($cityName as $cityValue) { ?>
                                    <option value="<?= $cityValue->cityValue . id ?>"></option>     
                                    <?php
                                }
                                ?>
                            </select>
                            <p class="text-danger"><?= isset($errorList['city']) ? $errorList['city'] : ''; ?></p>
                        </div>
                        <input type="submit"  class="btn btn-primary"  name="modify" id="modify" value="Modifier mes informations" />
                        <input type="submit"  class="btn btn-danger"  name="delete" id="delete" value="Supprimer mes informations" />

                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include_once 'footer.php'; ?>