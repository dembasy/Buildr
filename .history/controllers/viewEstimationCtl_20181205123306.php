<?php

include_once 'configuration.php';
$project = new projects();
$project->id = $_GET['id'];
$userProject = $project->getProjectInfosOnce();
