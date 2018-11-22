
<?php


//appel de l 'ajax
include_once 'configuration.php';
$regexPhoneNumber = '/^[0][1-9][0-9]{8}$/';
$regexzipCode = '/^[0-9]{5}$/';
$regexBudget = '/^[0-9-a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';
$regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';
$regexNumberLetter = '/^[0-9-a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';
$errorList = array();
//condition pour le formulaire
if (isset($_POST['submitSurvey'])) {
    var_dump($_POST);
    var_dump($errorList);
    // var_dump($errorList);
    if (!empty($_POST['room'])) {
        if (preg_match($regexNumberLetter, $_POST['room'])) {
            $room = htmlspecialchars($_POST['room']);
        } else {
            $errorList['room'] = 'Veuillez vérifier la saisiee';
        }
    } else {
        $errorList['name'] = 'Veuillez vérifier la saisie';
    }
    if (!empty($_POST['propertyTypes'])) {
        if (preg_match($regexNumberLetter, $_POST['propertyTypes'])) {
            $propertyTypes = htmlspecialchars($_POST['propertyTypes']);
        } else {
            $errorList['propertyTypes'] = 'Veuillez vérifier la saisiee';
        }
    } else {
        $errorList['propertyTypes'] = 'Veuillez vérifier la saisie';
    }
    if (!empty($_POST['postalCode'])) {
        if (preg_match($regexzipCode, $_POST['postalCode'])) {
            $postalCode = htmlspecialchars($_POST['postalCode']);
        } else {
            $errorList['postalCode'] = 'La saisie de votre code postale est invalide';
        }
    } else {
        $errorList['postalCode'] = 'Veuillez indiquer votre code postal';
    }
    if (!empty($_POST['city'])) {
        if (preg_match($regexNumberLetter, $_POST['city'])) {
            $city = htmlspecialchars($_POST['city']);
        } else {
            $errorList['city'] = 'La saisie de votre ville est invalide';
        }
    } else {
        $errorList['city'] = 'Veuillez indiquer votre ville';
    }
    if (!empty($_POST['address'])) {
        if (preg_match($regexNumberLetter, $_POST['address'])) {
            $address = htmlspecialchars($_POST['address']);
        } else {
            $errorList['address'] = 'Veuillez vérifier la saisie';
        }
    } else {
        $errorList['address'] = 'Veuillez vérifier la saisie';
    }
    if (!empty($_POST['area'])) {
        if (preg_match($regexNumberLetter, $_POST['area'])) {
            $area = htmlspecialchars($_POST['area']);
        } else {
            $errorList['area'] = 'Veuillez vérifier la saisie';
        }
    } else {
        $errorList['area'] = 'Veuillez vérifier la saisie';
    }
    if (!empty($_POST['budget'])) {
        if($budget >= 1000 && $budget <= 10000){
            $errorList = 'Veuillez indiquez un budget';
        }
        if (preg_match($regexBudget, $_POST['budget'])) {
            $budget = htmlspecialchars($_POST['budget']);
        } else {
            $errorList['budget'] = 'Veuillez vérifier la saisie';
        }
    } else {
        $errorList['budget'] = 'Veuillez vérifier la saisie';
    }
    if (!empty($_POST['date'])) {
        if (preg_match($regexNumberLetter, $_POST['date'])) {
            $date = htmlspecialchars($_POST['date']);
        } else {
            $errorList['date'] = 'Veuillez vérifier la saisie';
        }
    } else {
        $errorList['description'] = 'Veuillez vérifier la saisie';
    }
    if (!empty($_POST['moreInfos'])) {
        if (preg_match($regexName, $_POST['moreInfos'])) {
            $moreInfos = htmlspecialchars($_POST['moreInfos']);
        } else {
            $errorList['moreInfos'] = 'Veuillez vérifier la saisie';
        }
    } else {
        $errorList['moreInfos'] = 'Veuillez vérifier la saisie';
    }
    
    if (isset($_POST['submitSurvey']) && count($errorList) == 0) {
        $project = new projects();
        $project->room = $room;
        $project->address = $address;
        $project->area = $area;
        $project->budget = $budget;
        $project->date = $date;
        $project->moreInfos = $moreInfos;
        $project->startBudget = $startBudget;
        $project->endBudgets = $endBudget;
        $project->room = $idRooms;
        $project->idPropertyTypes = $propertyTypes;
        $project->idCity = $idCity;
        $project->projectsInsertion();
    }
    // if (count($errorList) == 0) {
        //     header('Location: http://buildr/dashboard/resultsBuildr.php');
        // }
    }
    
    $propertyTypes = new propertyTypes();
    // On appelle la méthode getPropertyTypes
    $propertyTypesList = $propertyTypes->getPropertyTypes();
        
    $rooms = new rooms();
    // On appelle la méthode getPropertyTypes
    $roomsList = $rooms->getRoomsList();
        
