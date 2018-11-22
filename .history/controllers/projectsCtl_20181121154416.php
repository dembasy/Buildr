<?php
//appel de l 'ajax
    include_once 'configuration.php';
    $regexPhoneNumber = '/^[0][1-9][0-9]{8}$/';
    $regexzipCode = '/^[0-9]{5}$/';
    $regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-]+$/';
    $regexNumberLetter = '/^[0-9-a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';
    $errorList = array();
//condition pour le formulaire
    if (isset($_POST['submitSurvey'])) {
        var_dump($_POST);
        if (!empty($_POST['room'])) {
            if (preg_match($regexName, $_POST['room'])) {
                $lastname = htmlspecialchars($_POST['room']);
            } else {
                $errorList['room'] = 'La saisie de votre nom est invalide';
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

        if (!empty($_POST['city'])) {
            if (preg_match($regexNumberLetter, $_POST['city'])) {
                $city = htmlspecialchars($_POST['city']);
            } else {
                $errorList['city'] = 'La saisie de votre ville est invalide';
            }
        } else {
            $errorList['city'] = 'Veuillez indiquer votre ville';
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
            $user->idUsersType = $idUsersType;
            $user->idCity = $city;
            $user->usersRegister();
        }
        if (count($errorList) == 0) {
            header('Location: http://buildr/login-register/login.php');
        }
    }


    
    
