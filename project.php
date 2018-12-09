<?php
session_start();
include_once 'header.php';
?>
<div class="row">
    <div class="col-lg-6">
        <h1 class="page-header">Mes estimations</h1>
    </div>
</div>
<div class="align-items-center mt-4 mb-4">
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-xs">
                    <div class="wrapper">
                        <div class="icard blue">
                            <div class="icard-header mt-2">
                                <a href="projectsList.php">Mes projets</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 col-sm-4 col-xs-2">
                    <div class="wrapper">
                        <div class="icard blue">
                            <div class="icard-header mt-2">
                                <a href="createNewProject.php">Démarrer un nouveau projet</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>