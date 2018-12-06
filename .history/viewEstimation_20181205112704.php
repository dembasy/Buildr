<?php
session_start();
include_once 'sidenav.php';
include_once 'header.php';
include_once 'controllers/viewEstimationCtl.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Résumé de mon projet</h1>
        </div>
        <h3>Récapitulatif</h3>
    </div>
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
                    <input type="submit"  class="btn btn-primary"  name="modify" id="modify" value="Modifier mes informations" />
                    <input type="submit"  class="btn btn-danger"  name="delete" id="delete" value="Supprimer mes informations" />

<?php include_once 'footer.php'; ?>