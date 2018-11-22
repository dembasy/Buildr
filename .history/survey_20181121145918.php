<?php
// session_start();
include_once 'headerSurvey.php';
include_once 'class/database.php';
include_once 'controllers/registerCtl.php';
?>
<div class="container">
    <div class="align-items-center">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                </div>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="address"></label>
                                    <select name = "city" id = "city" >
                                        <option selected disabled>Veuillez séléctionner votre choix</option>
                                        <option selected>Veuillez séléctionner votre choix</option>
                                        <option selected>Veuillez séléctionner votre choix</option>
                                        <option selected>Veuillez séléctionner votre choix</option>
                                    </select>
                                    <p class="text-danger"><?= isset($errorList['address']) ? $errorList['address'] : ''; ?></p>
                                </div>
                            </div>
                        </div>
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
                            <div class="col-lg-12">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="address"><?= REGISTER_ADDRESS ?></label>
                                    <input id="address" name="address" class="form-control form-control-alternative " type="text">
                                    <p class="text-danger"><?= isset($errorList['address']) ? $errorList['address'] : ''; ?></p>
                                </div>
                            </div>
                        </div>
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
                            <div class="col-lg-12">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="address"><?= REGISTER_ADDRESS ?></label>
                                    <input id="address" name="address" class="form-control form-control-alternative " type="text">
                                    <p class="text-danger"><?= isset($errorList['address']) ? $errorList['address'] : ''; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="address"><?= REGISTER_ADDRESS ?></label>
                                    <input id="address" name="address" class="form-control form-control-alternative " type="text">
                                    <p class="text-danger"><?= isset($errorList['address']) ? $errorList['address'] : ''; ?></p>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn align-items-center" value="Valider mes réponses" name="submitRegister" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include 'footerScript.php';
?>



