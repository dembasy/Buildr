<?php
session_start();
include_once 'lang/FR_FR.php';
include_once 'class/database.php';
include_once 'controllers/loginCtl.php';
include_once 'header.php';
?>

<div class="main-div">
    <div class="panel">
        <h2>Me connecter</h2>
        <p>Votre inscription a bien été prise en compte ! <br> Vous pouvez vous connecter</p>
    </div>
    <form method="POST" action="#" id="Login">
        <div class="form-group">
            <input type="email" class="form-control"  name="email" id="email" placeholder=" Votre adresse mail">
        </div>
        <div class="form-group">
            <input type="password" class="form-control"  name="password" id="password" placeholder="Mot de passe">
        </div>
        <button type="submit" class="btn btn-primary" name="submitLogin" id="submitLogin">Connexion</button>
    </form>
</div>
<?php include_once 'footer.php'; ?>