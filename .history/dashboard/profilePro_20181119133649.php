<?php
include_once 'sidenav.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Mon profil</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="container">
                <div class="align-items-center">
                    <div class="bg-secondary shadow">
                        <div class="bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">     
                                    <h3 class="mb-0">Mes informations personnelles</h3>
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
                                                <input type="text" name="lastname" id="lastname" class="form-control form-control-alternative deactivation" value="<?= $userProfile->lastname ?>">
                                                <p class="text-danger"><?= isset($errorList['lastname']) ? $errorList['lastname'] : ''; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group has-error">
                                                <label class="form-control-label" for="firstname"><?= REGISTER_FIRSTNAME ?></label>
                                                <input type="text" name="firstname" id="firstname" class="form-control form-control-alternative deactivation" value="<?= $userProfile->firstname ?>">
                                                <p class="text-danger"><?= isset($errorList['firstname']) ? $errorList['firstname'] : ''; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group has-error">
                                                <label class="form-control-label" for="email"><?= REGISTER_MAIL ?></label>
                                                <input type="email" name="email" id="email" class="form-control form-control-alternative deactivation" value="<?= $userProfile->email ?>">
                                                <p class="text-danger"><?= isset($errorList['email']) ? $errorList['email'] : ''; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group has-error">
                                                <label class="form-control-label" for="phoneNumber"><?= REGISTER_NUMBER ?></label>
                                                <input type="number" id="phoneNumber" name="phoneNumber" class="form-control form-control-alternative deactivation" value="<?= $userProfile->phoneNumber ?>">
                                                <p class="text-danger"><?= isset($errorList['phoneNumber']) ? $errorList['phoneNumber'] : ''; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group has-error">
                                                <label class="form-control-label" for="address"><?= REGISTER_ADDRESS ?></label>
                                                <input id="address" name="address" class="form-control form-control-alternative deactivation" type="text" value="<?= $userProfile->address ?>">
                                                <p class="text-danger"><?= isset($errorList['address']) ? $errorList['address'] : ''; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group has-error">
                                                <label class="form-control-label" for="address"><?= REGISTER_COMPANY ?></label>
                                                <input id="firm" name="firm" class="form-control form-control-alternative deactivation" type="text" value="<?= $userProfile->firm ?>">
                                                <p class="text-danger"><?= isset($errorList['firm']) ? $errorList['firm'] : ''; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group has-error">
                                                <label class="form-control-label" for="postalCode"><?= REGISTER_POSTALCODE ?></label>
                                                <input type="number" name="postalCode" id="postalCode" class="form-control form-control-alternative deactivation" value="<?= $userProfile->postalCode ?>">
                                                <p class="text-danger"><?= isset($errorList['postalCode']) ? $errorList['postalCode'] : ''; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group has-error">
                                                <label class="form-control-label" for="city"><?= REGISTER_CITY ?></label>
                                                <select name = "city" id = "city" >
                                                    <option selected disabled>Veuillez séléctionner une ville</option>
                                                    <?php foreach ($cityName as $cityValue) { ?>
                                                        <option value="<?= $cityValue->cityValue . id ?>"></option>     
                                                        <?php

                                                    }
                                                    ?>
                                                </select>
                                                <p class="text-danger"><?= isset($errorList['city']) ? $errorList['city'] : ''; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <a type="submit" href="#" class="btn btn-primary"  name="modify" id="modify">Modifier mes informations</a>
                                    <a type="submit" href="profilePro.php?delete=1" class="btn btn-danger"  name="delete" id="idRemove">Supprimer mes informations</a>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php include_once 'footer.php'; ?>