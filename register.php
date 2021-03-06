<?php
include_once 'header.php';
include_once 'class/database.php';
include_once 'controllers/registerCtl.php';
?>
<div class="container">
    <div class="align-items-center mt-4 mb-4">
        <div class="card bg-white shadow">
            <div class="card-header bg-black border-0">
                <div class="row align-items-center">
                    <div class="col-8">     
                        <h3 class="mb">Inscription</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    <select name="usersType" class="mb-4" id="company">
                        <option disabled >Veuillez sélectionner une option</option>
                        <?php foreach ($usersTypeList as $usersTypeListName) { ?>
                            <option value="<?= $usersTypeListName->id ?>"<?= isset($_POST['usersType']) && $_POST['usersType'] == $usersTypeListName->id ? 'selected' : ''; ?>><?= $usersTypeListName->type ?></option>
                            <?php }
                        ?>
                    </select>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="lastname"><?= REGISTER_LASTNAME ?></label>
                                    <input type="text" name="lastname" id="lastname" <?= isset($lastname) ? 'value="' . $lastname . '"' : '' ?>  class="form-control form-control-alternative"/>
                                    <p class="text-danger"><?= isset($errorList['lastname']) ? $errorList['lastname'] : ''; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="firstname"><?= REGISTER_FIRSTNAME ?></label>
                                    <input type="text" name="firstname" id="firstname" <?= isset($firstname) ? 'value="' . $firstname . '"' : '' ?>  class="form-control form-control-alternative"/>
                                    <p class="text-danger"><?= isset($errorList['firstname']) ? $errorList['firstname'] : ''; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="email"><?= REGISTER_MAIL ?></label>
                                    <input type="email" name="email" id="email" <?= isset($email) ? 'value="' . $email . '"' : '' ?> class="form-control form-control-alternative"/>
                                    <p class="text-danger"><?= isset($errorList['email']) ? $errorList['email'] : ''; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="phoneNumber"><?= REGISTER_NUMBER ?></label>
                                    <input type="number" id="phoneNumber" name="phoneNumber" <?= isset($phoneNumber) ? 'value="' . $phoneNumber . '"' : '' ?> class="form-control form-control-alternative"/>
                                    <p class="text-danger"><?= isset($errorList['phoneNumber']) ? $errorList['phoneNumber'] : ''; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" id="firm-label" for="firm"><?= REGISTER_COMPANY ?></label>
                                    <input type="text" name="firm" id="firm" <?= isset($firm) ? 'value="' . $firm . '"' : '' ?> class="form-control form-control-alternative"/>
                                    <p class="text-danger" id="firm-p"><?= isset($errorList['firm']) ? $errorList['firm'] : ''; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="password"><?= REGISTER_PASSWORD ?></label>
                                    <input type="password" name="password" id="password" class="form-control form-control-alternative" />
                                    <p class="text-danger"><?= isset($errorList['password']) ? $errorList['password'] : ''; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="passwordVerify"><?= REGISTER_PASSWORD_VERIFY ?></label>
                                    <input type="password" name="passwordVerify" id="passwordVerify"  class="form-control form-control-alternative"/>
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
                                    <input type="text" id="address" name="address" <?= isset($address) ? 'value="' . $address . '"' : '' ?>  class="form-control form-control-alternative " />
                                    <p class="text-danger"><?= isset($errorList['address']) ? $errorList['address'] : ''; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="postalCode"><?= REGISTER_POSTALCODE ?></label>
                                    <input type="number" name="postalCode" id="postalCode" <?= isset($postalCode) ? 'value="' . $postalCode . '"' : '' ?> class="form-control form-control-alternative"/>
                                    <p class="text-danger"><?= isset($errorList['postalCode']) ? $errorList['postalCode'] : ''; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group has-error">
                                    <label class="form-control-label ml-5" for="city"><?= REGISTER_CITY ?></label>
                                    <select name = "city" id = "city" >
                                        <option selected disabled>Veuillez séléctionner une ville</option>
                                    </select>
                                    <p class="text-danger"><?= isset($errorList['city']) ? $errorList['city'] : ''; ?></p>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn align-items-center bg-primary" value="<?= REGISTER_SUBMIT ?>" name="submitRegister" />
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<?php
include 'footer.php';
?>



