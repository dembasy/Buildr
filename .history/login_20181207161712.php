<?php
session_start();
include_once 'controllers/loginCtl.php';
include_once 'header.php';
var_dump($message);
?>

<div class="main-div">
<?php if($user->email = true) { ?>
    <p>Votre inscription a bien été prise en compte</p>
<?php } ?>
    <div class="panel">
        <h2 class="ml-5 mb-4">Me connecter</h2>
    </div>
    <form method="POST" action="#" id="Login">
        <div class="form-group">
            <input type="email" class="form-control"  name="email" id="email" placeholder=" Votre adresse mail">
        </div>
        <div class="form-group">
            <input type="password" class="form-control"  name="password" id="password" placeholder="Mot de passe">
        </div>
        <button type="submit" class="btn btn-primary" name="submitLogin" id="submitLogin">Connexion</button>
        <p class="text-danger"><?= isset($errorList['connexion']) ? $errorList['connexion'] : ''; ?></p>

    </form>
</div>
<?php include_once 'footer.php'; ?>