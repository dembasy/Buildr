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
    // On inclue le fichier configuration qui contient tout nos models
    include_once 'configuration.php';
    // on instancie un nouvel objet users qui va nous permettre de récuperer nos informations
    $profile = new users();

    // définition de toute nos regex qui nous permettront de vérifier les valeurs entrés dans les inputs 
    $regexPhoneNumber = '/^[0][1-9][0-9]{8}$/';
    $regexzipCode = '/^[0-9]{5}$/';
    $regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-]+$/';
    $regexNumberLetter = '/^[0-9-a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';
    // On définie notre tableau d'erreur 
    $errorList = array();
    //On fait une condition pour le formulaire concernant la modification, au moment ou le bouton modify existera
    if (isset($_POST['modify'])) {
        // On va vérifier que l'input lastname n'est pas vide 
        if (!empty($_POST['lastname'])) {
            // Si c'est le cas on va vérifier la valeur de l'input grâce à la regex qui est définie plus hauts dans notre fichiers
            if (preg_match($regexName, $_POST['lastname'])) {
                // Si c'est le cas on va passer nos informations qui ont été rentré dans l'input lastname dans les attributs de l'objet , puis faire un htmlspecialchars pour convertir les caractères spéciaux en html
                $profile->lastname = htmlspecialchars($_POST['lastname']);
                // Si la valeur entré ne respecte pas la regex on va affiché un message d'erreur 
            } else {
                $errorList['lastname'] = 'La saisie de votre nom est invalide';
            }
            // Si linput lastname est vide on va demander à l'utilisateur de saisir un nom 
        } else {
            $errorList['lastname'] = 'Veuillez indiquer votre nom';
        }
        // ON VA REPETER TOUT LE PROCESSUS DE VERIFICATION POUR LES INPUT QUI SONT A VERIFIES 

        if (!empty($_POST['firstname'])) {
            if (preg_match($regexName, $_POST['firstname'])) {
                $profile->firstname = htmlspecialchars($_POST['firstname']);
            } else {
                $errorList['firstname'] = 'La saisie de votre prénom est invalide';
            }
        } else {
            $errorList['firstname'] = 'Veuillez indiquer votre prénom';
        }
        if (!empty($_POST['address'])) {
            if (preg_match($regexNumberLetter, $_POST['address'])) {
                $profile->address = htmlspecialchars($_POST['address']);
            } else {
                $errorList['address'] = 'La saisie de votre adresse est invalide';
            }
        } else {
            $errorList['address'] = 'Veuillez indiquer votre adresse';
        }

        if (!empty($_POST['city'])) {
            if (preg_match($regexNumberLetter, $_POST['city'])) {
                $profile->idCity = htmlspecialchars($_POST['city']);
            } else {
                $errorList['city'] = 'La saisie de votre ville est invalide';
            }
        } else {
            $errorList['city'] = 'Veuillez indiquer votre ville';
        }
        if (!empty($_POST['phoneNumber'])) {
            if (preg_match($regexPhoneNumber, $_POST['phoneNumber'])) {
                $profile->phoneNumber = htmlspecialchars($_POST['phoneNumber']);
            } else {
                $errorList['phoneNumber'] = 'La saisie de votre numéro de téléphone est invalide';
            }
        } else {
            $errorList['phoneNumber'] = 'Veuillez indiquer votre numéro de téléphone';
        }
        // On va faire une condition pour l'email qui dit que si le post email n'est pas vide et qui passe bien le filtre de l'email 
        if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            // Si c'est le cas on va passer nos informations qui ont été rentré dans l'input email dans les attributs de l'objet , puis faire un htmlspecialchars pour convertir les caractères spéciaux en html
            $profile->email = htmlspecialchars($_POST['email']);
            // Sinon on va afficher un message d'erreur qui indique que le mail n'est pas valide 
        } else {
            $errorList['email'] = 'Votre email est invalide';
        }
        // On va verifier que le tableau d'erreur ne contient aucune erreur 
        if (count($errorList) == 0) {
            // Si c'est le cas on va récuperer l'idUser pour pouvoir effectuer la modification
            $profile->id = $_SESSION['id'];
            // on va appeler notre méthode 
            $profile->usersModifications();
        }
    }
    // Si le bouton delete existe 
    if (isset($_POST['deleteUser'])) {
        // On va récuperer l'iduser pour pouvoir aller le supprimer
        $profile->id = $_SESSION['id'];
        //Si la méthode est bien appeler 
        $profile->removeUsers();
            //destruction de la session
            session_unset();
            session_destroy();
            // On va rediriger vers l'index
            header('Location: http://buildr');
            exit;
        
    }
}
// On va récuperer l'iduser pour pouvoir aller afficher les informations dans les inputs
$profile->id = $_SESSION['id'];
// On va appeler la méthode permettant d'afficher les informations dans les inputs
$userProfile = $profile->getUsersInfos();


