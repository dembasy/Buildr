<?php
//appel de l 'ajax
    include_once 'configuration.php';
    $regexPhoneNumber = '/^[0][1-9][0-9]{8}$/';
    $regexzipCode = '/^[0-9]{5}$/';
    $regexBudget = '/^[0-9-a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';
    $regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';
    $regexNumberLetter = '/^[0-9-a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';
    $errorList = array();
//condition pour le formulaire
    if (isset($_POST['submitSurvey'])) {
        var_dump($_POST);
        var_dump($errorList);
        // var_dump($errorList);
        if (!empty($_POST['room'])) {
            if (preg_match($regexNumberLetter, $_POST['room'])) {
                $room = htmlspecialchars($_POST['room']);
            } else {
                $errorList['room'] = 'Veuillez vérifier la saisiee';
            }
        } else {
            $errorList['name'] = 'Veuillez vérifier la saisie';
        }
        if (!empty($_POST['propertyTypes'])) {
            if (preg_match($regexNumberLetter, $_POST['propertyTypes'])) {
                $propertyTypes = htmlspecialchars($_POST['propertyTypes']);
            } else {
                $errorList['propertyTypes'] = 'Veuillez vérifier la saisiee';
            }
        } else {
            $errorList['propertyTypes'] = 'Veuillez vérifier la saisie';
        }
        if (!empty($_POST['address'])) {
            if (preg_match($regexNumberLetter, $_POST['address'])) {
                $address = htmlspecialchars($_POST['address']);
            } else {
                $errorList['address'] = 'Veuillez vérifier la saisie';
            }
        } else {
            $errorList['address'] = 'Veuillez vérifier la saisie';
        }
        if (!empty($_POST['area'])) {
            if (preg_match($regexNumberLetter, $_POST['area'])) {
                $area = htmlspecialchars($_POST['area']);
            } else {
                $errorList['area'] = 'Veuillez vérifier la saisie';
            }
        } else {
            $errorList['area'] = 'Veuillez vérifier la saisie';
        }
        if (!empty($_POST['budget'])) {
            if (preg_match($regexBudget, $_POST['budget'])) {
                $budget = htmlspecialchars($_POST['budget']);
            } else {
                $errorList['budget'] = 'Veuillez vérifier la saisie';
            }
        } else {
            $errorList['budget'] = 'Veuillez vérifier la saisie';
        }
        if (!empty($_POST['date'])) {
            if (preg_match($regexNumberLetter, $_POST['date'])) {
                $date = htmlspecialchars($_POST['date']);
            } else {
                $errorList['date'] = 'Veuillez vérifier la saisie';
            }
        } else {
            $errorList['description'] = 'Veuillez vérifier la saisie';
        }
        if (!empty($_POST['description'])) {
            if (preg_match($regexName, $_POST['description'])) {
                $description = htmlspecialchars($_POST['description']);
            } else {
                $errorList['description'] = 'Veuillez vérifier la saisie';
            }
        } else {
            $errorList['description'] = 'Veuillez vérifier la saisie';
        }

        if (isset($_POST['submitSurvey']) && count($errorList) == 0) {
            $project = new projects();
            $project->name = $name;
            $project->address = $address;
            $project->area = $area;
            $project->budget = $budget;
            $project->date = $date;
            $project->description = $description;
            $project->idPropertyTypes = $propertyTypes;
            $project->projectsInsertion();
        }
        // if (count($errorList) == 0) {
        //     header('Location: http://buildr/dashboard/resultsBuildr.php');
        // }
    }


    
    