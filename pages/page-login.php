<?php
 // session_start(); //session start
 require_once("glogin/glogin.php");
if (!isset($_SESSION['access_token']) and !isset($_SESSION['id_entreprise'])){


?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Connexion | Mundiastage </title>
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
	<?php include("includes/header.php"); ?>
	
		<!-- Header / End -->


		<!-- Main -->
		<div class="main" role="main">

			<!-- Page Heading -->
			<section class="page-heading">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1>Connexion</h1>
						</div>
					</div>
				</div>
			</section>
			<!-- Page Heading / End -->

			<!-- Page Content -->
			<section class="page-content">
				<div class="container">
					
					<div class="row">
						<div class="col-md-6">
							<div class="box">
								<h3 style="border-bottom:2px solid black;padding-bottom:15px;">En tant qu'entreprise :</h3>
								<form action="index.php?page=connexion" method="POST" role="form">
									<div class="form-group">
										<label>Adresse email  <span class="required">*</span></label>
										<input name="email_cmp" type="text" class="form-control" required>
									</div>
									<div class="form-group">
										<div class="clearfix">
											<label class="pull-left">
												Mot de passe  <span class="required">*</span>
											</label>
											<span class="pull-right"><a href="#">Mot de passe oublié?</a></span>
										</div>
										<input name="pwd" type="password" class="form-control" required>
									</div>
									<button type="submit" name="submit" class="btn btn-primary btn-inline">Se connecter</button>&nbsp; &nbsp; &nbsp; 
									<label for="remember" class="checkbox-inline">
										<input type="checkbox" name="remember" id="remember"> Se souvenir de moi  
									</label>
								</form>
							</div>
						</div>
						<div class="col-md-6">
							<div class="spacer-lg visible-sm visible-xs"></div>
							<div class="box">
								<h3 style="border-bottom:2px solid black;padding-bottom:15px;">En tant que Mundiapolitain :</h3>
								<form action="#" method="POST" role="form">									
								<?php	
								if (isset($authUrl)) {
								echo '<a class="login" href="' . $authUrl . '"><img style="width:40%" src="glogin/images/google.png" /></a>';
								}
								
								?>
								</form>
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
		  		<script src="js/func.js"></script>

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
