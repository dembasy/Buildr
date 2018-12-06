<?php
session_start();
include_once 'controllers/updateEstimationCtl.php';
include_once 'header.php';
?>

<div class="align-items-center mt-4 mb-4">
    <div class="card shadow">
        <div class="card-body">
            <form action="#" method="POST">
                <fieldset>
                    <legend>Modifier mon estimation</legend>
                    <div class="form-group">
                        <label for="name">Quel nom souhaitez vous donnez a votre projet ?</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $userProject->name ?>" <?= isset($name) ? 'value="' . $name . '"' : '' ?> placeholder="La maison des Dupont"  />
                        <p class="text-danger"><?= isset($errorList['name']) ? $errorList['name'] : ''; ?></p>
                    </div>
                    <div class="form-group">
                        <label for="propertyTypes">Votre projet concerne ...</label>
                        <select class="form-control" id="propertyTypes" name="propertyTypes">
                            <option selected disabled><?= $userProject->type ?></option>
                            <?php foreach ($propertyTypesList as $propertyTypesListName) { ?>
                                <option value="<?= $propertyTypesListName->id ?>"><?= $propertyTypesListName->type ?></option>
                            <?php } ?>
                        </select>
                        <p class="text-danger"><?= isset($errorList['propertyTypes']) ? $errorList['propertyTypes'] : ''; ?></p>
                    </div>
                    <div class="form-group">
                        <label for="rooms">Quelle pièce / partie souhaitez-vous rénover ?</label>
                        <select class="form-control" id="rooms" name="rooms">
                            <option selected disabled><?= $userProject->room ?></option>
                            <?php foreach ($roomsList as $roomsListName) { ?>
                                <option value="<?= $roomsListName->id ?>"><?= $roomsListName->room ?></option>
                            <?php } ?>
                        </select>
                        <p class="text-danger"><?= isset($errorList['room']) ? $errorList['room'] : ''; ?></p>
                    </div>
                    <div class="form-group">
                        <label for="area">Quelle est la surface totale au sol en m² ?</label>
                        <input type="number" class="form-control" id="area" value="<?= $userProject->area ?>" name="area" />
                        <p class="text-danger"><?= isset($errorList['area']) ? $errorList['area'] : ''; ?></p>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label mb-2" for="address">Quelle est votre adresse</label>
                        <input id="address" name="address" class="form-control form-control-alternative " value="<?= $userProject->address ?>" type="text" />
                        <p class="text-danger"><?= isset($errorList['address']) ? $errorList['address'] : ''; ?></p>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label mb-2" for="postalCode">Indiquez votre code postal</label>
                        <input type="number" name="postalCode" id="postalCode"  class="form-control form-control-alternative" />
                        <p class="text-danger"><?= isset($errorList['postalCode']) ? $errorList['postalCode'] : ''; ?></p>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label mb-2" for="city">Quelle est votre ville ?</label><br>
                        <select name = "city" id = "city" >
                            <option selected disabled><?= $userProject->cityName ?></option>
                            <?php foreach ($cityName as $cityValue) { ?>
                                <option value="<?= $cityValue->cityValue . id ?>"></option>     
                            <?php
                                }
                            ?>
                        </select>
                        <p class="text-danger"><?= isset($errorList['city']) ? $errorList['city'] : ''; ?></p>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label mb-2 mb-2" for="startBudget">Quel est votre budget ?</label><br>                                            
                        Entre <input type="number" name="startBudget" id="startBudget" value="<?= $userProject->startBudget ?>" class="form-control form-control-alternative" type="number" />
                        <p class="text-danger"><?= isset($errorList['startBudget']) ? $errorList['startBudget'] : ''; ?></p>
                        <label class="form-control-label mb-2" for="endBudget">ET </label><br>                   
                        <input type="number" name="endBudget" id="endBudget" value="<?= $userProject->endBudget ?>" class="form-control form-control-alternative" class="col" />
                        <p class="text-danger"><?= isset($errorList['endBudget']) ? $errorList['endBudget'] : ''; ?></p>
                    </div>
                    <div class="form-group">
                        <label for="moreInfos">Avez vous d'autres précisions à apporter ?</label>
                        <textarea class="form-control" id="moreInfos" rows="3"  name="moreInfos"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary align-items-center" value="Modifier mes informations" name="modifyProject" id="modifyProject" />
                </fieldset>
            </form>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>



