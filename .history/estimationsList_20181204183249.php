<?php
session_start();
include_once 'controllers/viewEstimationCtl.php';
include_once 'header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Mes estimations</h1>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-6">
            <?php foreach ($projectsList as $projectsListName) { ?>
                <div class="wrapper">
                    <a class="icard blue" href="estimationsList.php?idProjects=<?= $projectsListName->id ?>">
                        <p class="icard-header"><?= $projectsListName->name ?></p>
                    </a>
                </div>
            <?php 
        } ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>