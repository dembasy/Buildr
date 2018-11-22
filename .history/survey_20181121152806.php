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
                                    <label class="form-control-label mb-2" for="propertyTypes">Votre projet concerne...</label> <br>
                                    <select name ="propertyTypes" id="propertyTypes" >
                                        <option selected disabled>Veuillez séléctionner votre choix</option>
                                        <option selected>Maison</option>
                                        <option selected>Appartement</option>
                                        <option selected>Local</option>
                                        <option selected>Bureaux</option>
                                    </select>
                                    <p class="text-danger"><?= isset($errorList['address']) ? $errorList['address'] : ''; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="room">Pour quelles pièce voulez vous réaliser des travaux ?</label> <br>
                                    <select name = "room" id = "room" >
                                        <option selected>Salle de bains</option>
                                        <option selected>Cuisine</option>
                                        <option selected>Chambres</option>
                                        <option selected>Garages</option>
                                        <option selected>Chambres d'hôtes</option>
                                    </select>
                                    <p class="text-danger"><?= isset($errorList['address']) ? $errorList['address'] : ''; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="area">Quelle est la surface totale au sol en m² ?</label>
                                    <input id="area" name="area" class="form-control form-control-alternative " type="number">
                                    <p class="text-danger"><?= isset($errorList['address']) ? $errorList['address'] : ''; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="city">Dans quelle ville se trouve ce logement ?</label>
                                    <input id="city" name="city" class="form-control form-control-alternative " type="text">
                                    <p class="text-danger"><?= isset($errorList['address']) ? $errorList['address'] : ''; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="budget">Quel est votre budget ?</label><br>
                                    <select name = "budget" id = "budget" >
                                        <option selected disabled>Veuillez séléctionner votre choix</option>
                                        <option selected>Moins de 10 000 €</option>
                                        <option selected>Entre 10 000 € et 30 000 €</option>
                                        <option selected>Entre 30 000 € et 70 000 €</option>
                                        <option selected>Plus de 100 000€</option>
                                    </select>
                                    <p class="text-danger"><?= isset($errorList['budget']) ? $errorList['budget'] : ''; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="moreInfos">Avez-vous des précisions à apporter ?</label><br>
                                    <textarea></textarea>   
                                    <p class="text-danger"><?= isset($errorList['moreInfos']) ? $errorList['moreInfos'] : ''; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="date">Sous combien de temps voulez vous réaliser </label>
                                    <input id="address" name="address" class="form-control form-control-alternative" type="text">
                                    <p class="text-danger"><?= isset($errorList['date']) ? $errorList['date'] : ''; ?></p>
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



