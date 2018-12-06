<?php
session_start();
include_once 'controllers/estimationsListCtl.php';
include_once 'sidenav.php';
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
                <div class="wrapper">
                    <div class="icard blue">
                        <p></p>
                        <a  class="icard-header" href="estimationsList.php">Mes estimations</a>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="wrapper">
                    <a class="icard blue" href="createNewEstimation.php">
                        </a>
                        <p class="icard-header">Faire une nouvelle estimations</p>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>