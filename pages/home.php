<?php

     session_start(); //session start
	 require('dbconfig.php');
// require_once("glogin/glogin.php");	
// if (!isset($_POST['verifier']) and !isset($_SESSION['verifier'])) 
// require_once("glogin/glogin.php");
// else{
// session_start();
// $_SESSION['verifier']=$_POST['verifier'];

// }
$req=$bdd->query('select * from domaine');
$req1=$bdd->query('select * from ville');
//nombre_entreprise
$req2=$bdd->query('select count(id) as nbr_entreprise from entreprise');
$count=$req2->fetch();
//nombre des offres
$req3=$bdd->query('select count(id) as nbr_offre from offre_stage');
$count1=$req3->fetch();
//nbr des etudiant
$req4=$bdd->query('select count(*) as nbr_postule from postule');
$count2=$req4->fetch();
//nbr des postule
$req5=$bdd->query('select count(*) as nbr_postule_valide from postule where valide_postule=1');
$count3=$req5->fetch();
//
if (isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
  unset($_SESSION['login_name']);
   unset($_SESSION['login_user']);
   unset($_SESSION['login_name_prof']);
   unset($_SESSION['login_user_prof']);
     unset($_SESSION['professeur']);
  unset($_SESSION['etudiant']);
  $_SESSION=array();
session_destroy();
}

?>

<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Mundiastage</title>
	<meta name="description" content="Mundiastage - ">
	<meta name="author" content="http://themeforest.net/user/dan_fisher">


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
	<link rel="stylesheet" href="vendor/flexslider/flexslider.css" media="screen">
	<link rel="stylesheet" href="vendor/job-manager/frontend.css" media="screen">

	<!-- Theme CSS-->
	<link rel="stylesheet" href="css/theme.css">
	<link rel="stylesheet" href="css/theme-elements.css">
	<link rel="stylesheet" href="css/animate.min.css">
   <link rel="stylesheet" href="popup/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="popup/css/style.css"> <!-- Gem style -->

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

			<!-- Slider -->
	
			<!-- Slider / End -->
			<section class="slider-holder">

				<div class="flexslider carousel">
				
					<ul class="slides">

						<li>
							<img src="images/samples/slide1.jpg" alt="" />
						</li>
						<li>
							<img src="images/samples/slide2.jpg" alt="" />
						</li>
						<li>
							<img src="images/samples/slide3.jpg" alt="" />
						</li>
					</ul>

					<div class="search-box">

						<div class="container">
							<div class="search-box-inner">
								<h1>Chercher une offre</h1>
								<form action="index.php?page=offres" method="POST" role="form">

									<div class="row">
										<div class="col-md-3 col-md-offset-1">
											<div class="form-group">
												<input type="text" name="titre_offre" class="form-control" placeholder="Titre">
											</div>
										</div>
												<div class="col-md-3">
											<div class="form-group">
												<div class="select-style">
													<select name="ville_offre" class="form-control">
												<option value="Tout le Maroc">Tout le Maroc</option>
												    <optgroup style="background-color:#E7E7E7;" label="--AUTRES VILLES--"></optgroup>
													<?php
													while($donnee=$req1->fetch()){
													?>
														<option value="<?php echo $donnee['nom']?>"><?php echo $donnee['nom']?></option>
													<?php
													}
													?>	
													
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<div class="select-style">
													<select name="domaine_offre" class="form-control">
													<?php
													while($donnees=$req->fetch()){
													?>
														<option value="<?php echo $donnees['nom']?>"><?php echo $donnees['nom']?></option>
													<?php
													}
													?>	
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-1">
											<button type="submit" name="cherche_offre" class="btn btn-primary btn-block"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- Page Content -->
			<section class="page-content">
				<div class="container">

					<!-- Stats -->
					<div class="section-light section-nomargin">
						<div class="section-inner">
							<div class="row">
								<div class="col-md-3">
									<div class="counter-holder counter-dark">
										<i class="fa fa-3x fa-suitcase"></i>
										<span class="counter-wrap">
											<span class="counter" data-to="<?php echo $count1['nbr_offre'];?>" data-speed="1500" data-refresh-interval="50"><?php echo $count1['nbr_offre'];?></span>
										</span>
										<span class="counter-info">
											<span class="counter-info-inner">Nombre des offres</span>
										</span>
									</div>
								</div>
							
								<div class="col-md-3">
									<div class="counter-holder counter-dark">
										<i class="fa fa-3x fa-user"></i>
										<span class="counter-wrap">
											<span class="counter" data-to="<?php echo $count2['nbr_postule'];?>" data-speed="1500" data-refresh-interval="50"><?php echo $count2['nbr_postule'];?></span>
										</span>
										<span class="counter-info">
											<span class="counter-info-inner">Offres postulées</span>
										</span>
									</div>
								</div>
									<div class="col-md-3">
									<div class="counter-holder counter-dark">
										<i class="fa fa-3x fa-thumbs-o-up"></i>
										<span class="counter-wrap">
											<span class="counter" data-to="<?php echo $count3['nbr_postule_valide'];?>" data-speed="1500" data-refresh-interval="50"><?php echo $count3['nbr_postule_valide'];?></span>
										</span>
										<span class="counter-info">
											<span class="counter-info-inner">Offres validées</span>
										</span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="counter-holder counter-dark">
										<i class="fa fa-3x fa-users"></i>
										<span class="counter-wrap">
											<span class="counter" data-to="<?php echo $count['nbr_entreprise'];?>" data-speed="1500" data-refresh-interval="50"><?php echo $count['nbr_entreprise'];?></span>
										</span>
										<span class="counter-info">
											<span class="counter-info-inner">Nombre des entreprises</span>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Stats / End -->

					<div class="spacer-xl"></div>

					<!-- Listings -->
					<div class="title-bordered">
						<h2>Liste des dernières offres <small>Dernières ajoutées</small></h2>
					</div>
