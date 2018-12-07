<?php

//Include du fichier de configuration ou se trouve les modele et éléments permettant de communiquer avec la base de données
include_once 'configuration.php';
// Liste des attributs que l'on va utilisé pour pouvoir se connecter
$email = '';
$message = '';
$errorList = array();
// Condition pour le formulaire de création de projet, si le bouton submitRegister est
if (isset($_POST['submitLogin'])) {
    // Si l'input n'est pas vide et que le filtre est passé
    if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        // Insérer dans la variable $email la valeur de l'input
        $email = htmlspecialchars($_POST['email']);
        // Sinon
    } else {
        // Afficher le message d'erreur invitant l'utilisateur a rentrer les bonnes valeurs
        $errorList['email'] = 'Votre email est invalide';
    }
    // Condition pour le formulaire de création de projet, si le bouton submitRegister est
    if (!empty($_POST['password'])) {
        // Insérer dans la variable $password la valeur de l'inputs
        $password = $_POST['password'];
        // Sinon
    } else {
        // Afficher le message d'erreur invitant l'utilisateur a rentrer les bonnes valeurs
        $errorList['password'] = 'Erreur dans la saisie dans le mot de passe';
    }
    // Si le tableau d'erreur ne contient aucune erreur alors
    if (count($errorList) == 0) {
        // On instancie la variable user
        $user = new users();
        // Puis on passe les éléments rempli dans cette même variable
        $user->email = $email;
        // On rempli la session avec les attributs de l'objet issus de l'hydratation
        if ($user->usersConnection()) {
            //On rempli la session avec les attributs de l'objet issus de l'hydratation
            if (password_verify($password, $user->password)) {
                //la connexion se fait
                $message = USER_CONNECTION_SUCCESS;
                //On rempli la session avec les attributs de l'objet issus de l'hydratation
                $_SESSION['id'] = $user->id;
                $_SESSION['email'] = $user->email;
                $_SESSION['firstname'] = $user->firstname;
                $_SESSION['isConnect'] = true;
                //On rempli la session avec les attributs de l'objet issus de l'hydratation
                header('Location: estimations.php');
                exit;
            } else {
                //la connexion échoue
                $message = USER_CONNECTION_ERROR;
            }
        } else {
               $errorList['connexion'] = 'Erreur connexion, veuillez vérifier l\'email ou le mot de passe';
            
        }
    }
}