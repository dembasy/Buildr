
<?php

//appel de l 'ajax
if (isset($_POST['postalCodeSearch'])) {
    // Ajout du fichier de configuration qui contient le model
    include_once '../configuration.php';
    // Instanciation de la class city 
    $city = new city();
    // On passe les éléments rempli
    $city->postalCode = $_POST['postalCodeSearch'];
    // On affiche la resultat de la méthode 
    echo json_encode($city->getCityByPostalCode());
} else {
    include_once 'configuration.php';
    ;
// On instancie la variable $propertyTypes qui va nous servir a affiché nos informations dans la liste déroulante
    $propertyTypes = new propertyTypes();
    // On appelle la méthode getPropertyTypes
    $propertyTypesList = $propertyTypes->getPropertyTypes();
// On instancie la variable $rooms  qui va nous servir a affiché nos informations dans la liste déroulante
    $rooms = new rooms();
    // On appelle la méthode getRoomsList
    $roomsList = $rooms->getRoomsList();

    // On instancie la variable $project qui nous servira à crée un projet
    $project = new projects();


    // Regex des différents inputs
    $regexPhoneNumber = '/^[0][1-9][0-9]{8}$/';
    $regexPostalCode = '/^[0-9]{5}$/';
    $regexBudget = '/^[0-9]+$/';
    $regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\'-\- ]+$/';
    $regexNumberLetter = '/^[0-9-a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';
    $regexNumber = '/^[0-9]+$/';
    $errorList = array();


//Condition pour le formulaire de création de projet
    if (isset($_POST['submitSurvey'])) {
        // On test si l'option rooms n'est pas vide  
        if (!empty($_POST['rooms'])) {
            // On insere dqans nos attribut la valeur de l'input  
            $project->idRooms = htmlspecialchars($_POST['rooms']);
            // Sinon affiché une erreur invitant l'utilisateur à vérifier sa saisie
        } else {
            $errorList['rooms'] = 'Veuillez choisir un type de propriété';
        }
        // ON VA REPETER TOUT LE PROCESSUS DE VERIFICATION POUR LES INPUT QUI SONT A VERIFIES  
        if (!empty($_POST['propertyTypes'])) {
            $project->idPropertyTypes = htmlspecialchars($_POST['propertyTypes']);
        } else {
            $errorList['propertyTypes'] = 'Veuillez choisir un type de propriété';
        }
        if (!empty($_POST['name'])) {
            if (preg_match($regexName, $_POST['name'])) {
                $project->name = htmlspecialchars($_POST['name']);
            } else {
                $errorList['name'] = 'La saisie du nom de votre projet est invalide';
            }
        } else {
            $errorList['name'] = 'Veuillez indiquer le nom de votre projet';
        }
        if (!empty($_POST['city'])) {
            if (preg_match($regexNumberLetter, $_POST['city'])) {
                $project->idCity = htmlspecialchars($_POST['city']);
            } else {
                $errorList['city'] = 'La saisie de votre ville est invalide';
            }
        } else {
            $errorList['city'] = 'Veuillez indiquer votre ville';
        }
        if (!empty($_POST['address'])) {
            if (preg_match($regexNumberLetter, $_POST['address'])) {
                $project->address = htmlspecialchars($_POST['address']);
            } else {
                $errorList['address'] = 'La saisie de votre ville est invalide';
            }
        } else {
            $errorList['address'] = 'Veuillez indiquer votre adresse';
        }
        if (!empty($_POST['area'])) {
            if (preg_match($regexNumber, $_POST['area'])) {
                $project->area = htmlspecialchars($_POST['area']);
            } else {
                $errorList['area'] = 'Veuillez vérifier la saisie';
            }
        } else {
            $errorList['area'] = 'Veuillez vérifier la saisie';
        }
        // Si l'input startBudget n'est pas vide
        if (!empty($_POST['startBudget'])) {
            // On vérifie que les valeurs entrée respecte bien nos regex
            if (preg_match($regexBudget, $_POST['startBudget'])) {
                // On fait une condition qui indique que si le budget de départ est inférieur ou égale à 1000
                if ($_POST['startBudget'] >= 1000) {
                    // On hydrate et on insére les informations communiqués
                    $project->startBudget = htmlspecialchars($_POST['startBudget']);
                } else {
                    // sinon On affiche un message d'erreur qui demande a l'user d'entré une valeur supérieur à 1000
                    $errorList['startBudget'] = 'Veuillez indiquez un budget supérieur à 1000€';
                }
                // Sinon on affiche un message d'erreur invitant à vérifier la saisie du budget de départ
            } else {
                $errorList['startBudget'] = 'Veuillez vérifier la saisie de votre budget de départ';
            }
            // S'il est vide on affiche un message d'erreur invitant à saisir un budget
        } else {
            $errorList['startBudget'] = 'Veuillez saisir un budget de départ';
        }
        // Si l'input endBudget n'est pas vide
        if (!empty($_POST['endBudget'])) {
            // On vérifie que les valeurs entrée respecte bien nos regex
            if (preg_match($regexBudget, $_POST['endBudget'])) {
                // On hydrate et on insére les informations communiqués
                $project->endBudget = htmlspecialchars($_POST['endBudget']);
                // Sinon on affiche un message d'erreur invitant à vérifier la saisie du budget maximum
            } else {
                $errorList['endBudget'] = 'Veuillez vérifier la saisie de votre budget maximum';
            }
            // S'il est vide on affiche un message d'erreur invitant à saisir un budget
        } else {
            $errorList['endBudget'] = 'Veuillez saisir un budget maximum';
        }
        // On fait une condition pour vérifier si le budget de départ est inférieur au budget maximum 
        // Si le tableau d'erreur de startBudget n'existe pas et si c'est le cas aussi pour le budget maximum
        if (!isset($errorList['startBudget']) && !isset($errorList['endBudget'])) {
            // Si le budget saisis et supérieur ou égale au budget maximum 
            if ($project->startBudget >= $project->endBudget) {
                // On affiche un message d'erreur pour indiquer que le premier montant doit etre inférieur au deuxieme
                $errorList['startBudget'] = 'Le premier montant doit être inférieur au deuxième';
            }
        }
        if (!empty($_POST['moreInfos'])) {
            if (preg_match($regexName, $_POST['moreInfos'])) {
                $project->moreInfos = htmlspecialchars($_POST['moreInfos']);
            } else {
                $errorList['moreInfos'] = 'Veuillez vérifier la saisie';
            }
        } else {
            $errorList['moreInfos'] = 'Veuillez vérifier la saisie';
        }
        // Si le tableau d'erreur est vide
        if (count($errorList) == 0) {
            // On recupère l'id de User pour le récupérer
            $project->idUsers = $_SESSION['id'];
            // Si l'appel de la méthode a fonctionner
            if ($project->projectsInsertion()) {
                // On redirige vers la page projet
                header('Location: project.php');
                exit;
            }
        }
    }
}

