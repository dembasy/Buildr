<?php

include_once 'configuration.php';
if (isset($_GET['idProjects'])) {
    if (is_numeric($_GET['idProjects'])) {
        $project = new projects();
        $project->id = $_GET['idProjects'];
        $projectsList = $project->getProjectInfosOnce();
    }
} 