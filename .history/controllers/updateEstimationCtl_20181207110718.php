
<?php

//appel de l 'ajax
if (isset($_POST['postalCodeSearch'])) {
// Ajout du fichier de configuration qui contient le model
    include_once '../configuration.php';
// Instanciation de la class city 
    $city = new city();
    $city->postalCode = $_POST['postalCodeSearch'];

    echo json_encode($city->getCityByPostalCode());
} else {
    include_once 'configuration.php';

    $propertyTypes = new propertyTypes();
// On appelle la méthode getPropertyTypes
    $propertyTypesList = $propertyTypes->getPropertyTypes();

    $rooms = new rooms();
// On appelle la méthode getRoomsList
    $roomsList = $rooms->getRoomsList();

// Regex des différents inputs
    $regexPhoneNumber = '/^[0][1-9][0-9]{8}$/';
    $regexPostalCode = '/^[0-9]{5}$/';
    $regexBudget = '/^[0-9]+$/';
    $regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-\' ]+$/';
    $regexNumberLetter = '/^[0-9-a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';
    $regexNumber = '/^[0-9]+$/';
    $errorList = array();

    $project = new projects();
//Condition pour le formulaire de création de projet
    if (isset($_POST['modifyProject'])) {
// Si l'input n'est pas vide 
        if (!empty($_POST['rooms'])) {
// Insérer dans la variable $room la valeur de l'input
            $project->idRooms = htmlspecialchars($_POST['rooms']);
// Sinon affiché une erreur invitant l'utilisateur à vérifier sa saisie
        } else {
            $errorList['rooms'] = 'Veuillez choisir la pièce que vous voulez renové';
        }
// Si l'input n'est pas vide
        if (!empty($_POST['propertyTypes'])) {
// Insérer dans la variable $propertyTypes la valeur de l'input
            $project->idPropertyTypes = htmlspecialchars($_POST['propertyTypes']);
        } else {
// Sinon affiché une erreur invitant l'utilisateur à vérifier sa saisie    
            $errorList['propertyTypes'] = 'Veuillez choisir un type de bien';
        }

// Si l'input n'est pas vide
        if (!empty($_POST['city'])) {
            if (preg_match($regexNumberLetter, $_POST['city'])) {
                $project->idCity = htmlspecialchars($_POST['city']);
            } else {
                $errorList['city'] = 'Veuillez vérifier la saisie de votre ville';
            }
        } else {
            $errorList['city'] = 'Veuillez indiquer votre ville';
        }
        if (!empty($_POST['name'])) {
            if (preg_match($regexName, $_POST['name'])) {
                $project->name = htmlspecialchars($_POST['name']);
            } else {
                $errorList['name'] = 'Veuillez vérifier la saisie du nom de votre projet';
            }
        } else {
            $errorList['name'] = 'Veuillez saisir le nom de votre projet';
        }
// Si l'input n'est pas vide
        if (!empty($_POST['address'])) {
            if (preg_match($regexNumberLetter, $_POST['address'])) {
                $project->address = htmlspecialchars($_POST['address']);
            } else {
                $errorList['address'] = 'Veuillez vérifier la saisie de votre adresse';
            }
        } else {
            $errorList['address'] = 'Veuillez saisir votre adresse';
        }
// Si l'input n'est pas vide
        if (!empty($_POST['area'])) {
            if (preg_match($regexNumber, $_POST['area'])) {
                $project->area = htmlspecialchars($_POST['area']);
            } else {
                $errorList['area'] = 'Veuillez vérifier la saisie de la surface de votre bien';
            }
        } else {
            $errorList['area'] = 'Veuillez saisir une surface en mètre carré';
        }
// Si l'input n'est pas vide
        if (!empty($_POST['startBudget'])) {
            if (preg_match($regexBudget, $_POST['startBudget'])) {
                if ($_POST['startBudget'] >= 1000) {
                    $project->startBudget = htmlspecialchars($_POST['startBudget']);
                } else {
                    $errorList['startBudget'] = 'Veuillez indiquez un budget supérieur à 1000€';
                }
            } else {
                $errorList['startBudget'] = 'Veuillez vérifier la saisie de votre budget de départ';
            }
        } else {
            $errorList['startBudget'] = 'Veuillez saisir un budget de départ';
        }

        if (!empty($_POST['endBudget'])) {
            if (preg_match($regexBudget, $_POST['endBudget'])) {
                $project->endBudget = htmlspecialchars($_POST['endBudget']);
            } else {
                $errorList['endBudget'] = 'Veuillez vérifier la saisie de votre budget maxiumum';
            }
        } else {
            $errorList['endBudget'] = 'Veuillez saisir un budget maximum';
        }

        if (!isset($errorList['startBudget']) && !isset($errorList['endBudget'])) {
            if ($project->startBudget >= $project->endBudget) {
                $errorList['startBudget'] = 'Le premier montant doit être inférieur au deuxième';
            }
        }

        if (!empty($_POST['moreInfos'])) {
            if (preg_match($regexName, $_POST['moreInfos'])) {
                $project->moreInfos = htmlspecialchars($_POST['moreInfos']);
            } else {
                $errorList['moreInfos'] = 'Veuillez vérifier des informations complémentaires';
            }
        } else {
            $errorList['moreInfos'] = 'Veuillez saisir la partie informations complémentaires';
        }


        if (count($errorList) == 0) {
            $project->id = $_GET['id'];
            $project->idUsers = $_SESSION['id'];
            $project->projectModifications();
            if ($project->projectModifications()) {
                header('Location:viewEstimation.php?id=' . $_GET['id']);
                exit;
            }
        }
    }
}

$project->id = $_GET['id'];
$userProject = $project->getProjectInfosOnce();

if (isset($_POST['deleteProject'])) {
    $profile->id = $_GET['id'];
    //Utilisation de la méthode de suppression
    if ($profile->removeProject()) {
        header('Location: estimation.php');
        exit;
    }
}
