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
	<title>Liste des offres | Mundiastage</title>
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
<?php
require('dbconfig.php');
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
?>
		<!-- Header / End -->

		<!-- Main -->
		<div class="main" role="main">

			<!-- Page Heading -->
			<section class="page-heading">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1>Liste des offres</h1>
						</div>
					</div>
				</div>
			</section>
			<!-- Page Heading / End -->

			<!-- Page Content -->
			<section class="page-content">
				<div class="container">
					
					<div class="job_listings">
						<form action="index.php?page=offres" method="post" class="job_filters">

							<div class="search_jobs">
								<div class="search_keywords">
								<input type="text" name="titre_offre" class="form-control" placeholder="Titre">
								</div>

								<div class="search_location">
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
													
													</select>								</div>

								<div class="search_type">
									
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

								<div class="search_submit">
											<button type="submit" name="cherche_offre" class="btn btn-primary btn-block"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</form>

<?php
if(isset($_POST['cherche_offre'])){
$titre=$_POST['titre_offre'];
$ville=$_POST['ville_offre'];
$domaine=$_POST['domaine_offre'];
	if(empty($_POST['titre_offre']) and $_POST['ville_offre']=="Tout le Maroc" ){
	 
	 $req=$bdd->query("SELECT * from offre_stage where valide=1 and industrie='$domaine' order by date_publication desc");
	                                 }
	elseif(!empty($_POST['titre_offre']) and $_POST['ville_offre']=="Tout le Maroc" ){
		 
		 $req=$bdd->query("SELECT * from offre_stage where valide=1 and industrie='$domaine' and title like'%$titre%' order by date_publication desc");	
	                                 }
    elseif(!empty($_POST['titre_offre']) and $_POST['ville_offre']!="Tout le Maroc" ){
		 
		 $req=$bdd->query("SELECT * from offre_stage where valide=1 and localisation='$ville' and industrie='$domaine' and title like '%$titre%' order by date_publication desc");	
	                                 }
	elseif(empty($_POST['titre_offre']) and $_POST['ville_offre']!="Tout le Maroc" ){
		 
		 $req=$bdd->query("SELECT * from offre_stage where valide=1 and localisation='$ville' and industrie='$domaine' order by date_publication desc");	
	                                 }								 
}
else
{
$req=$bdd->query('SELECT * from offre_stage where valide=1 order by date_publication desc');
}
$count=$req->rowCount();
if($count==0){
	echo "Nous n'avons trouvé aucun résultat pour votre requête";
}
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
					</div>

					<div class="spacer"></div>


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

	<!-- Newsletter Form -->
	<script src="vendor/jquery.validate.js"></script>
	<script src="js/newsletter.js"></script>

	<script src="js/custom.js"></script>


	
</body>
</html>