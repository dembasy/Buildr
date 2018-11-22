<?php 
session_start();
include_once '../../lang/FR_FR.php';
include_once '../../class/database.php';
include_once '../../controllers/loginProCtl.php';
include_once '../../controllers/profileProCtl.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Buildr | Tableau de bord</title>
    <!-- Bootstrap Core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../assets/css/style.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand brand-size" href="../index.php">Buildr</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="nav-item dropdown">
                        <?php if (!isset($_SESSION['isConnect'])) { ?>
                            <a class = "nav-link" href="http://buildr/dashboard/loginPro.php"><?= NAV_CONNECT ?></a>
                        </li>
                            <li class="divider"></li>
                        <?php 
                    } else { ?>
                            <a class = "nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><?= sprintf(NAV_WELCOME, $_SESSION['firm']) ?></a>  
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= $_SERVER['PHP_SELF'] ?>?action=disconnect"><i class="fa fa-sign-out fa-fw"></i><?= NAV_DISCONNECT ?></a></a>
                            </div>
                        <?php 
                    }
                    ?>
                        </li>
                    </ul>
            
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="http://buildr/dashboard/dashboardPro.php"><i class="fa fa-dashboard fa-fw"></i> Mes projets</a>
                        </li>
                        <li>
                            <a href="http://buildr/dashboard/profilePro.php"><i class="fa fa-edit fa-fw"></i> Mon profil</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
