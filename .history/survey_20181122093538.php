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
                                    <select name = "propertyTypes" id = "propertyTypes" >
                                        <option selected disabled>Veuillez séléctionner votre choix</option>
                                        <option name="propertyTypes" value="2" >Maison</option>
                                        <option name="propertyTypes" value="3" >Appartement</option>
                                        <option name="propertyTypes" value="4" >Local</option>
                                        <option name="propertyTypes" value="5" >Bureaux</option>
                                    </select>
                                    <p class="text-danger"><?= isset($errorList['propertyTypes']) ? $errorList['propertyTypes'] : ''; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="name">Quelles pièces voulez vous renover</label> <br>
                                    <input id="room" name="room" class="form-control form-control-alternative " type="text">
                                    <p class="text-danger"><?= isset($errorList['room']) ? $errorList['room'] : ''; ?></p>
                                    <select name = "room" id = "room" >
                                      <option selected disabled>Veuillez séléctionner votre choix</option>
                                        <option name="room" value="1">Salle de bains</option>
                                        <option name="room" value="2">Cuisine</option>
                                        <option name="room" value="3">Chambres</option>
                                        <option name="room" value="4">Garages</option>
                                        <option name="room" value="5">Chambres d'hôtes</option>
                                        <option name="room" value="5">Rénovation complète</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="address">Votre projet concerne...</label> <br>
                                    <input id="area" name="area" class="form-control form-control-alternative " type="number">
                                    <p class="text-danger"><?= isset($errorList['address']) ? $errorList['address'] : ''; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="address">Votre adresse</label>
                                    <input id="address" name="address" class="form-control form-control-alternative " type="text">
                                    <p class="text-danger"><?= isset($errorList['address']) ? $errorList['address'] : ''; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="budget">Quel est votre budget ?</label><br>
                                    <input id="budget" name="budget" class="form-control form-control-alternative " type="text">
                                    <p class="text-danger"><?= isset($errorList['budget']) ? $errorList['budget'] : ''; ?></p>
                                    <select name = "budget" id = "budget" >
                                        <option name="budget" selected disabled>Veuillez séléctionner votre choix</option>
                                        <option name="budget" value="1" selected>Moins de 10 000 €</option>
                                        <option name="budget" value="2" selected>Entre 10 000 € et 30 000 €</option>
                                        <option name="budget" value="3" selected>Entre 30 000 € et 70 000 €</option>
                                        <option name="budget" value="4" selected>Plus de 100 000€</option>
                                        <option name="budget" value="5" selected>Je ne sais pas</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="description">Avez-vous des précisions à apporter ?</label><br>
                                    <textarea id="description" name="description"rows="5" cols="10">It was a dark and stormy night</textarea>
                                    <p class="text-danger"><?= isset($errorList['description']) ? $errorList['description'] : ''; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-error">
                                    <label class="form-control-label mb-2" for="date">Sous combien de temps voulez vous réaliser </label><br>
                                    <input id="date" name="date" class="form-control form-control-alternative " type="date">
                                    <p class="text-danger"><?= isset($errorList['date']) ? $errorList['date'] : ''; ?></p>
                                      <select name = "date" id = "date" >
                                        <option name="date" selected disabled>Veuillez séléctionner votre choix</option>
                                        <option name="date" value="1" selected>Moins d'un mois</option>
                                        <option name="date" value="2" selected>Entre trois et six mois</option>
                                        <option name="date" value="3" selected>Entre six et douze mois</option>
                                        <option name="date" value="3" selected>Je ne sais pas</option>
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


