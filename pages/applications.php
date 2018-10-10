<?php
// require_once("glogin/glogin.php");
session_start();
if (isset($_SESSION['etudiant'])){
 


?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Applications | Mundiastage </title>
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
							<h1>Applications</h1>
						</div>
					</div>
				</div>
			</section>
			<!-- Page Heading / End -->

			<!-- Page Content -->

<?php
require("dbconfig.php");
$id_user=$_SESSION['login_user'];
$req=$bdd->query("select * from postule,offre_stage
where offre_stage.id=postule.id_offre
and id_utilisateur='$id_user' order by postule.date_postulation asc");
$donnee=$req->fetchAll()
?> 
			<section class="page-content">
			
				<div class="container">

					<div class="row">
					
						<div style="float:right;" class="content col-md-8">
	    
							<div class="box mb-30">
								<div class="job-profile-info">
									<div class="row">
												<div class="title">
						<h2>Liste des offres postées :</h2>
					</div>

					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Titre de l'offre</th>
									<th>Nom de l'entreprise</th>
									<th>Date de postulation</th>
									<th>Status </th>
									<th>Opérations </th>
									
								</tr>
							</thead>
							<tbody>
							<?php
							foreach($donnee as $donnees){
								$id_entreprise=$donnees['id_entreprise'];
								$req0=$bdd->query("select * from entreprise where id=$id_entreprise");
                                $don=$req0->fetch();
							
								
									?>
								<tr>
									<td><?php echo $donnees['title'];?></td>
									<td><?php echo $don['name'];?></td>
									<td><?php echo $donnees['date_postulation'];?></td>
									<td>
									<?php
									if($donnees['valide_postule']==""){
									?>
									<input type="submit" name="encours" value="En cours .." class="btn btn-sm btn-warning">
									<?php
									}
									elseif($donnees['valide_postule']==0){
									?>
									<input type="submit" name="encours" value="Refusé" class="btn btn-sm btn-danger">
									<?php
									}
									else{
									?>
								    <input type="submit" name="accepter" value="Accepté" class="btn btn-sm btn-success">
									</td>	
                                    <?php
									}
								
									?>									
						        <td>
								<a style="margin-left:20px;" href="index.php?page=supprimer-modifier&id_utilisateur=<?php echo $donnees['id_utilisateur']; ?>&id_offre=<?php echo $donnees['id_offre']; ?>"><img alt="Supprimer" src="images/supprimer.png"/></a>

								</td>
								
                                   
								</tr>
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
							<?php
							            }
									?>
									
							</tbody>
						</table>
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
<script src="js/func.js"></script>

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
  $("td a").click(function(){
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
	header('Location: index.php?page=page-404');