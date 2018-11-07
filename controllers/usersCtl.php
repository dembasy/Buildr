<?php
if (isset($_POST['postalCodeSearch'])) {
    include '../configuration.php';
    $city = new city();
    $city->postalCode = $_POST['postalCodeSearch'];
    echo json_encode($city->postalCodeSearch());
} else {

$lastname = '';
$firstname = '';
$mail = '';
$address = '';
$password = '';
$city = '';
$postalCode = '';
$passwordVerify = '';
$errorList = array();

//Appel AJAX
//Validation du formulaire
 //include 'configuration.php';
    if (!empty($_POST['lastname'])) {
        $lastname = htmlspecialchars($_POST['lastname']);
    } else {
        $errorList['lastname'] = ERROR_LASTNAME;
    }

    if (!empty($_POST['firstname'])) {
        $firstname = htmlspecialchars($_POST['firstname']);
    } else {
        $errorList['firstname'] = ERROR_FIRSTNAME;
    }

    if (!empty($_POST['mail']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $mail = htmlspecialchars($_POST['mail']);
    } else {
        $errorList['mail'] = ERROR_MAIL;
    }

    if (!empty($_POST['password']) && !empty($_POST['passwordVerify']) && $_POST['password'] == $_POST['passwordVerify']) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
        $errorList['password'] = ERROR_PASSWORD;
    }

    if (!empty($_POST['address'])) {
        $login = htmlspecialchars($_POST['address']);
    } else {
        $errorList['address'] = ERROR_ADDRESS;
    }
    if (!empty($_POST['city'])) {
        $login = htmlspecialchars($_POST['city']);
    } else {
        $errorList['city'] = ERROR_CITY;
    }
    if (!empty($_POST['postalCode'])) {
        $login = htmlspecialchars($_POST['postalCode']);
    } else {
        $errorList['postalCode'] = ERROR_POSTALCODE;
    }

    if (count($errorList) == 0) {
        $user = new users();
        $user->lastname = $lastname;
        $user->firstname = $firstname;
        $user->mail = $mail;
        $user->password = $password;
        $user->login = $login;
        $user->userRegister();
    }
}