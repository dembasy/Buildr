<?php 
    session_start();
    include_once '../lang/FR_FR.php'; 
    include_once '../controllers/loginCtl.php'; 
    include_once '../class/database.php'; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Buildr | Connexion </title>
    <!-- Bootstrap Core CSS -->
    <!-- <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Custom CSS -->
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/argon.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Se connecter</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="#" >
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Adresse email" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mot de passe" name="password" type="password" value="">
                                </div>

                                <!-- Change this to a button or input when using this as a form -->
                                <input  type="submit" class="btn btn-lg btn-success btn-block" value="Connexion" name="submitLogin" />
                            </fieldset>
                        </form>
                    </div>
                                <div class="panel-heading">
                                    <h5 class="success">Votre inscription a bien été prise en compte ! <br> Vous pouvez vous connectez</h5>
                                </div>
                </div>
            </div>
        </div>
        <div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="assets/js/script.js"></script>
</body>
</html>
