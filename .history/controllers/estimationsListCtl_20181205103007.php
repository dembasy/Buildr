<?php

include_once 'configuration.php';
if (isset($_GET['idProjects'])) {
    if (is_numeric($_GET['id'])) {
        $project = new projects();
        $project->id = $_GET['id'];
        $projectsList = $project->getProjectInfosOnce();
    }
} 