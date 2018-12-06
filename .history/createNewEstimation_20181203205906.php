<?php
session_start();
include_once 'controllers/createNewEstimationCtl.php';
include_once 'header.php';
?>


<div class="align-items-center mt-4">
    <div class="card shadow">
        <div class="card-body">
<form>
    <fieldset>
        <legend>Créez votre estimation</legend>
        <div class="form-group">
            <label for="propertyTypes">Votre projet concerne ...</label>
            <select class="form-control" id="propertyTypes" name="propertyTypes">
                <option selected disabled>Veuillez sélectionner une option</option>
                <?php foreach ($propertyTypesList as $propertyTypesListName) { ?>
                    <option value="<?= $propertyTypesListName->id ?>"><?= $propertyTypesListName->type ?></option>
                <?php } ?>
            </select>
            <p class="text-danger"><?= isset($errorList['propertyTypes']) ? $errorList['propertyTypes'] : ''; ?></p>
        </div>
        <div class="form-group">
            <label for="rooms">Quelle pièce / partie souhaitez-vous rénover ?</label>
            <select class="form-control" id="rooms" name="rooms">
                <option selected disabled>Veuillez sélectionner une option</option>
                <?php foreach ($roomsList as $roomsListName) { ?>
                    <option value="<?= $roomsListName->id ?>"><?= $roomsListName->room ?></option>
                <?php } ?>
            </select>
            <p class="text-danger"><?= isset($errorList['room']) ? $errorList['room'] : ''; ?></p>
        </div>
        <div class="form-group">
            <label for="area">Quelle est la surface totale au sol en m² ?</label>
            <input type="number" class="form-control" id="area" placeholder="Surface en m²">
            <p class="text-danger"><?= isset($errorList['area']) ? $errorList['area'] : ''; ?></p>
        </div>
    







        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleSelect1">Example select</label>
            <select class="form-control" id="exampleSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleSelect2">Example multiple select</label>
            <select multiple="" class="form-control" id="exampleSelect2">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleTextarea">Example textarea</label>
            <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
        </div>
        <fieldset class="form-group">
            <legend>Radio buttons</legend>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                    Option one is this and that—be sure to include why it's great
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                    Option two can be something else and selecting it will deselect option one
                </label>
            </div>
            <div class="form-check disabled">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3" disabled="">
                    Option three is disabled
                </label>
            </div>
        </fieldset>
        <fieldset class="form-group">
            <legend>Checkboxes</legend>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" value="" checked="">
                    Option one is this and that—be sure to include why it's great
                </label>
            </div>
            <div class="form-check disabled">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" value="" disabled="">
                    Option two is disabled
                </label>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
</form>
</div>
</div>
</div>





            <form action="#" method="POST">
                <div class="pl-lg-4">





                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group has-error">
                                <label class="form-control-label mb-2" for="address">Quelle est votre adresse</label>
                                <input id="address" name="address" class="form-control form-control-alternative " type="text">
                                <p class="text-danger"><?= isset($errorList['address']) ? $errorList['address'] : ''; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-error">                     
                                    <label class="form-control-label mb-2" for="postalCode">Indiquez votre code postal</label>
                                    <input type="number" name="postalCode" id="postalCode" class="form-control form-control-alternative">
                                    <p class="text-danger"><?= isset($errorList['postalCode']) ? $errorList['postalCode'] : ''; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group has-error">
                                <label class="form-control-label mb-2" for="city">Quelle est votre ville ?</label><br>
                                <select name = "city" id = "city" >
                                    <option selected disabled>Veuillez sélectionner une ville</option>
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
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-error">
                                <label class="form-control-label mb-2 mb-2" for="startBudget">Quel est votre budget ?</label><br>                                            
                                Entre <input type="number" name="startBudget" id="startBudget" class="form-control form-control-alternative" type="number">
                                <p class="text-danger"><?= isset($errorList['startBudget']) ? $errorList['startBudget'] : ''; ?></p>
                                <label class="form-control-label mb-2" for="endBudget">ET </label><br>                   
                                <input type="number" name="endBudget" id="endBudget" class="form-control form-control-alternative" class="col">
                                <p class="text-danger"><?= isset($errorList['endBudget']) ? $errorList['endBudget'] : ''; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group has-error">
                                <label class="form-control-label mb-2" for="moreInfos">Avez-vous des précisions à apporter ?</label><br>
                                <textarea id="moreInfos" name="moreInfos"rows="5" cols="10"></textarea>
                                <p class="text-danger"><?= isset($errorList['moreInfos']) ? $errorList['moreInfos'] : ''; ?></p>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary align-items-center" value="Valider mes réponses" name="submitSurvey" />
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>



