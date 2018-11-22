
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
    // var_dump($errorList);
    if (!empty($_POST['room'])) {
        $room = htmlspecialchars($_POST['room']);
    } else {
        $errorList['room'] = 'Veuillez vérifier la saisie';
    }
    if (!empty($_POST['propertyTypes'])) {
            $propertyTypes = htmlspecialchars($_POST['propertyTypes']);
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
    if (!empty($_POST['startBudget'])) {
        // if($_POST['startBudget'] <= 1000){
            // $errorList = 'Veuillez indiquez un budget supérieur à 1000';
            if (preg_match($regexBudget, $_POST['startBudget'])) {
                $startBudget = htmlspecialchars($_POST['startBudget']);
            } else {
                $errorList['startBudget'] = 'Veuillez vérifier la saisie';
            }
        // }
    } else {
        $errorList['startBudget'] = 'Veuillez vérifier la saisie';
    }
    if (!empty($_POST['endBudget'])) {
        // if($_POST['startBudget'] >= 100000){
            // $errorList = 'Veuillez indiquez un budget maximum à 100000';
            if (preg_match($regexBudget, $_POST['endBudget'])) {
                $endBudget = htmlspecialchars($_POST['endBudget']);
            } else {
                $errorList['endBudget'] = 'Veuillez vérifier la saisie';
            // }
        }
    } else {
        $errorList['endBudget'] = 'Veuillez vérifier la saisie';
    }
//    if (!empty($_POST['date'])) {
//        if (preg_match($regexNumberLetter, $_POST['date'])) {
//            $date = htmlspecialchars($_POST['date']);
//        } else {
//            $errorList['date'] = 'Veuillez vérifier la saisie';
//        }
//    } else {
//        $errorList['description'] = 'Veuillez vérifier la saisie';
//    }
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
        $project->address = $address;
        $project->area = $area;
        $project->moreInfos = $moreInfos;
        $project->startBudget = $startBudget;
        $project->endBudget = $endBudget;
        $project->idRooms = $room;
        $project->idPropertyTypes = $propertyTypes;
        $project->idCity = $city;
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
    // On appelle la méthode getRoomsList
    $roomsList = $rooms->getRoomsList();
    