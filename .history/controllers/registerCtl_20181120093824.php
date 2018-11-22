<?php
//appel de l 'ajax
if (isset($_POST['postalCodeSearch'])) {
    include_once '../configuration.php';
    $city = new city();
    $city->postalCode = $_POST['postalCodeSearch'];
    echo json_encode($city->getCityByPostalCode());
} else {
    include_once 'configuration.php';
    $regexPhoneNumber = '/^[0][1-9][0-9]{8}$/';
    $regexzipCode = '/^[0-9]{5}$/';
    $regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-]+$/';
    $regexNumberLetter = '/^[0-9-a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';
    $errorList = array();
//condition pour le formulaire
    if (isset($_POST['submitRegister'])) {
        var_dump($_POST);
        if (!empty($_POST['lastname'])) {
            if (preg_match($regexName, $_POST['lastname'])) {
                $lastname = htmlspecialchars($_POST['lastname']);
            } else {
                $errorList['lastname'] = 'La saisie de votre nom est invalide';
            }
        } else {
            $errorList['lastname'] = 'Veuillez indiquer votre nom';
        }
        if (!empty($_POST['firstname'])) {
            if (preg_match($regexName, $_POST['firstname'])) {
                $firstname = htmlspecialchars($_POST['firstname']);
            } else {
                $errorList['firstname'] = 'La saisie de votre prénom est invalide';
            }
        } else {
            $errorList['firstname'] = 'Veuillez indiquer votre prénom';
        }
        if (!empty($_POST['address'])) {
            if (preg_match($regexNumberLetter, $_POST['address'])) {
                $address = htmlspecialchars($_POST['address']);
            } else {
                $errorList['address'] = 'La saisie de votre adresse est invalide';
            }
        } else {
            $errorList['address'] = 'Veuillez indiquer votre adresse';
        }
        if (!empty($_POST['usersType'])) {
            if (preg_match($regexNumberLetter, $_POST['usersType'])) {
                $idUsersType = htmlspecialchars($_POST['usersType']);
            } else {
                $errorList['usersType'] = 'Veuillez séléctionner une catégorie';
            }
        } else {
            $errorList['usersType'] = 'Veuillez séléctionner une catégorie';
        }
        

        if (!empty($_POST['firm'])) {
            if (preg_match($regexName, $_POST['firm'])) {
                $firm = htmlspecialchars($_POST['firm']);
            } else {
                $errorList['firm'] = 'La saisie de la Société est invalide';
            }
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
        if (!empty($_POST['phoneNumber'])) {
            if (preg_match($regexPhoneNumber, $_POST['phoneNumber'])) {
                $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
            } else {
                $errorList['phoneNumber'] = 'La saisie de votre numéro de téléphone est invalide';
            }
        } else {
            $errorList['phoneNumber'] = 'Veuillez indiquer votre numéro de téléphone';
        }

        if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email = htmlspecialchars($_POST['email']);
        } else {
            $errorList['email'] = 'Votre email est invalide';
        }
        if (!empty($_POST['password']) && !empty($_POST['passwordVerify']) && $_POST['password'] == $_POST['passwordVerify']) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            //si les champs sont vides ou s'il ne sont pas identiques affichage d'un message d'erreur
        } else {
            $errorList['password'] = 'Veuillez vérifier votre mot de passe';
        }
        if (isset($_POST['submitRegister']) && count($errorList) == 0) {
            $user = new users();
            $user->lastname = $lastname;
            $user->firstname = $firstname;
            $user->phoneNumber = $phoneNumber;
            $user->email = $email;
            $user->firm = $firm;
            $user->password = $password;
            $user->address = $address;
            $user->idCity = $city;
            $user->usersRegister();
        }
        if ($_POST['submitRegister'] == true){
                header('Location: http://buildr/login-register/login.php');

        }

    
    }
}   


    
    
