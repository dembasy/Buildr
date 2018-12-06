<?php
session_start();
include_once 'controllers/estimationsListCtl.php';
include_once 'header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Mes estimations</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?php foreach ($projectsList as $projectsListName) { ?>
                <div class="wrapper">
                    <a class="icard blue" href="estimationsList.php">
                        <p class="icard-header">Mes estimations</p>
                    </a>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="wrapper">
                    <a class="icard blue" href="createNewEstimation.php">
                        <p class="icard-header">Faire une nouvelle estimations</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>