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
    // On include le fichier configuration ou nos méthodes y sont stockées
    include_once 'configuration.php';
    // On va instancié un nouvel objet $usersType qui correspond au type d'utilisateur
    $usersType = new usersType();
    // On appelle la méthode getUsersType
    $usersTypeList = $usersType->getUsersType();
    // On va instancié un nouvel objet $user
    $user = new users();
    // définition de toute nos regex qui nous permettront de vérifier les valeurs entrés dans les inputs 
    $regexPhoneNumber = '/^[0][1-9][0-9]{8}$/';
    $regexzipCode = '/^[0-9]{5}$/';
    $regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-]+$/';
    $regexNumberLetter = '/^[0-9-a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';
    // On définie notre tableau d'erreur 
    $errorList = array();
//Condition pour le formulaire de l'inscription
    //On fait une condition pour le formulaire concernant l'inscription, au moment ou le bouton submit existera
    if (isset($_POST['submitRegister'])) {
        // On va vérifier que l'input lastname n'est pas vide 
        if (!empty($_POST['lastname'])) {
            // Si c'est le cas on va vérifier la valeur de l'input grâce à la regex qui est définie plus hauts dans notre fichiers
            if (preg_match($regexName, $_POST['lastname'])) {
                // Si c'est le cas on va passer nos informations qui ont été rentré dans l'input lastname dans les attributs de l'objet , puis faire un htmlspecialchars pour convertir les caractères spéciaux en html
                $user->lastname = htmlspecialchars($_POST['lastname']);
                // Sinon la valeur entré ne respecte pas la regex on va affiché un message d'erreur 
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
                $user->firstname = htmlspecialchars($_POST['firstname']);
            } else {
                $errorList['firstname'] = 'La saisie de votre prénom est invalide';
            }
        } else {
            $errorList['firstname'] = 'Veuillez indiquer votre prénom';
        }
        if (!empty($_POST['address'])) {
            if (preg_match($regexNumberLetter, $_POST['address'])) {
                $user->address = htmlspecialchars($_POST['address']);
            } else {
                $errorList['address'] = 'La saisie de votre adresse est invalide';
            }
        } else {
            $errorList['address'] = 'Veuillez indiquer votre adresse';
        }

        if (!empty($_POST['usersType'])) {
            if (preg_match($regexNumberLetter, $_POST['usersType'])) {
                $user->idUsersType = htmlspecialchars($_POST['usersType']);
            }
        }
        // On test si l'userType est == à 2 
        if ($_POST['usersType'] == 2) {
            // On test si le Post firm n'est pas vide 
            if (!empty($_POST['firm'])) {
                // On vérifie avec le preg match si la valeur respecte bien les valeurs que l'ont attends grâce a notre regex si c'est le cas
                if (preg_match($regexName, $_POST['firm'])) {
                // Si c'est le cas on va passer nos informations qui ont été rentré dans l'input firm dans les attributs de l'objet , puis faire un htmlspecialchars pour convertir les caractères spéciaux en html
                    $user->firm = htmlspecialchars($_POST['firm']);
                    // Sinon
                } else {
                    $errorList['firm'] = 'La saisie de votre société est invalide';
                }
                // Sinon l'input usersType est vide et qu'il correspond bien à 2
            } else {
                // On invite le détenteur de société d'en saisir une
                $errorList['firm'] = 'Veuillez saisir firm';
            }
        }

        if (!empty($_POST['postalCode'])) {
            if (preg_match($regexzipCode, $_POST['postalCode'])) {
                $user->postalCode = htmlspecialchars($_POST['postalCode']);
            } else {
                $errorList['postalCode'] = 'La saisie de votre code postale est invalide';
            }
        } else {
            $errorList['postalCode'] = 'Veuillez indiquer votre code postal';
        }
        if (!empty($_POST['city'])) {
            if (preg_match($regexNumberLetter, $_POST['city'])) {
                $user->idCity = htmlspecialchars($_POST['city']);
            } else {
                $errorList['city'] = 'La saisie de votre ville est invalide';
            }
        } else {
            $errorList['city'] = 'Veuillez indiquer votre ville';
        }
        if (!empty($_POST['phoneNumber'])) {
            if (preg_match($regexPhoneNumber, $_POST['phoneNumber'])) {
                $user->phoneNumber = htmlspecialchars($_POST['phoneNumber']);
            } else {
                $errorList['phoneNumber'] = 'La saisie de votre numéro de téléphone est invalide';
            }
        } else {
            $errorList['phoneNumber'] = 'Veuillez indiquer votre numéro de téléphone';
        }
        // On va faire une condition pour l'email qui dit que si le post email n'est pas vide et qui passe bien le filtre de l'email 
        if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            // Si c'est le cas on va passer nos informations qui ont été rentré dans l'input email dans les attributs de l'objet , puis faire un htmlspecialchars pour convertir les caractères spéciaux en html
            $user->email = htmlspecialchars($_POST['email']);
            // Sinon on va afficher un message d'erreur qui indique que le mail n'est pas valide 
        } else {
            $errorList['email'] = 'Votre email est invalide';
        }
        // Si le POST du mot de passe est vide et que c'est pareil pour la vérification du mot de pass et que le mot de passe est pareil que celui du mot de passe verification
        if (!empty($_POST['password']) && !empty($_POST['passwordVerify']) && $_POST['password'] == $_POST['passwordVerify']) {
            // on va passer nos informations qui ont été rentré dans l'input email dans les attributs de l'objet , puis faire un hash du mot de passe pour convertir 
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            //si les champs sont vides ou s'il ne sont pas identiques affichage d'un message d'erreur
        } else {
            // Sinon on va affiché le message d'erreur du mot de passe 
            $errorList['password'] = 'Veuillez vérifier votre mot de passe';
        }
        // Si le tableau d'erreur est = à 0
        if (count($errorList) == 0) {
            // Si lors de l'appel de la méthode usersRegister il n'y aucun soucis
            if ($user->usersRegister()) {
                // On redirige vers la page login.php pour se connecter
                header('Location: login.php');
                exit;
            }
        }
    }
}
