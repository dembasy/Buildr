
<?php

// Appel de l'Ajax
// On fait une condition pour déterminé si le PostalCodeSearch existe 
if (isset($_POST['postalCodeSearch'])) {
    // on va include le fichier configuration qui contient toute nos informations pour pouvoir nous connecter à la base données
    include_once '../configuration.php';
    // On instancie alors un nouvel objet $city comme la classe city 
    $city = new city();
    // On va passer nos informations qui ont été rentré dans l'input postalCode dans les attributs de l'objet 
    $city->postalCode = $_POST['postalCodeSearch'];
    // on va affiché le résultat de la requếte et ainsi aussi éxécuté la méthode getCityPostalCode
    echo json_encode($city->getCityByPostalCode());
} else {
    include_once 'configuration.php';
// Instanciation d'un nouvel objet qui nous permettra d'afficher le type de propriété
    $propertyTypes = new propertyTypes();
// On appelle la méthode getPropertyTypes
    $propertyTypesList = $propertyTypes->getPropertyTypes();
// Instanciation d'un nouvel objet qui nous permettra d'afficher la piece
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
// Instanciation d'un nouvel objet projet
    $project = new projects();
    // Condition pour le formulaire de modification d'un projet
    if (isset($_POST['modifyProject'])) {
        // On test si l'option rooms n'est pas vide 
        if (!empty($_POST['rooms'])) {
            // On insere la valeur de l'input dans nos attribut de l'objet
            $project->idRooms = htmlspecialchars($_POST['rooms']);
            // Sinon affiché une erreur invitant l'utilisateur à vérifier sa saisie
        } else {
            $errorList['rooms'] = 'Veuillez choisir la pièce que vous voulez renové';
        }
        // ON VA REPETER TOUT LE PROCESSUS DE VERIFICATION POUR LES INPUT QUI SONT A VERIFIES  
        if (!empty($_POST['propertyTypes'])) {
            $project->idPropertyTypes = htmlspecialchars($_POST['propertyTypes']);
        } else {
            $errorList['propertyTypes'] = 'Veuillez choisir un type de bien';
        }
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
        if (!empty($_POST['address'])) {
            if (preg_match($regexNumberLetter, $_POST['address'])) {
                $project->address = htmlspecialchars($_POST['address']);
            } else {
                $errorList['address'] = 'Veuillez vérifier la saisie de votre adresse';
            }
        } else {
            $errorList['address'] = 'Veuillez saisir votre adresse';
        }
        if (!empty($_POST['area'])) {
            if (preg_match($regexNumber, $_POST['area'])) {
                $project->area = htmlspecialchars($_POST['area']);
            } else {
                $errorList['area'] = 'Veuillez vérifier la saisie de la surface de votre bien';
            }
        } else {
            $errorList['area'] = 'Veuillez saisir une surface en mètre carré';
        }
        // Si l'input startBudget n'est pas vide
        if (!empty($_POST['startBudget'])) {
            // On vérifie que les valeurs entrée respecte bien nos regex
            if (preg_match($regexBudget, $_POST['startBudget'])) {
                // On fait une condition qui indique que si le budget de départ est inférieur ou égale à 1000
                if ($_POST['startBudget'] >= 1000) {
                    // On insere la valeur de l'input dans nos attribut de l'objet
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
                // On insere la valeur de l'input dans nos attribut de l'objet
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
                $errorList['moreInfos'] = 'Veuillez vérifier la saisie des informations complémentaires';
            }
        } else {
            $errorList['moreInfos'] = 'Veuillez saisir la partie informations complémentaires';
        }
        // Si le tableau d'erreur est vide
        if (count($errorList) == 0) {
            // On recupère l'id de User pour le récupérer
            $project->id = $_GET['id'];
            // On recupère la session du projet pour le récupérer
            $project->idUsers = $_SESSION['id'];
            // Si l'appel de la méthode a fonctionner
            if ($project->projectModifications()) {
                // On redirige vers la page projet avec en concaténation l'id du projet 
                header('Location:viewProject.php?id=' . $_GET['id']);
                exit;
            }
        }
    }
}
// On va récuperer l'id du projet 
$project->id = $_GET['id'];
// Appeler la méthode pour nous permettre de récuperer les informations du projet
$userProject = $project->getProjectInfosOnce();