<?php

$req=$bdd->query('SELECT * from offre_stage where valide=1 order by date_publication desc limit 8');

while($donnees=$req->fetch()){
$id=$donnees['id_entreprise'];
$req0=$bdd->query("SELECT * from entreprise where id='$id'");
$donnee=$req0->fetch();

$_SESSION['id_offre']=$donnees['id'];

?>					
					<div class="job_listings">
						<ul class="job_listings">
							<li class="job_listing">
								<a href="index.php?page=details-offre&id=<?php echo $_SESSION['id_offre']; ?>">
									<div class="job_img">
										<img src="<?php echo $donnee['logo']; ?>" alt="" class="company_logo">
									</div>
									<div class="position">
										<h3><?php echo $donnees['title']; ?></h3>
										<div class="company">
											<strong><?php echo nl2br(substr($donnees['description'],0,60)); ?></strong>
										</div>
									</div>
									<div class="location">
										<i class="fa fa-location-arrow"></i> <?php echo $donnees['localisation']; ?>
									</div>
							
									<ul class="meta">
										<li class="job-type">Publiée le :</li>
										<li class="date">
											<?php echo $donnees['date_publication']; ?>
										</li>
									</ul>
								</a>
							</li>
							
				
					
							
					
						</ul>
					</div>

<?php
}

?>					

					<div class="spacer"></div>

					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<a class="btn btn-default btn-block" href="index.php?page=offres">Voir toutes les offres</a>
						</div>
					</div>

					<!-- Listings / End -->

					<div class="spacer-xxl"></div>

					<!-- Promobox -->
			
					<!-- Promobox / End -->

					<div class="spacer-lg"></div>

					<!-- Services -->
			
					<!-- Services / End -->

					<!-- Clients -->
					<div class="section-light section-bg2 section-overlay__yes section-overlay-color__primary section-overlay_opacity-90" data-stellar-background-ratio="0.5">
						<div class="section-inner">
							<div class="row">
								<div class="col-sm-3 col-md-2">
									<div class="text-center">
										<a href="#"><img src="images/samples/5f4ce-insa.png" alt="" class="img-responsive"></a>
									</div>
								</div>
								<div class="col-sm-3 col-md-2">
									<div class="text-center">
										<a href="#"><img src="images/samples/c4f1f-logo_footer2.png" alt="" class="img-responsive"></a>
									</div>
								</div>
								<div class="col-sm-3 col-md-2">
									<div class="text-center">
										<a href="#"><img src="images/samples/c6bfc-logo_footer4.png" alt="" class="img-responsive"></a>
									</div>
								</div>
								<div class="col-sm-3 col-md-2">
									<div class="text-center">
										<a href="#"><img src="images/samples/0953d-logo_footer5.png" alt="" class="img-responsive"></a>
									</div>
								</div>
								<div class="col-sm-3 col-md-2">
									<div class="text-center">
										<a href="#"><img src="images/samples/749ae-logo_footer6.png" alt="" class="img-responsive"></a>
									</div>
								</div>
								<div class="col-sm-3 col-md-2">
									<div class="text-center">
										<a href="#"><img src="images/samples/8e71c-logo_footer7.png" alt="" class="img-responsive"></a>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<!-- Clients / End -->

					<div class="spacer"></div>

					<!-- Testimonials -->
		
					<!-- Testimonials / End -->

				</div>
			</section>
			<!-- Page Content / End -->

			<!-- Footer -->
			<?php include("includes/footer.php"); ?>

			<!-- Footer / End -->
			
		</div>
		<!-- Main / End -->
	</div>
	
	
	
	
	
	<!-- Javascript Files
	================================================== -->
	
		<!-- POPUP
	================================================== -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="popup/js/main.js"></script>
	
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
	<script src="vendor/flexslider/jquery.flexslider-min.js"></script>
	<script src="vendor/jquery.countTo.js"></script>

	<!-- Newsletter Form -->
	<script src="vendor/jquery.validate.js"></script>
	<script src="js/newsletter.js"></script>

	<script src="js/custom.js"></script>
	<script src="js/func.js"></script>

	<script>

	
		jQuery(function($){
			$('body').addClass('loading');
		});
		
		$(window).load(function(){
			$('.flexslider').flexslider({
				animation: "fade",
				controlNav: true,
				directionNav: false,
				prevText: "",
				nextText: "",
				start: function(slider){
					$('body').removeClass('loading');
				}
			});
		});
	</script>
	
</body>
</html>