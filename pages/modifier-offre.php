<?php
// require_once("glogin/glogin.php");
session_start();
require("dbconfig.php");
$id_entreprise=$_SESSION['id_entreprise'];
$_GET['id_post_offre'] = (int) $_GET['id_post_offre'];
$id_off=$_GET['id_post_offre'];
$req00=$bdd->query("select * from offre_stage where id=$id_off");
$d=$req00->fetch();
// if(empty($_SESSION['id_off']))
// $_SESSION['id_off']=$_POST['id_offre'];


if (isset($_SESSION['id_entreprise']) and isset($_GET['id_post_offre']) and $d['id_entreprise']==$id_entreprise){

?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Modifier l'offre | Mundiastage</title>
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
							<h1>Modifier</h1>
						</div>
					</div>
				</div>
			</section>
			<!-- Page Heading / End -->

			<!-- Page Content -->

<?php
// $id_entreprise=$_SESSION['id_entreprise'];
$id_off=$_GET['id_post_offre'];
$req=$bdd->query("select * from offre_stage where id=$id_off");
$donnees=$req->fetch();

$id_contact=$donnees['id_contact'];
$req1=$bdd->query("select * from contact where id=$id_contact");
$donnee=$req1->fetch();

?>

			<section class="page-content">
			
				<div class="container">

					<div class="row">
					
						<div style="float:right;" class="content col-md-8">
	    
							<div class="box mb-30">
								<div class="job-profile-info">
									<div class="row">
									<h4>Modifier l'offre :</h4><hr style="margin-top:6px;margin-bottom:-5px;" class="lg">		
												<div class="col-md-8 col-md-offset-2">
							<!-- Job Form -->
							<form  action="index.php?page=supprimer-modifier" method="post" id="register-form" class="job-manager-form" enctype="multipart/form-data">
													<br></br>

								<!-- Job Information Fields -->
								<fieldset class="fieldset-job_title">
									<label for="job_title">Titre</label>
									<div class="field">
										<input type="text" class="form-control" name="name" id="name" value="<?php echo $donnees['title'];?>" />
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
										<input type="number" min="1" max="20" class="form-control" name="poste" id="poste" value="<?php echo $donnees['nbr_poste'];?>" />
									<div class="erreurname"></div></div>

								</fieldset>
                                 <fieldset class="fieldset-job_title">
									<label for="job_title">Démarrage</label>
									<div class="field">
										<input type="date" class="form-control" name="demarrage" id="demarrage" value="<?php echo $donnees['demarrage'];?>" />
									<div class="erreurname"></div></div>

								</fieldset>
								
								<fieldset class="fieldset-job_title">
									<label for="job_title">Durée</label>
									<div class="field">
										<input type="text" class="form-control" name="duree" id="duree"  value="<?php echo $donnees['duree'];?>"/>
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
										<textarea name="profil" id="profil" cols="20" rows="6" class="form-control"><?php echo $donnees['profil'];?></textarea>
									<div class="erreurloc"></div></div>
									
								</fieldset>
                           	<fieldset class="fieldset-job_description">
									<label>Stage description</label>
									<div class="field">
										<textarea name="description" id="description" cols="20" rows="20" class="form-control"><?php echo $donnees['description'];?></textarea>
									<div class="erreurloc"></div></div>
									
								</fieldset>


								<div class="spacer"></div>
<div class="row">								
<h4>Contact information :</h4>
	                           <fieldset class="fieldset-job_title">
									<label for="contact_name">	</label>
									<div class="field">
										<input type="text" class="form-control" name="contact_name" id="contact_name" value="<?php echo $donnee['nom'];?>" />
									<div class="erreurname"></div></div>

								</fieldset>
									<div class="form-group form-grop__icon">
								<i class="entypo mail"></i>
								<input type="email" name="contact_email" id="contact_email" class="form-control" value="<?php echo $donnee['email'];?>">
								<div class="erreuremail"></div>
								
							</div>
							  <fieldset class="fieldset-job_title">
									<label for="contact_telephone">	</label>
									<div class="field">
										<input type="text" class="form-control" name="contact_telephone" id="contact_telephone" value="<?php echo $donnee['telephone'];?>" />
									<div class="erreurname"></div></div>

								</fieldset>
								  <fieldset class="fieldset-job_title">
									<label for="contact_fonction">	</label>
									<div class="field">
										<input type="text" class="form-control" name="contact_fonction" id="contact_fonction" value="<?php echo $donnee['fonction'];?>" />
									<div class="erreurname"></div></div>

								</fieldset>
								</div>
								
                               <input type="hidden" name="id_contact" value="<?php echo $id_contact;?>">
							   <input type="hidden" name="id_offre_" value="<?php echo $id_off;?>">
								
								
							  <div class="form-group">
                <button type="submit" class="btn btn-default" name="submit_modifier" id="submit_modifier">
                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Modifier
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
					<?php include("includes/footer.php"); ?>

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