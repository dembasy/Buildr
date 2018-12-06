<?php
include_once 'configuration.php';
if (isset($_GET['idProjects'])) {
    if (is_numeric($_GET['idProjects'])) {
        $projects = new projects();
        $projects->id = $_GET['idProjects'] ;

    }
} 
