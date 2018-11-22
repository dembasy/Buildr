<?php
include_once '../configuration.php';
$email = '';
$message = '';
$errorList = array();
if (isset($_POST['submitLogin'])) {
    if (!empty($_POST['email'])) {
        $email = htmlspecialchars($_POST['email']);
    } else {
        $errorList['email'] = 'Erreur dans la saisie de l\'adresse mail';
    }

    if (!empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $errorList['password'] = 'Erreur dans la saisie dans le mot de passe';
    }
    if (count($errorList) == 0) {
        $user = new users();
        $user->email = $email;
        if ($user->usersConnection()) {
            if (password_verify($password, $user->password)) {
            //la connexion se fait
                $message = USER_CONNECTION_SUCCESS;
            //On rempli la session avec les attributs de l'objet issus de l'hydratation
                $_SESSION['id'] = $user->id;
                $_SESSION['email'] = $user->email;
                $_SESSION['firstname'] = $user->firstname;
                $_SESSION['isConnect'] = true;
                header('Location: http://buildr/dashboard/dashboardPro.php');
                exit();
            } else {
            //la connexion échoue
                $message = 'Il y a eu une erreur ,Veuillez vérifier vos informations';
            }
        }
    }
} else {
    $errorList = USER_CONNECTION_ERROR;
}
if (isset($_GET['action'])) {
    //Si on veut se déconnecter
    if ($_GET['action'] == 'disconnect') {
        //destruction de la session
        session_destroy();
        //redirection de la page vers l'index
        header('Location:http://buildr/index.php');
    }
}
