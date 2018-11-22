<?php
include_once 'sidenavPro.php';
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Mes projets</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h2><?= sprintf(NAV_WELCOME, $_SESSION['firm']) ?></h2> <br>
                <p>Retrouvez ici vos projets en cours</p> <br>
            </div>
            <div class="wrapper">
                <a class="icard img-icard" href="http://buildr/index.php">
                    <p class="icard-header">Mes Projets</p>
                </a>
            </div>
        </div>
        <div class="row">
            
        </div>
    </div>
<?php include_once '../footer.php'; ?>


