<?php
session_start();
?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Contact | Mundiastage</title>
	<meta name="description" content="Handyman - Job Board HTML Template - 1.0">
	<meta name="author" content="http://themeforest.net/user/dan_fisher">


	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
	
	
	
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
?>

</header>
		<!-- Header / End -->


		<!-- Main -->
		<div class="main" role="main">

			<!-- Page Heading -->
			<section class="page-heading">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1>Contacts</h1>
						</div>
					</div>
				</div>
			</section>
			<!-- Page Heading / End -->

			<!-- Page Content -->
			<section class="page-content">

				<!-- Google Map -->
				<div class="googlemap-wrapper googlemap-wrapper__contact">
					<div id="map_canvas" class="map-canvas"></div>
				</div>
				<!-- Google Map / End -->

				<div class="container">

					<div class="row">
						<div class="col-md-4">
							<div class="icon-box">
								<div class="icon">
									<i class="fa fa-location-arrow"></i>
								</div>
								<div class="icon-box-body">
									<h6>Adresse:</h6>
									Campus Université Mundiapolis Aeropole de formation, Nouacer
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="icon-box">
								<div class="icon">
									<i class="fa fa-phone"></i>
								</div>
								<div class="icon-box-body">
									<h6>Télephone:</h6>
									05 29 01 37 00<br>
									05 29 01 37 07
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="icon-box">
								<div class="icon">
									<i class="fa fa-clock-o"></i>
								</div>
								<div class="icon-box-body">
									<h6>Email:</h6>
									contact@mundiapolis.ma
								</div>
							</div>
						</div>
					</div>

					<div class="spacer-lg"></div>
					
					<div class="row">
						<div class="col-md-12">
							<h3>Contact Formulaire</h3>
							<form action="php/contact-form.php" id="contact-form">

								<div class="alert alert-success hidden" id="contact-alert-success">
									<strong>Success!</strong> Merci pour votre message
								</div>
								<div class="alert alert-danger hidden" id="contact-alert-error">
									<strong>Error!</strong> une erreur s'est produite.
								</div>

								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Nom <span class="required">*</span></label>
											<input type="text"
												value=""
												data-msg-required="Veuillez entrer votre nom."
												class="form-control"
												name="name" id="name">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Email <span class="required">*</span></label>
											<input type="email" 
												value=""
												data-msg-required="Veuillez entrer votre email."
												data-msg-email="Veuillez saisir un email valide."
												class="form-control"
												name="email"
												id="email">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Sujet</label>
											<input type="text" 
												value=""
												data-msg-required="Veuillez entrer le sujet."
												class="form-control"
												name="subject"
												id="subject">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Message <span class="required">*</span></label>
											<textarea
												data-msg-required="Veuillez entrer le message."
												rows="10"
												class="form-control"
												name="message"
												id="message"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input type="submit" value="Envoyer le message" class="btn btn-primary" data-loading-text="Chargement...">
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>

			</section>
			<!-- Page Content / End -->

			<!-- Footer -->
				<?php include("includes/footer.php");	
	?>
			<!-- Footer / End -->
			
		</div>
		<!-- Main / End -->
	</div>
	
	
	
	
	
	<!-- Javascript Files
	================================================== -->
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

	<script src="js/custom.js"></script>


	<!-- Contact Page specific scripts
	================================================== -->

	<!-- Contact Form -->
	<script src="vendor/jquery.validate.js"></script>
	<script src="js/contact.js"></script>

	<!-- Newsletter Form -->
	<script src="js/newsletter.js"></script>
	
	<!-- Google Map -->
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="vendor/jquery.gmap3.min.js"></script>
	
	<!-- Google Map Init-->
	<script type="text/javascript">
		jQuery(function($){
			$('#map_canvas').gmap3({
				marker:{
					address: '33.382056,-7.5704377' 
				},
					map:{
					options:{
					zoom: 17,
					scrollwheel: false,
					streetViewControl : true
					}
				}
		    });
		});
	</script>

</body>
</html>