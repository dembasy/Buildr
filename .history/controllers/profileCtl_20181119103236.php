<?php

//appel de l 'ajax
if (isset($_POST['postalCodeSearch'])) {
    include_once '../configuration.php';
    $city = new city();
    $city->postalCode = $_POST['postalCodeSearch'];
    echo json_encode($city->getCityByPostalCode());
} else {

    $profile = new users();
    if (isset($_SESSION['id'])) {
        $profile->id = $_SESSION['id'];
    } elseif (isset($_SESSION['id'])) {
        $profile->id = $_SESSION['id'];
    }
    // if (isset($_SESSION['id'])) {
        //Condition de vérification pour l'id
        if (isset($_GET['delete'])) {
            $profile = new users();
            $profile->id = $_SESSION['id']; 
            //Utilisation de la méthode de suppression
            if ($profile->removeUsers()) {
                session_unset();
                session_destroy();
                header('Location:http://buildr');
                exit;
            }
        }
    // }
    // include_once 'configuration.php';
    $regexPhoneNumber = '/^[0][1-9][0-9]{8}$/';
    $regexzipCode = '/^[0-9]{5}$/';
    $regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-]+$/';
    $regexNumberLetter = '/^[0-9-a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';
    $errorList = array();
    //condition pour le formulaire
    if (isset($_POST['modify'])) {
        if (!empty($_POST['lastname'])) {
            if (preg_match($regexName, $_POST['lastname'])) {
                $profile->lastname = htmlspecialchars($_POST['lastname']);
            } else {
                $errorList['lastname'] = 'La saisie de votre nom est invalide';
            }
        } else {
            $errorList['lastname'] = 'Veuillez indiquer votre nom';
        }
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

        if (!empty($_POST['postalCode'])) {
            if (preg_match($regexzipCode, $_POST['postalCode'])) {
                $profile->postalCode = htmlspecialchars($_POST['postalCode']);
            } else {
                $errorList['postalCode'] = 'La saisie de votre code postale est invalide';
            }
        } else {
            $errorList['postalCode'] = 'Veuillez indiquer votre code postal';
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

        if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $profile->email = htmlspecialchars($_POST['email']);
        } else {
            $errorList['email'] = 'Votre email est invalide';
        }
        if (count($errorList) == 0) {
            $profile->id = $_SESSION['id'];
            $profile->usersModifications();
        }
    }
}
$userProfile = $profile->getUsersInformations();




