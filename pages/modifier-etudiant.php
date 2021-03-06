<?php
// require_once("glogin/glogin.php");
session_start();
if (isset($_SESSION['etudiant']) and isset($_SESSION['access_token'])){
  
?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Profile | Mundiastage</title>
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
							<h1>Profile</h1>
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
									<h4>Modifier votre profile :</h4><hr style="margin-top:6px;margin-bottom:-5px;" class="lg">		
												<div class="col-md-8 col-md-offset-2">
							<!-- Job Form -->
							<form  action="index.php?page=traitement-user" method="post" id="register-form" class="job-manager-form" enctype="multipart/form-data">
													<br></br>

								<!-- Job Information Fields -->
								<fieldset class="fieldset-job_title">
									<label for="job_title">Nom et Prénom</label>
									<div class="field">
										<input type="text" class="form-control" name="name" id="name" placeholder="<?php echo $_SESSION['login_name'];?>" disabled/>
									</div>

								</fieldset>
								<fieldset class="fieldset-job_title">
									<label for="job_title">Email</label>
									<div class="field">
										<input type="text" class="form-control" name="email" id="email" placeholder="<?php echo $_SESSION['login_email'];?>" disabled/>
									</div>

								</fieldset>
										<?php
								require_once('dbconfig.php');
								$id_user=$_SESSION['login_user'];
								$req=$bdd->query('select * from ville');
								$req1=$bdd->query('select * from pays');
								$req2=$bdd->query("select * from etudiant where google_id='$id_user'");
								$info=$req2->fetch();
								?>
                                 <fieldset class="fieldset-job_title">
									<label for="job_title">Date de naissance</label>
									<div class="field">
										<input type="date" value="<?php echo $info['date_naissance'];?>" class="form-control" name="date_naissance" id="date_naissance"  />
									<div class="erreurname"></div></div>

								</fieldset>
							
								<div class="row">
									<div class="col-md-6">
										<fieldset class="fieldset-job_type">
											<label for="ville">Ville</label>
											<div class="field select-style">
												<select name="ville" id="ville" class="form-control">
													<?php
											while($donnees=$req->fetch()){
												?>
												<option value="<?php echo $donnees['nom'];?>"><?php echo $donnees['nom'];?></option>
												<?php
											                            }
												?>
												</select>
												
											</div>
											
										</fieldset>
												<fieldset class="fieldset-job_type">
											<label for="localisation">Pays</label>
											<div class="field select-style">
												<select name="pays" id="pays" class="form-control">
													<?php
													
											while($donnee=$req1->fetch()){
												
												?>
												<option value="<?php echo $donnee['nom'];?>"><?php echo $donnee['nom'];?></option>
												<?php
											                             }
												?>
												</select>
												
											</div>
											
										</fieldset>
									</div>
									<div class="col-md-6">
							
									</div>
								</div>
      	<fieldset class="fieldset-job_description">
									<label>Adresse</label>
									<div class="field">
										<textarea name="adresse" id="adresse"  cols="20" rows="3" class="form-control" ><?php echo $info['adresse'];?></textarea>
									<div class="erreurloc"></div></div>
									
		</fieldset>
                                <fieldset class="fieldset-job_title">
									<label for="job_title">Telephone</label>
									<div class="field">
										<input type="telephone" value="<?php echo $info['telephone']; ?>" class="form-control" name="telephone" id="telephone" placeholder="" />
									</div>

								</fieldset>
									<fieldset id="Oui" class="fieldset-company_logo">
									<label for="cv">Votre Cv <small(Obligatoire)</small></label>
									<div class="field">
										<input name="cv" type="file" class="form-control"  />
										<small class="description">Format : pdf, doc, docx</small>
									</div>
								</fieldset>
								<hr style="margin-top:0px;margin-bottom:10px;" class="lg">

									<fieldset id="Oui1"class="fieldset-company_logo">
									<label for="lm">Votre lettre de motivation <small></small></label>
									<div class="field">
										<input type="file" class="form-control" name="lm" id="lm" />
										<small class="description">Format : pdf, doc, docx</small>
									</div>
								</fieldset>

								<div class="spacer"></div>
								
								
								
								
							  <div class="form-group">
                <button type="submit" class="btn btn-default" name="submit_user" id="submit_user">
                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Envoyer
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
                                    <a href="index.php?page=profile-etudiant" class="btn btn-primary btn-block">Tableau de bord</a><br>
									<a href="index.php?page=modifier-etudiant" class="btn btn-primary btn-block">Modifier mon Profile</a><br>
									<a href="index.php?page=applications" class="btn btn-primary btn-block">Mes applications</a><br>
								
								</form>
							</div>

							

						

							
						</aside>
						<!-- Sidebar / End -->

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
				<script src="js/scripttestpost.js"></script>
								<script src="js/display.js"></script>
								<script src="js/func.js"></script>

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