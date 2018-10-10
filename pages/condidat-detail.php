<?php
// require_once("glogin/glogin.php");
session_start();
// $_GET['id_user'] = (int) $_GET['id_user'];
// $_GET['id_offre'] = (int) $_GET['id_offre'];
$_SESSION['page_origine'] = $_SERVER['REQUEST_URI'];
if (isset($_SESSION['id_entreprise']) and isset($_GET['id_user']) and isset($_GET['id_offre'])){
 


?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Détails | Mundiastage </title>
	<meta name="description" content="Handyman - Job Board HTML Template - 1.0">
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
							<h1>Détails</h1>
						</div>
					</div>
				</div>
			</section>
			<!-- Page Heading / End -->

			<!-- Page Content -->

<?php
require("dbconfig.php");
$id_entreprise=$_SESSION['id_entreprise'];
$id_user=$_GET['id_user'];
$id_offre=$_GET['id_offre'];
$req=$bdd->query("select * from postule,offre_stage
where postule.id_offre=offre_stage.id
and postule.id_utilisateur='$id_user' and postule.id_offre='$id_offre'
");
$donnees=$req->fetch(PDO::FETCH_ASSOC);
$count=$req->rowCount();
$req0=$bdd->query("select * from etudiant where google_id=$id_user");
  $don=$req0->fetch();
  
$nom_cv=pathinfo($donnees['nv_cv'], PATHINFO_FILENAME);
$nom_lm=pathinfo($donnees['nv_lm'], PATHINFO_FILENAME);  
?> 
			<section class="page-content">
			
				<div class="container">

					<div class="row">
					
						<div style="float:right;" class="content col-md-8">
	    
							<div class="box mb-30">
								<div class="job-profile-info">
<?php
if($count!=0){
?>									
									<div class="row">
									
												<div class="title">
						<h2>Détails :</h2>
					</div>
					                       

										   <div class="col-md-7">
								
											<i class="tagline"></i>	
                                                <ul class="info">
											<li><i class="fa fa-info"></i><span style="font-weight:bold;">Nom de condidat : </span><?php echo $don['google_name'];?></li>
												<hr style="margin-top:10px;margin-bottom:10px;"  class="lg">
												<i class="fa fa-industry"></i><span style="font-weight:bold;">Titre de l'offre : </span><?php echo $donnees['title'];?></li>
												<hr style="margin-top:10px;margin-bottom:10px;"  class="lg">
												<i class="fa fa-clock-o"></i><span style="font-weight:bold;">Date de postulation : </span><?php echo $donnees['date_postulation'];?></li>
												<hr style="margin-top:10px;margin-bottom:10px;"  class="lg">
												<i class="fa fa-sticky-note"></i><span style="font-weight:bold;">Message : </span><a href="" data-id="<?php echo $donnees['message'];?>" data-toggle="modal" data-target="#bsModal1" alt="message">	Cliquer pour afficher</a></li>
												<hr style="margin-top:10px;margin-bottom:10px;"  class="lg">
											    <i class="fa fa-file-pdf-o"></i><span style="font-weight:bold;">Cv : </span> <a href="<?php echo $donnees['nv_cv'] ;?>" alt="cv"> <?php echo $nom_cv;?></a><br></li>
												<hr style="margin-top:10px;margin-bottom:10px;"  class="lg">
												<i class="fa fa-file-pdf-o"></i><span style="font-weight:bold;">Lettre de Motivation : </span> <a href="<?php echo $donnees['nv_lm'] ;?>" alt="cv"><?php echo $nom_lm;?></a><br></li>
												<hr style="margin-top:10px;margin-bottom:10px;"  class="lg">
												
											</ul>
										
								
										
									</div>
									
								
									
									
													<div class="modal fade" id="bsModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Message</h4>
										</div>
										<div class="modal-body">
										<form action="" method="post" enctype="multipart/form-data">
                                      <p id="demo"></p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
										</div>
										</form>
									</div>
								</div>
							</div>
									</div>
	
	
	                            <div style="margin-left:40%;margin-top:30px;">
									<?php
									if($donnees['valide_postule']==0){
									?>
									<form action="index.php?page=traitement-postule" method="post">
									   <input type="submit" name="accepter" value="Accepter" class="btn btn-sm btn-success">
									   <input type="hidden" name="id_offre" value="<?php echo $donnees['id_offre']; ?>" >
									   <input type="hidden" name="id_utilisateur" value="<?php echo $donnees['id_utilisateur']; ?>" >
									</form>
									<?php
									                         }
									else{
									?>
                                    <form action="index.php?page=traitement-postule" method="post">
									   <input type="submit" name="refuser" value="Refuser" class="btn btn-sm btn-danger">
									    <input type="hidden" name="id_offre" value="<?php echo $donnees['id_offre']; ?>" >
									   <input type="hidden" name="id_utilisateur" value="<?php echo $donnees['id_utilisateur']; ?>" >
									</form>									<?php
									                         }
									?>										
									
									</div>
					<?php
}
else{
?>	
<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
								<strong>Opss!</strong> L'offre a été suprimée.
</div>	
<?php
}
?>				
									
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
<script src="popup/js/main.js"></script>
	
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
		<script type="text/javascript">
$(document).ready(function(){
  $("ul a").click(function(){
    var id = $(this).attr("data-id");
document.getElementById("demo").innerHTML = id;
  });
 });
	</script>

	
</body>
</html>
<?php
}
else
	header('Location: index.php?page=page-login');