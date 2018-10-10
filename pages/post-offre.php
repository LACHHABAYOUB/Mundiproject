<?php
// require_once("glogin/glogin.php");
session_start();
if (isset($_SESSION['id_entreprise'])){
  
?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Poster une offre | Mundiastage</title>
	<meta name="description" content="Handyman - Job Board HTML Template - 1.0">
	<meta name="author" content="http://themeforest.net/user/dan_fisher">


	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
	
	<!-- popup
	================================================== -->
	<script src="popup/js/modernizr.js"></script> <!-- Modernizr -->
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	   <script type="text/javascript">
      function catsel(sel) {
        //if (sel.value=="-1" ) return;
        var opt=sel.getElementsByTagName("option" );
        for (var i=0; i<opt.length; i++) {
          var x=document.getElementById(opt[i].value);
          if (x) x.style.display="none";
        }
        var cat = document.getElementById(sel.value);
        if (cat) cat.style.display="block";
      }
    </script>
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
		</header>
		<!-- Header / End -->


		<!-- Main -->
		<div class="main" role="main">

			<!-- Page Heading -->
			<section class="page-heading">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1>Poster une offre</h1>
						</div>
					</div>
				</div>
			</section>
			<!-- Page Heading / End -->

			<!-- Page Content -->



			<section class="page-content">
			
				<div class="container">

					<div class="row">
					
						<div style="float:right;" class="content col-md-8">
	    
							<div class="box mb-30">
								<div class="job-profile-info">
									<div class="row">
									<h4>Poster une offre :</h4><hr style="margin-top:6px;margin-bottom:-5px;" class="lg">		
												<div class="col-md-8 col-md-offset-2">
							<!-- Job Form -->
							<form  action="index.php?page=post-offre-submit" method="post" id="register-form" class="job-manager-form" enctype="multipart/form-data">
													<br></br>

								<!-- Job Information Fields -->
								<fieldset class="fieldset-job_title">
									<label for="job_title">Titre</label>
									<div class="field">
										<input type="text" class="form-control" name="name" id="name" placeholder="Web Design / Frontend Developer.." />
									<div class="erreurname"></div></div>

								</fieldset>
										<fieldset style="width:46%" class="fieldset-job_type">
											<label for="job_type">Industrie</label>
											<div class="field select-style">
												<select name="industrie" id="job_type" class="form-control">
													<option>Unspecified</option>
													<option>Furniture Repair &amp; Refinish</option>
													<option>Pools</option>
													<option>Plaster &amp; Drywall</option>
													<option>Painting</option>
												</select>
											</div>
										</fieldset>
									<fieldset style="width:25%" class="fieldset-job_title">
									<label for="job_title">Nb de poste(s)</label>
									<div class="field">
										<input type="number" min="1" max="20" class="form-control" name="poste" id="poste" placeholder="1" />
									<div class="erreurname"></div></div>

								</fieldset>
                                 <fieldset class="fieldset-job_title">
									<label for="job_title">Démarrage</label>
									<div class="field">
										<input type="date" class="form-control" name="demarrage" id="demarrage"  />
									<div class="erreurname"></div></div>

								</fieldset>
								
								<fieldset class="fieldset-job_title">
									<label for="job_title">Durée</label>
									<div class="field">
										<input type="text" class="form-control" name="duree" id="duree"  placeholder="De 3 à 6 mois"/>
									<div class="erreurname"></div></div><br>

										<fieldset style="width:20%;" class="fieldset-job_type">
											<label for="remuneration">Rémunération</label>
											<div class="field select-style">
												<select name="remuneration" id="remuneration" class="form-control" onchange="catsel(this)">
													<option value="Oui">Oui</option>
													<option value="Non">Non</option>
												</select>
											</div>
										</fieldset>
										
										<input style="width:50%" type="text" class="form-control" name="Oui" id="Oui"  placeholder="De 1000 MAD à 1500 MAD"/>
									<div class="erreurname"></div>
								</fieldset>
									
									

							

								<div class="row">
									<div class="col-md-6">
										<fieldset class="fieldset-job_type">
											<label for="localisation">Localisation</label>
											<div class="field select-style">
												<select name="localisation" id="localisation" class="form-control">
													<option value="Casablanca">Casablanca</option>
													<option value="Rabat">Rabat</option>
													<option value="Fès">Fès</option>
													<option value="Tanger">Tanger</option>
													<option value="Agadir">Agadir</option>
												</select>
												
											</div>
										</fieldset>
									</div>
									<div class="col-md-6">
							
									</div>
								</div>
      	<fieldset class="fieldset-job_description">
									<label>Profil</label>
									<div class="field">
										<textarea name="profil" id="profil" cols="20" rows="6" class="form-control"></textarea>
									<div class="erreurloc"></div></div>
									
								</fieldset>
                           	<fieldset class="fieldset-job_description">
									<label>Stage description</label>
									<div class="field">
										<textarea name="description" id="description" cols="20" rows="20" class="form-control"></textarea>
									<div class="erreurloc"></div></div>
									
								</fieldset>


								<div class="spacer"></div>
<div class="row">								
<h4>Contact information :</h4>
	                           <fieldset class="fieldset-job_title">
									<label for="contact_name">	</label>
									<div class="field">
										<input type="text" class="form-control" name="contact_name" id="contact_name" placeholder="Nom et Prénom" />
									<div class="erreurname"></div></div>

								</fieldset>
									<div class="form-group form-grop__icon">
								<i class="entypo mail"></i>
								<input type="email" name="contact_email" id="contact_email" class="form-control" placeholder="Email">
								<div class="erreuremail"></div>
								
							</div>
							  <fieldset class="fieldset-job_title">
									<label for="contact_telephone">	</label>
									<div class="field">
										<input type="text" class="form-control" name="contact_telephone" id="contact_telephone" placeholder="téléphone" />
									<div class="erreurname"></div></div>

								</fieldset>
								  <fieldset class="fieldset-job_title">
									<label for="contact_fonction">	</label>
									<div class="field">
										<input type="text" class="form-control" name="contact_fonction" id="contact_fonction" placeholder="Fonction" />
									<div class="erreurname"></div></div>

								</fieldset>
								</div>
								
								
								
								
							  <div class="form-group">
                <button type="submit" class="btn btn-default" name="submit_cmp" id="submit_cmp">
                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Postuler
                </button>
            </div>

							</form>
							<!-- Job Form / End -->
						</div>
									</div>

							
									
									
									<hr class="lg">
									
								
									<!-- Google Map / End -->
									
								</div>
							</div>

							<!-- Additional Info Tabs -->
							
							<!-- Additional Info Tabs / End -->

						</div>

						<!-- Sidebar -->
						<aside  class="sidebar col-md-4">
							<hr class="visible-sm visible-xs lg">

							<div class="box box__color-darken mb-30">
								<h4>Tableau de bord</h4>
						<form action="#" method="POST" id="profile-form">
                                    <a href="index.php?page=cmp-profile" class="btn btn-primary btn-block">Tableau de bord</a><br>
									<a href="index.php?page=modifier-cmp" class="btn btn-primary btn-block">Compagnie Profile</a><br>
									<a href="index.php?page=post-offre" class="btn btn-primary btn-block">Poster une offre</a><br>
									<a href="index.php?page=manage-offres" class="btn btn-primary btn-block">Manager mes offres</a><br>
									<a href="index.php?page=condidats" class="btn btn-primary btn-block">Voir les condidats</a><br>
								</form>
							</div>

						

						

							
						</aside>
						<!-- Sidebar / End -->

					</div>
				</div>
			</section>
			<!-- Page Content / End -->

			<!-- Footer -->
			<footer class="footer" id="footer">
				<div class="footer-widgets">
					<div class="container">
						<div class="row">
							<div class="col-sm-4 col-md-4">
								<!-- Widget :: Contacts Info -->
								<div class="contacts-widget widget widget__footer">
									<h3 class="widget-title">Contact Us</h3>
									<div class="widget-content">
										<ul class="contacts-info-list">
											<li>
												<i class="fa fa-map-marker"></i>
												<div class="info-item">
													HandyMan Co., Old Town Avenue, New York, USA 23000
												</div>
											</li>
											<li>
												<i class="fa fa-phone"></i>
												<div class="info-item">
													+1700 124-5678<br>
													+1700 124-5678
												</div>
											</li>
											<li>
												<i class="fa fa-envelope"></i>
												<span class="info-item">
													<a href="mailto:info@dan-fisher.com">support@dan-fisher.com</a>
												</span>
											</li>
											<li>
												<i class="fa fa-clock-o"></i>
												<div class="info-item">
													Monday - Friday 9:00 - 21:00
												</div>
											</li>
										</ul>
									</div>
								</div>
								<!-- /Widget :: Contacts Info -->
							</div>
							<div class="col-sm-4 col-md-4">
								<!-- Widget :: Latest Posts -->
								<div class="latest-posts-widget widget widget__footer">
									<h3 class="widget-title">Recent Posts</h3>
									<div class="widget-content">
										<ul class="latest-posts-list">
											<li>
												<figure class="thumbnail"><a href="#"><img src="images/samples/post-img1-sm.jpg" alt=""></a></figure>
												<h5 class="title"><a href="#">Three Simple Household Repairs That'll Save You Hundreds</a></h5>
												<span class="date">April, 18 2015</span>
											</li>
											<li>
												<figure class="thumbnail"><a href="#"><img src="images/samples/post-img2-sm.jpg" alt=""></a></figure>
												<h5 class="title"><a href="#">Tools That Make Yard Work Easy: The Big Backpack Blower</a></h5>
												<span class="date">March, 21 2015</span>
											</li>
											<li>
												<figure class="thumbnail"><a href="#"><img src="images/samples/post-img3-sm.jpg" alt=""></a></figure>
												<h5 class="title"><a href="#">11 Tips for Dealing With Water Damage, Mold and Mildew</a></h5>
												<span class="date">March, 21 2015</span>
											</li>
										</ul>
									</div>
								</div>
								<!-- /Widget :: Latest Posts -->
							</div>

							<div class="clearfix visible-sm"></div>

							<div class="col-sm-4 col-md-4">
								<!-- Widget :: Newsletter -->
								<div class="widget_newsletter widget widget__footer">
									<h3 class="widget-title">Get Our Newsletter</h3>
									<div class="widget-content">
										<p>Get timely DIY projects for your home and yard delivered right to your inbox every week!</p>

										<form action="php/newsletter-form.php" method="POST" id="newsletter-form">

											<div class="alert alert-success hidden" id="newsletter-alert-success">
												<strong>Success!</strong> Thank you for subscribing.
											</div>
											<div class="alert alert-danger hidden" id="newsletter-alert-error">
												<strong>Error!</strong> Something went wrong.
											</div>

											<div class="form-group">
												<input type="email" 
													value=""
													data-msg-required="Please enter email address."
													data-msg-email="Please enter a valid email address."
													class="form-control"
													placeholder="Enter your email here..."
													name="subscribe-email"
													id="subscribe-email">
											</div>
											<button type="submit" class="btn btn-primary btn-block" data-loading-text="Loading...">Subscribe</button>
										</form>
									</div>
								</div>
								<!-- /Widget :: Newsletter -->
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								Copyright &copy; 2015  <a href="index.html">HandyMan</a> &nbsp;| &nbsp;All Rights Reserved
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- Footer / End -->
			
		</div>
		<!-- Main / End -->
	</div>
	
	
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
				<script src="js/scripttestpost.js"></script>
								<script src="js/display.js"></script>

<script src="popup/js/main.js"></script>
	
	<!-- Javascript Files
	================================================== -->
	<script src="js/display.js"></script>
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

	<!-- Google Map -->
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="vendor/jquery.gmap3.min.js"></script>
	
	<!-- Google Map Init-->
	
	<script type="text/javascript">
		jQuery(function($){
			$('#map_canvas').gmap3({
				
				marker:{
					

					address: '33.9715904,-6.8498129'
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
<?php
}
else
	header('Location: index.php?page=page-404');