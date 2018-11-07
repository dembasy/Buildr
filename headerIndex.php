<!DOCTYPE html>
<html lang="en" class="full-height">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Buildr</title>
  <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/favicon.ico">
  <!-- My CSS -->
  <link rel="stylesheet"  href="assets/css/style.css" />
</head>
<body>
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
      <a class="navbar-brand" href="#"><strong>Buildr</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Nos Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Comment ça marche ?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Réalisations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#modalLoginForm"><i class="fas fa-wrench fa-style"></i>Espace Pro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#modalLoginForm"><i class="far fa-user-circle fa-style"></i>Espace Client</a>
          </li>       
        </ul>
      </div>
    </nav>
    <div class="view intro-2">
        <div class="flex-center">
          <div class="container text-left white-text wow fadeInUp">
            <h2>Buildr</h2>
            <h5>Vous aide à trouver des maîtres d'oeuvre qualifiés et de confiance pour vos travaux de rénovations</h5>
            <p >Vous souhaitez faire une estimation ? Cliquez sur le bouton</p>
            <br>
            <a type="button" class="btn btn-default" href="http://buildr/register.php">Commencez</a>
          </div>
          <div class="float-right">
            <img class="background-img-top" src="assets/img/undraw_ordinary_day_xi0c.svg" alt="house illustrations">
          </div>
        </div>
    </div>
  <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header text-center">
                  <h4 class="modal-title w-100 font-weight-bold">Connectez-vous</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body mx-3">
                  <div class="md-form mb-5">
                      <i class="fa fa-envelope prefix grey-text"></i>
                      <input type="email" id="defaultForm-email" class="form-control validate">
                      <label data-error="wrong" data-success="right" for="defaultForm-email">Adresse mail</label>
                  </div>
                  <div class="md-form mb-4">
                      <i class="fa fa-lock prefix grey-text"></i>
                      <input type="password" id="defaultForm-pass" class="form-control validate">
                      <label data-error="wrong" data-success="right" for="defaultForm-pass">Mot-de-passe</label>
                  </div>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                  <button class="btn btn-default">Login</button>
              </div>
          </div>
      </div>
  </div>
  </header>
    