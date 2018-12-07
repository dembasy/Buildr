<?php
session_start();
include_once 'controllers/viewEstimationCtl.php';
include_once 'header.php';
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
                <p>Votre budget de départ : <?= $userProject->startBudget ?> €</p>
                <p>Votre budget Maximum : <?= $userProject->endBudget ?> €</p>
                <p>Les informations complémentaires : <?= $userProject->moreInfos ?></p>
                <p>Votre type de bien : <?= $userProject->type ?></p>
                <p>La pièce choisi : <?= $userProject->room ?></p>
                <p>Votre ville : <?= $userProject->cityName ?></p>
            </div>
            <a  class="btn btn-primary" href="updateEstimation.php?id=<?= $userProject->id ?>">Modifier mes informations</a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#basicExampleModal">
                Supprimer mon projet
            </button>
            <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Suppression du projet</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Vous êtes sur le point de supprimer votre projet, <br/> en êtes vous sûr ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                            <a class="btn btn-danger" href="viewEstimation.php?delete=<?= $userProject->id ?>">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>