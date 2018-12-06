<?php

// Appel de l 'ajax
// Appel de l 'ajax
// On définit donc que si le PostalCodeSearch est définie
if (isset($_POST['postalCodeSearch'])) {
    // On va include le fichier configuration qui contient toute nos informations pour pouvoir nous connecter à la base données
    include_once '../configuration.php';
    // On instancie alors un nouvel objet $city comme la classe city 
    $city = new city();
    $city->postalCode = $_POST['postalCodeSearch'];
    // On va affiché le résultat de la requếte et ainsi aussi éxécuté la requête getCityPostalCode
    echo json_encode($city->getCityByPostalCode());
    // Sinon
} else {
    // On include le fichier configuration ou nos méthodes y sont stockées
    include_once 'configuration.php';

    // On va instancié un nouvel objet $usersType qui correspond au type d'utilisateur
    $usersType = new usersType();
    // On appelle la méthode getUsersType
    $usersTypeList = $usersType->getUsersType();

    // Regex des différents inputs
    $regexPhoneNumber = '/^[0][1-9][0-9]{8}$/';
    $regexzipCode = '/^[0-9]{5}$/';
    $regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-]+$/';
    $regexNumberLetter = '/^[0-9-a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';
    $errorList = array();

//Condition pour le formulaire de l'inscription
// Si le bouton submitRegister est envoyé 
    if (isset($_POST['submitRegister'])) {
        // On test si l'input n'est pas vide lastname 
        if (!empty($_POST['lastname'])) {
            // On vérifie avec le preg match si la valeur respecte bien les valeurs que l'ont attends si c'est le cas
            if (preg_match($regexName, $_POST['lastname'])) {
                // Hydratation de la valeur de l'input
                $user->lastname = htmlspecialchars($_POST['lastname']);
                // Sinon
            } else {
                // On indique qu'il y a eu une erreur et on invite l'utilisateur a resaisir une valeur
                $errorList['lastname'] = 'La saisie de votre nom est invalide';
            }
            // On indique qu'il y a eu une erreur et on invite a resaisir une valeur
        } else {
            $errorList['lastname'] = 'Veuillez indiquer votre nom';
        }
       // On test si l'input n'est pas vide firstname 
        if (!empty($_POST['firstname'])) {
            // On vérifie avec le preg match si la valeur respecte bien les valeurs que l'ont attends si c'est le cas
            if (preg_match($regexName, $_POST['firstname'])) {
                // Hydratation de la valeur de l'input
                $user->firstname = htmlspecialchars($_POST['firstname']);
                // Sinon
            } else {
                // On indique qu'il y a eu une erreur et on invite a resaisir une valeur
                $errorList['firstname'] = 'La saisie de votre prénom est invalide';
            }
            // Sinon
        } else {
            // On indique qu'il y a eu une erreur et on invite a resaisir une valeur
            $errorList['firstname'] = 'Veuillez indiquer votre prénom';
        }
       // On test si l'input n'est pas vide firstname 
        if (!empty($_POST['address'])) {
            // On vérifie avec le preg match si la valeur respecte bien les valeurs que l'ont attends si c'est le cas
            if (preg_match($regexNumberLetter, $_POST['address'])) {
                // Hydratation de la valeur de l'input
                $user->address = htmlspecialchars($_POST['address']);
                // Sinon
            } else {
                // Insérer dans la variable $address la valeur de l'input
                $errorList['address'] = 'La saisie de votre adresse est invalide';
            }
            // Sinon
        } else {
            // Insérer dans la variable $lastname la valeur de l'input
            $errorList['address'] = 'Veuillez indiquer votre adresse';
        }

        // Si l'input n'est pas vide
        if (!empty($_POST['usersType'])) {
            // Insérer dans la variable $lastname la valeur de l'input
            if (preg_match($regexNumberLetter, $_POST['usersType'])) {
                // Insérer dans la variable $lastname la valeur de l'input
                $user->usersType = htmlspecialchars($_POST['usersType']);
                // Insérer dans la variable $lastname la valeur de l'input
            } else {
                // Insérer dans la variable $lastname la valeur de l'input
                $errorList['usersType'] = 'Veuillez séléctionner une catégorie';
            }
            // Insérer dans la variable $lastname la valeur de l'input
        } else {
            // Insérer dans la variable $lastname la valeur de l'input
            $errorList['usersType'] = 'Veuillez séléctionner une catégorie';
        }


        // Si l'input n'est pas vide
        if (!empty($_POST['firm']) && $usersType == 2) {

            // Insérer dans la variable $firm la valeur de l'input
            if (preg_match($regexName, $_POST['firm'])) {
                // Insérer dans la variable $firm la valeur de l'input
                $user->firm = htmlspecialchars($_POST['firm']);
                // Insérer dans la variable $firm la valeur de l'input
            } else {
                $errorList['firm'] = 'Saisie invalide';
            }
        } else if (empty($_POST['firm']) && $usersType == 2) {
            // Insérer dans la variable $firm la valeur de l'input
            $errorList['firm'] = 'Veuillez saisir firm';
        }

        // Si l'input n'est pas vide
        if (!empty($_POST['postalCode'])) {
            // Insérer dans la variable $lastname la valeur de l'input
            if (preg_match($regexzipCode, $_POST['postalCode'])) {
                // Insérer dans la variable $lastname la valeur de l'input
                $user->postalCode = htmlspecialchars($_POST['postalCode']);
                // Insérer dans la variable $lastname la valeur de l'input
            } else {
                // Insérer dans la variable $lastname la valeur de l'input
                $errorList['postalCode'] = 'La saisie de votre code postale est invalide';
            }
            // Insérer dans la variable $lastname la valeur de l'input
        } else {
            // Insérer dans la variable $lastname la valeur de l'input
            $errorList['postalCode'] = 'Veuillez indiquer votre code postal';
        }
        // Si l'input n'est pas vide
        if (!empty($_POST['city'])) {
            // Insérer dans la variable $lastname la valeur de l'input
            if (preg_match($regexNumberLetter, $_POST['city'])) {
                // Insérer dans la variable $lastname la valeur de l'input
                $user->city = htmlspecialchars($_POST['city']);
                // Insérer dans la variable $lastname la valeur de l'input
            } else {
                // Insérer dans la variable $lastname la valeur de l'input
                $errorList['city'] = 'La saisie de votre ville est invalide';
            }
            // Insérer dans la variable $lastname la valeur de l'input
        } else {
            // Insérer dans la variable $lastname la valeur de l'input
            $errorList['city'] = 'Veuillez indiquer votre ville';
        }
        // Si l'input n'est pas vide
        if (!empty($_POST['phoneNumber'])) {
            // Insérer dans la variable $lastname la valeur de l'input
            if (preg_match($regexPhoneNumber, $_POST['phoneNumber'])) {
                // Insérer dans la variable $lastname la valeur de l'input
                $user->phoneNumber = htmlspecialchars($_POST['phoneNumber']);
                // Insérer dans la variable $lastname la valeur de l'input
            } else {
                // Insérer dans la variable $lastname la valeur de l'input
                $errorList['phoneNumber'] = 'La saisie de votre numéro de téléphone est invalide';
            }
            // Insérer dans la variable $lastname la valeur de l'input
        } else {
            // Insérer dans la variable $lastname la valeur de l'input
            $errorList['phoneNumber'] = 'Veuillez indiquer votre numéro de téléphone';
        }
        // Si l'input n'est pas vide
        if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            // Insérer dans la variable $lastname la valeur de l'input
            $user->email = htmlspecialchars($_POST['email']);
            // Insérer dans la variable $lastname la valeur de l'input
        } else {
            // Insérer dans la variable $lastname la valeur de l'input
            $errorList['email'] = 'Votre email est invalide';
        }
        // Si l'input n'est pas vide
        if (!empty($_POST['password']) && !empty($_POST['passwordVerify']) && $_POST['password'] == $_POST['passwordVerify']) {
            // Insérer dans la variable $lastname la valeur de l'input
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            //si les champs sont vides ou s'il ne sont pas identiques affichage d'un message d'erreur
        } else {
            // Insérer dans la variable $lastname la valeur de l'input
            $errorList['password'] = 'Veuillez vérifier votre mot de passe';
        }
        // Si l'input n'est pas vide
        if (isset($_POST['submitRegister']) && count($errorList) == 0) {
            // Insérer dans la variable $lastname la valeur de l'input
            $user = new users();
            // Insérer dans la variable $lastname la valeur de l'input
            $user->usersRegister();
        }
        // Insérer dans la variable $lastname la valeur de l'input
        if (count($errorList) == 0) {
            // Insérer dans la variable $lastname la valeur de l'input
            header('Location: http://login.php');
            exit;
        }
    }
}
