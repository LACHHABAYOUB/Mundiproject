<?php
// session_start(); //session start

if (!isset($_SESSION['access_token'])){


?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>S'enregistrer | Mundiastage</title>
	<meta name="description" content="Handyman - Job Board HTML Template - 1.0">
	<meta name="author" content="http://themeforest.net/user/dan_fisher">
    <meta name="google-signin-client_id" content="532552756343-hok05f5aetsnrcq5m7cev1m6q2k36o70.apps.googleusercontent.com">
<meta name="google-signin-hosted_domain" content="mundiapolis.ma">
	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
	
	
		<!-- popup
	================================================== -->
	<script src="popup/js/modernizr.js"></script> <!-- Modernizr -->
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	<!-- CSS
	================================================== -->
	<!-- Base + Vendors CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fonts/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="css/fonts/entypo/css/entypo.css">
	<link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.css" media="screen">
	<link rel="stylesheet" href="vendor/owl-carousel/owl.theme.css" media="screen">
	<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" media="screen">

	<!-- Theme CSS-->
	<link rel="stylesheet" href="css/theme.css">
	<link rel="stylesheet" href="css/theme-elements.css">
	<link rel="stylesheet" href="css/animate.min.css">

   

  <!-- Head Libs -->
	<script src="vendor/modernizr.js"></script>

	
	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicons/favicon.ico">
	<link rel="apple-touch-icon" sizes="120x120" href="images/favicons/favicon-120.png">
	<link rel="apple-touch-icon" sizes="152x152" href="images/favicons/favicon-152.png">
	
</head>
<body>

	<div class="site-wrapper">

		<!-- Header -->
	<?php include("includes/header.php"); 
	require('dbconfig.php');
	
	$req=$bdd->query('select * from ville');
	$req1=$bdd->query('select * from domaine');
	?>
	
		<!-- Header / End -->


		<!-- Main -->
		<div class="main" role="main">

			<!-- Page Heading -->
			<section class="page-heading">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1>Inscription</h1>
						</div>
					</div>
				</div>
			</section>
			<!-- Page Heading / End -->

			<!-- Page Content -->
			<section class="page-content">
				<div class="container">
										
						<div style="width:100%" class="col-md-6">
							<div  class="spacer-lg visible-sm visible-xs"></div>
							<div  class="box">
								<h4 style="border-bottom:2px solid black;padding-bottom:15px;">S'enregistrer en tant qu'entreprise</h4>
									<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<!-- Job Form -->
							<form  action="index.php?page=inscription_cmp" method="post" id="register-form" class="job-manager-form" enctype="multipart/form-data">

								
								<div class="form-group form-grop__icon">
								<i class="entypo mail"></i>
								<input type="email" name="email_cmp" id="email_cmp" class="form-control" placeholder="Email">
								<div class="erreuremail"></div>
								
							</div>
							
								
									<div class="form-group form-grop__icon">
								<i class="entypo lock"></i>
								<input type="password" name="pwd" id="pwd" class="form-control" placeholder="Mot de passe">
								<div class="erreurpwdd"></div>
							</div>
							
								<div class="form-group form-grop__icon">
								<i class="entypo lock"></i>
								<input type="password" class="form-control" name="confipwd" id="confipwd" placeholder="Rentrer le mot de passe">
							<div class="erreurcpwdd"></div><div class="erreurcpwddd"></div></div>

							<br>
							<div style="border-bottom:2px solid black;width:100%;"></div>
														<br></br>

								<!-- Job Information Fields -->
								<fieldset class="fieldset-job_title">
									<label for="job_title">Nom de la compagnie</label>
									<div class="field">
										<input type="text" class="form-control" name="name" id="name" placeholder="e.g. “Painter”" />
									<div class="erreurname"></div></div>

								</fieldset>

									<fieldset class="fieldset-job_type">
											<label for="localisation">Localisation</label>
											<div class="field select-style">
												<select name="localisation" id="localisation" class="form-control">
													<?php while($donnees1=$req->fetch()){
												?>
													<option value="<?php echo $donnees1['nom'];?>"><?php echo $donnees1['nom'];?></option>
												<?php
												}
                                                ?>	
												</select>
												
											</div>
										</fieldset>

								<div class="row">
									<div class="col-md-6">
										<fieldset class="fieldset-job_type">
											<label for="job_type">Industrie</label>
											<div class="field select-style">
												<select name="industrie" id="job_type" class="form-control">
															<?php while($donnees1=$req1->fetch()){
												?>
													<option value="<?php echo $donnees1['nom'];?>"><?php echo $donnees1['nom'];?></option>
												<?php
												}
                                                ?>
												</select>
											</div>
										</fieldset>
									</div>
									<div class="col-md-6">
										<fieldset class="fieldset-job_category">
											<label for="job_category">Org.Type</label>
											<div class="field select-style">
												<select name="type" id="job_category" class="form-control">
												<option value="Privée">Privée</option>
													<option value="Public">Public</option>
												</select>
											</div>
										</fieldset>
									</div>
								</div>

								<fieldset class="fieldset-job_description">
									<label>Adresse</label>
									<div class="field">
										<textarea name="adresse" id="adresse" cols="20" rows="2" class="form-control"></textarea>
									<div class="erreurloc"></div></div>
									
								</fieldset>
                           	<fieldset class="fieldset-job_description">
									<label>Compagnie description</label>
									<div class="field">
										<textarea name="description" id="description" cols="20" rows="3" class="form-control"></textarea>
									<div class="erreurloc"></div></div>
									
								</fieldset>
								<fieldset class="fieldset-job_title">
									<label for="telephone">Téléphone</label>
									<div class="field">
										<input type="text" class="form-control" name="telephone" id="telephone" placeholder="Téléphone" />
									<div class="erreurloc"></div></div>
									
								</fieldset>
								
								<fieldset class="fieldset-application">
									<label for="siteweb">Site web</label>
									<div class="field">
										<input type="text" class="form-control" name="siteweb" id="application" placeholder="Enter URL de site web" />
									</div>
									<div class="erreurloc1"></div>
								</fieldset>

								<fieldset class="fieldset-company_logo">
									<label for="company_logo">Compagnie Logo <small>(optional)</small></label>
									<div class="field">
										<input type="file" class="form-control" name="logo" id="logo" />
										<small class="description">
										Max. file size: 2 MB.</small>
									</div>
								</fieldset>

								<div class="spacer"></div>

							  <div class="form-group">
                <button type="submit" class="btn btn-default" name="submit_cmp" id="submit_cmp">
                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Créer un compte
                </button>
            </div>

							</form>
							<!-- Job Form / End -->
						</div>
					</div>
							</div>
						</div>
					</div>

				</div>
			</section>
			<!-- Page Content / End -->

			<!-- Footer -->
					<?php include("includes/footer.php"); ?>

			<!-- Footer / End -->
			
		</div>
		<!-- Main / End -->
	</div>
	
	
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="js/scripttest.js"></script>

<script src="popup/js/main.js"></script>
	<!-- Javascript Files
	================================================== -->
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="vendor/jquery-1.11.0.min.js"></script>
	<script src="vendor/jquery-migrate-1.2.1.min.js"></script>
	<script src="vendor/bootstrap.js"></script>
	<script src="vendor/jquery.flexnav.min.js"></script>
	<script src="vendor/jquery.hoverIntent.minified.js"></script>
	<script src="vendor/jquery.flickrfeed.js"></script>
	<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
	<script src="vendor/owl-carousel/owl.carousel.min.js"></script>
	<script src="vendor/jquery.fitvids.js"></script>
	<script src="vendor/jquery.appear.js"></script>
	<script src="vendor/jquery.stellar.min.js"></script>
	<script src="vendor/jquery.countTo.js"></script>

	<!-- Newsletter Form -->
	<script src="vendor/jquery.validate.js"></script>
	<script src="js/newsletter.js"></script>

	<script src="js/custom.js"></script>


	
</body>
</html>
<?php
}
else
		header('Location: index.php?page=home');
