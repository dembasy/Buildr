<!DOCTYPE html>
<html lang="en" class="full-height">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Buildr</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.15/css/mdb.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.min.css">
        <link rel="shortcut icon" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/favicon.ico">
        <link rel="stylesheet"  href="assets/css/style.css" />
    </head>
    <body>
        <?php if ($_SERVER['PHP_SELF'] == '/index.php') { ?>
            <header>
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <a class=" navbar-brand brand-size" href="#"><strong>Buildr</strong></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Comment ça marche ?</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Réalisations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php"><i class="fas fa-wrench fa-style"></i> Espace Pro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php"><i class="far fa-user-circle fa-style"></i> Espace Client</a>
                            </li>       
                        </ul>
                    </div>
                </nav>
                    <div class="view intro-2">
        <div class="flex-center">
            <div class="container text-left white-text wow fadeInUp">
                <h1 class="brand-size mb-2">Buildr</h1>
                <h5>Vous aide à trouver des maîtres d'oeuvre qualifiés et de confiance pour vos travaux de rénovations</h5>
                <p >Vous souhaitez faire une estimation ? <br> Cliquez sur le bouton</p>
                <br>
                <a class="btn btn-default" href="http://buildr/register.php">Commencez</a>
            </div>
            <div class="float-right">
                <img class="background-img-top" src="assets/img/undraw_ordinary_day_xi0c.svg" alt="house illustrations">
            </div>
        </div>
    </div>   
            </header>
        <?php } else if ($_SERVER['PHP_SELF'] == '/login.php') { ?>
            <nav class="navbar-login">
                <a class="navbar-brand" href="http://buildr/index.php">Buildr</a>
            </nav>
        <?php } else { ?>
                <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand brand-size" href="index.php">Buildr</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><?= sprintf(NAV_WELCOME,$_SESSION['firstname']) ?><i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="nav-item dropdown">
                        <?php if (!isset($_SESSION['isConnect'])) { ?>
                            <a class = "nav-link" href="login.php"><?= NAV_CONNECT ?></a>
                        </li>
                            <li class="divider"></li>
                        <?php } else { ?>
                                <li><a class="dropdown-item" href="<?= $_SERVER['PHP_SELF'] ?>?action=disconnect"><i class="fa fa-sign-out fa-fw"></i><?= NAV_DISCONNECT ?></a></a>
                        <?php }
                        ?>
                        </li>
                    </ul>
            
        </nav>
        
        <?php } ?>







