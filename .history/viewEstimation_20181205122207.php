<?php
session_start();
include_once 'sidenav.php';
include_once 'header.php';
include_once 'controllers/viewEstimationCtl.php';
?>

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header mr-2">Résumé de mon projet</h2>
    </div>
</div>
<div class="align-items-center mt-4 mb-4">
    <div class="card shadow">
        <div class="card-body">
            <h4 class="ml-4 mb-4">Récapitulatif</h4>
            <div class="container response-project">
                <p>Le nom de votre projet : <?= $userProject->name ?></p>
                <p>Votre Adresse : <?= $userProject->address ?></p>
                <p> Le nombre de mètre carré qu'est composé votre bien : <?= $userProject->area ?> m²</p>
                <p>Votre budget de départ : <?= $userProject->startBudget ?></p>
                <p>Votre budget Maximum : <?= $userProject->endBudget ?></p>
                <p>Les informations complémentaires : <?= $userProject->moreInfos ?></p>
                <p>Votre type de bien : <?= $userProject->type ?></p>
                <p>La pièce choisi : <?= $userProject->room ?></p>
                <p>Votre ville : <?= $userProject->cityName ?></p>
            </div>
            <a  class="btn btn-primary" href="updateEstimation.php?id=<?= $projectsListName->id ?>" name="modify" id="modifyProject">Modifier mes informations</a>
            <input type="submit"  class="btn btn-danger" name="delete" id="delete"value="Supprimer mes informations" />
        </div>
    </div>
</div>


<?php include_once 'footer.php'; ?>