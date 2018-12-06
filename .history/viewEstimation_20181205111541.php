<?php
session_start();
include_once 'sidenav.php';
include_once 'controllers/viewEstimationCtl.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Résumé de mon projet</h1>
        </div>
    </div>
    	<div class="blog-card spring-fever">
  <div class="title-content">
    <h3><a href="#">Récapitulatif</a></h3>
  </div>
  <div class="utility-info">
            <div class="container response-project">
            <p>Votre Adresse : <?= $userProject->address ?></p>
            <p> Le nombre de mètre carré qu'est composé votre bien : <?= $userProject->area ?> m²</p>
            <p>Votre budget de départ : <?= $userProject->startBudget ?></p>
            <p>Votre budget Maximum : <?= $userProject->endBudget ?></p>
            <p>Les informations complémentaires : <?= $userProject->moreInfos ?></p>
            <p>Votre type de bien : <?= $userProject->type ?></p>
            <p>La pièce choisi : <?= $userProject->room ?></p>
            <p>Votre ville : <?= $userProject->cityName ?></p>
        </div>
  </div>
  <div class="gradient-overlay"></div>
  <div class="color-overlay"></div>
</div><!-- /.blog-card -->


</div>


<?php include_once 'footer.php'; ?>