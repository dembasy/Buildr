<?php
session_start();
include_once 'class/database.php';
include_once 'controllers/projectsCtl.php';
?>
<!DOCTYPE html>
<html lang="en" class="full-height">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Résultats</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/favicon.ico">
        <!-- My CSS -->
        <link rel="stylesheet"  href="../assets/css/style.css" />
    </head>
    <body>
        <nav class="navbar navbar-dark primary-color">
            <a class="navbar-brand" href="../index.php">Buildr</a>
            <a class = "nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><?= sprintf($_SESSION['idUser']) ?></a> 
            <div class="d-flex-right">

            </div>   
        </nav>
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
                                            <select name="propertyTypes" id="propertyTypes" >
                                                <option selected disabled>Veuillez sélectionner une option</option>
                                                <?php foreach ($propertyTypesList as $propertyTypesListName) { ?>
                                                    <option value="<?= $propertyTypesListName->id ?>"><?= $propertyTypesListName->type ?></option>
                                                    <?php 
                                                }
                                                ?>
                                            </select>
                                            <p class="text-danger"><?= isset($errorList['propertyTypes']) ? $errorList['propertyTypes'] : ''; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group has-error">
                                            <label class="form-control-label mb-2" for="room">Quelles pièces voulez-vous rénover ?</label> <br>
                                            <p class="text-danger"><?= isset($errorList['room']) ? $errorList['room'] : ''; ?></p>
                                            <select name = "room" id = "room" >
                                                <option selected disabled>Veuillez sélectionner une option</option>
                                                <?php foreach ($roomsList as $roomsListName) { ?>
                                                    <option value="<?= $roomsListName->id ?>"><?= $roomsListName->room ?></option>
                                                    <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group has-error">
                                            <label class="form-control-label mb-2" for="area">Quelle est la surface totale au sol en m² ?</label> <br>
                                            <input id="area" name="area" class="form-control form-control-alternative " type="number">
                                            <p class="text-danger"><?= isset($errorList['area']) ? $errorList['address'] : ''; ?></p>
                                        </div>
                                    </div>
                                </div>
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
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group has-error">
                                            <label class="form-control-label mb-2" for="date">Sous combien de temps voulez-vous réaliser </label><br>
                                            <p class="text-danger"><?= isset($errorList['date']) ? $errorList['date'] : ''; ?></p>
                                            <select name = "date" id = "date" >
                                                <option name="date" selected disabled>Veuillez sélectionner une option</option>
                                                <option name="date" value="1">Moins d'un mois</option>
                                                <option name="date" value="2">Entre trois et six mois</option>
                                                <option name="date" value="3">Entre six et douze mois</option>
                                                <option name="date" value="3">Je ne sais pas</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" class="btn align-items-center" value="Valider mes réponses" name="submitSurvey" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'footerScript.php';
        ?>



