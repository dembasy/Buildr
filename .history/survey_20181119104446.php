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
    </nav
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
									<p>Based on history... What is the ideal color for a Ferrari?</p>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio01" data-item="1" name="radio1" value="red" />
									<label for="radio01"><span></span><p>Red</p></label>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio02" data-item="1" name="radio1" value="blue" />
									<label for="radio02"><span></span><p>Blue</p></label>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio03" data-item="1" name="radio1" value="green" />
									<label for="radio03"><span></span><p>Green</p></label>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio04" data-item="1" name="radio1" value="purple" />
									<label for="radio04"><span></span><p>Purple</p></label>
								</div>
							</div>
						</div>
						<div class="mm-survey-page" data-page="2">
							<div class="mm-survery-content">
								<div class="mm-survey-question">
									<p>Which one of these car brands is made in Germany?</p>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio05" data-item="2" name="radio2" value="honda" />
									<label for="radio05"><span></span><p>Honda</p></label>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio06" data-item="2" name="radio2" value="ford" />
									<label for="radio06"><span></span><p>Ford</p></label>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio07" data-item="2" name="radio2" value="mercedes" />
									<label for="radio07"><span></span><p>Mercedes</p></label>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio08" data-item="2" name="radio2" value="ferrari" />
									<label for="radio08"><span></span><p>Ferrari</p></label>
								</div>
							</div>
						</div>
						<div class="mm-survey-page" data-page="3">
							<div class="mm-survery-content">
								<div class="mm-survey-question">
									<p>Which is the correct integer for Pi?</p>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio09" data-item="3" name="radio3" value="3" />
									<label for="radio09"><span></span><p>3</p></label>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio10" data-item="3" name="radio3" value="4" />
									<label for="radio10"><span></span><p>4</p></label>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio11" data-item="3" name="radio3" value="3.41" />
									<label for="radio11"><span></span><p>3.41</p></label>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio12" data-item="3" name="radio3" value="3.14" />
									<label for="radio12"><span></span><p>3.14</p></label>
								</div>
							</div>
						</div>
						<div class="mm-survey-page" data-page="4">
							<div class="mm-survery-content">
								<div class="mm-survey-question">
									<p>The letter 'C' is the nth number in the alphabet, choose the correct number.</p>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio13" data-item="4" name="radio4" value="1" />
									<label for="radio13"><span></span><p>1</p></label>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio14" data-item="4" name="radio4" value="2" />
									<label for="radio14"><span></span><p>2</p></label>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio15" data-item="4" name="radio4" value="3" />
									<label for="radio15"><span></span><p>3</p></label>
								</div>
								<div class="mm-survey-item">
									<input type="radio" id="radio16" data-item="4" name="radio4" value="4" />
									<label for="radio16"><span></span><p>4</p></label>
								</div>
							</div>
						</div>
						<!-- <div class="mm-survey-page" data-page="5">
							<div class="mm-survery-content">

							</div>
						</div>
						<div class="mm-survey-page" data-page="6">
							<div class="mm-survery-content">

							</div>
						</div>
						<div class="mm-survey-page" data-page="7">
							<div class="mm-survery-content">

							</div>
						</div> -->

					</div>

					<div class="mm-survey-controller">
						<div class="mm-prev-btn">
							<button>Prev</button>
						</div>
						<div class="mm-next-btn">
							<button disabled="true">Next</button>
						</div>
						<div class="mm-finish-btn">
							<button>Submit</button>
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
    
  <script>
    wow = new WOW().init();
  </script>
</body>

</html>