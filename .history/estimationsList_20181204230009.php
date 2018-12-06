<?php
session_start();
include_once 'controllers/estimationsListCtl.php';
include_once 'header.php';
?>

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Mes estimations</h2>
        </div>
</div>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-6">
                        <?php foreach ($projectsList as $projectsListName) { ?>
                            <div class="wrapper">
                                <a class="icard blue" href="viewEstimationsList.php?idProjects=<?= $projectsListName->id ?>">
                                    <p class="icard-header"><?= $projectsListName->name ?></p>
                                </a>
                            </div>
                            <?php }
                        ?> 
                    </div>
                </div>
            </div>

    <?php include_once 'footer.php'; ?>