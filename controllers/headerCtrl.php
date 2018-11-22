<?php

if (isset($_GET['action'])) {
    //Si on veut se déconnecter
    if ($_GET['action'] == 'disconnect') {
        //destruction de la session
        session_destroy();
        //redirection de la page vers l'index
        header('location:index.php');
    }
}

//choix de la langue
if (!empty($_GET['lang'])) {
    //on enregistre la langue de l'utilisateur
    $_SESSION['lang'] = $_GET['lang'];
}
//Si dans la session on a une langue on la charge sinon c'est le français par défaut
include_once 'lang/' . (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'FR_FR') . '.php';

    $login = '';
$errorList = array();
$message = '';

if (!empty($_POST['email'])) {
    $login = htmlspecialchars($_POST['email']);
} else {
    $errorList['email'] = 'login';
}

if (!empty($_POST['password'])) {
    $password = $_POST['password'];
} else {
    $errorList['password'] = 'password';
}
