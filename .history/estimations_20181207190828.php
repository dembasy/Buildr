<?php
session_start();
include_once 'controllers/estimationsListCtl.php';
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
                                <a href="estimationsList.php">Mes estimations</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 col-sm-4 col-xs-overflow">
                    <div class="wrapper">
                        <div class="icard blue">
                            <div class="icard-header mt-2">
                            <a href="createNewEstimation.php">Faire une nouvelle estimations</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>