<!DOCTYPE html>
<html lang="en" class="full-height">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Questionnaire</title>
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
    <nav class="navbar navbar-dark primary-color">
      <a class="navbar-brand" href="index.php">Buildr</a>
    </nav>
    <div class="container">
		<div class="col-sm-12">
			<div class="mm-survey">
				<div class="mm-survey-progress">
					<div class="mm-survey-progress-bar mm-progress"></div>
				</div>
				<div class="mm-survey-results">
					<div class="mm-survey-results-container">
						<h3 class="mm-survey-results-score"></h3>
						<ul class="mm-survey-results-list"></ul>
					</div>
					<div class="mm-survey-results-controller">
						<div class="mm-back-btn">
							<button>Back</button>
						</div>
					</div>
				</div>
				<div class="mm-survey-bottom">
					<div class="mm-survey-container">
						<div class="mm-survey-page active" data-page="1">
							<div class="mm-survery-content">
								<div class="mm-survey-question">
									<p>Votre projet concerne...</p>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio01" data-item="1" name="radio1" value="red" />
									<label for="radio01"><span></span><p>Appartement (Studio)</p></label>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio02" data-item="1" name="radio1" value="blue" />
									<label for="radio02"><span></span><p>Maison</p></label>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio03" data-item="1" name="radio1" value="green" />
									<label for="radio03"><span></span><p>Local commercial</p></label>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio04" data-item="1" name="radio1" value="purple" />
									<label for="radio04"><span></span><p>Bureaux</p></label>
								</div>
							</div>
						</div>
						<div class="mm-survey-page" data-page="2">
							<div class="mm-survery-content">
								<div class="mm-survey-question">
									<p>De combien de mètre carré est constitué votre bien</p>
								</div>
								<div class="mm-survey-item">
									<input data-item="1" placeholder="Exemple : 45 (m²)" type="number" required/>	
								</div>
							</div>
						</div>
						<div class="mm-survey-page" data-page="3">
							<div class="mm-survery-content">
								<div class="mm-survey-question">
									<p>Etes vous propriètaire du bien</p>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio05" data-item="3" name="radio2"/>
									<label for="radio05"><span></span><p>Oui</p></label>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio06" data-item="3" name="radio3"/>
									<label for="radio06"><span></span><p>Non</p></label>
								</div>
							</div>
						</div>
						<div class="mm-survey-page" data-page="4">
							<div class="mm-survery-content">
								<div class="mm-survey-question">
									<p>Dans quelle ville se trouve ce logement ?</p>
								</div>
								<div class="mm-survey-item">
                  <input  type="text"  placeholder="Exemple : &quot;Paris&quot; ou &quot;69001&quot;" value="">
								</div>

							</div>
						</div>
						<div class="mm-survey-page" data-page="5">
							<div class="mm-survery-content">
                <div class="mm-survey-question">
									<p>Quel est votre budget ?</p>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio07" data-item="4" name="radio7" />
									<label for="radio07"><span></span><p>Moins de 10 000€</p></label>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio18" data-item="4" name="radio5" value="2" />
									<label for="radio18"><span></span><p>Entre 10 000 et 30 000€</p></label>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio19" data-item="4" name="radio5" value="3" />
									<label for="radio19"><span></span><p>Entre 30 000 et 100 000€</p></label>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio22" data-item="4" name="radiradio5o4" value="6" />
									<label for="radio22"><span></span><p>Je ne sais pas</p></label>
								</div>
							</div>
						</div>
						</div>
					</div>
					<div class="mm-survey-controller">
						<div class="mm-prev-btn">
							<button>Précédent</button>
						</div>
						<div class="mm-next-btn">
							<button disabled="true">Suivant</button>
						</div>
						<div class="mm-finish-btn">
							<button>Valider</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  <!-- JQuery -->
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>  
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
  <script src="assets/js/script.js"></script>

</body>

</html>