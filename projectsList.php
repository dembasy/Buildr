<?php
session_start();
include_once 'controllers/projectsListCtl.php';
include_once 'header.php';
?>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Mes estimations</h2>
    </div>
</div>
<div class="align-items-center mt-4 mb-4">
    <div class="card shadow">
        <div class="card-body">
            <div id="page-wrapper">
                <div class="row">
                    <?php if(!$projectsList){ ?>
                        <p>Vous n'avez pas encore de projet, vous pouvez réalisez une estimation</p>
                    <?php } else { ?>
                    <?php foreach ($projectsList as $projectsListName) { ?>
                        <div class="col-lg-6">
                            <div class="wrapper">
                                <div class="icard blue">
                                    <div class="icard-header-img">
                                        <a href="viewProject.php?id=<?= $projectsListName->id ?>"><?= $projectsListName->name ?></a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <?php }
                            }
                            ?> 
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>