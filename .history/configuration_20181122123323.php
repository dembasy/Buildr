<?php

// Définition des informations de connexion à la base de données
define('HOST', '127.0.0.1');
define('LOGIN', 'dembasy');
define('PASSWORD', '2304');
define('DBNAME', 'buildr');

// Ajout des fichiers nécessaire au bon fonctionnement du site
include_once 'class/database.php';
include_once 'models/users.php';
include_once 'models/city.php';
include_once 'models/projects.php';
include_once 'models/rooms.php';
include_once 'models/propertyTypes.php';