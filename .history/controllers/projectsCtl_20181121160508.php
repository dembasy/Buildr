<?php
//appel de l 'ajax
    include_once 'configuration.php';
    $regexPhoneNumber = '/^[0][1-9][0-9]{8}$/';
    $regexzipCode = '/^[0-9]{5}$/';
    $regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-]+$/';
    $regexNumberLetter = '/^[0-9-a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';
    $errorList = array();
//condition pour le formulaire
    if (isset($_POST['submitSurvey'])) {
        var_dump($_POST);
        if (!empty($_POST['propertyTypes'])) {
            if (preg_match($regexNumberLetter, $_POST['propertyTypes'])) {
                $idPropertyTypes = htmlspecialchars($_POST['propertyTypes']);
            } else {
                $errorList['propertyTypes'] = 'La saisie de votre prénom est invalide';
            }
        } else {
            $errorList['propertyTypes'] = 'Veuillez indiquer votre prénom';
        }
        if (!empty($_POST['area'])) {
            if (preg_match($regexNumberLetter, $_POST['area'])) {
                $area = htmlspecialchars($_POST['area']);
            } else {
                $errorList['area'] = 'Veuillez vérifier la saisie';
            }
        } else {
            $errorList['budget'] = 'Veuillez indiquer votre adresse';
        }
        if (!empty($_POST['budget'])) {
            if (preg_match($regexNumberLetter, $_POST['budget'])) {
                $budget = htmlspecialchars($_POST['budget']);
            } else {
                $errorList['budget'] = 'Veuillez séléctionner une catégorie';
            }
        } else {
            $errorList['budget'] = 'Veuillez séléctionner une catégorie';
        }

        if (!empty($_POST['description'])) {
            if (preg_match($regexName, $_POST['description'])) {
            $description = htmlspecialchars($_POST['description']);
            } else {
                $errorList['description'] = 'La saisie de votre ville est invalide';
            }
        } else {
            $errorList['description'] = 'Veuillez indiquer votre ville';
        }

        if (isset($_POST['submitRegister']) && count($errorList) == 0) {
            $project = new projects();

            $project->propertyTypes = $idPropertyTypes;
            $project->area = $area;
            $project->budget = $budget;
            $project->description = $description;
            $project->projectsInsertion();
        }
        if (count($errorList) == 0) {
            header('Location: http://buildr/login-register/login.php');
        }
    }


    
    
