<?php
// require_once("glogin/glogin.php");
session_start();
// $id= $_SESSION['id_offre'];
// echo $id;

 // if($_SESSION['id_offre'] != $_GET['id']){

		 	 
		 // header('Location: index.php?page=details-offre&id='.$_SESSION['id_offre']);
		
	 // }
?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Détails offre | Mundiastage</title>
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
	   <script type="text/javascript">
      function catsel(sel) {
        //if (sel.value=="-1" ) return;
        var opt=sel.getElementsByTagName("option" );
        for (var i=0; i<opt.length; i++) {
          var x=document.getElementById(opt[i].value);
          if (x) x.style.display="block";
        }
        var cat = document.getElementById(sel.value);
        if (cat) cat.style.display="none";
      }
    </script>
	
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
 require('dbconfig.php');
 $id=$_GET['id'];
 //select les detail de l'offre
 $req=$bdd->query("Select * from offre_stage where id=$id");
$donnees=$req->fetch();
//select  les info de l'entreprise
$id_entreprise=$donnees['id_entreprise'];
$req0=$bdd->query("SELECT * from entreprise where id='$id_entreprise'");
$donnee=$req0->fetch();
//select le count des offre que l'entreprise a poster
$req1=$bdd->query("SELECT count(*)as nbr_offre from offre_stage where id_entreprise='$id_entreprise'");
$don=$req1->fetch();
//voir si l etudiant a deja postuler pour l'offre
if(isset($_SESSION['etudiant'])){
$id_utilisateur=$_SESSION['login_user'];
$req2=$bdd->query("SELECT * from postule where id_utilisateur='$id_utilisateur' and id_offre='$id'");
$postule=$req2->rowCount();
}
//information sur contact 
$id_contact=$donnees['id_contact'];
$req3=$bdd->query("Select * from contact where id=$id_contact");
$do=$req3->fetch();
?>


			<section class="page-content">
			
				<div class="container">

					<div class="row">
					
						<div style="float:right;" class="content col-md-8">
	    
							<div class="box mb-30">
							<?php
										if(isset($_SESSION['etudiant']))
											if($postule !=0)
											// echo '<div style="width:100%;" class="col-md-6"><div  class="alert alert-warning alert-dismissable">
	// <strong >Oops !</strong>Vous avez déja postuler pour cette offre</div></div>';
	echo '<div style="border:1px solid #faebcc;background-color:#fcf8e3;border-radius:2px;padding:13px;margin-bottom:12px;margin-left:-7px;"><span style="font-weight:bold;">Attention ! </span>Vous avez déja postuler pour cette offre</div>';
										?>
								<div class="job-profile-info">
								<h4>Offre details</h4>	
								
									<div class="row">
										
										<div class="col-md-7">
									
											<i class="tagline"></i>	
										
											<ul class="info">
											<li><i class="fa fa-industry"></i><span style="font-weight:bold;">Industrie : </span><?php echo $donnees['industrie'];?></li>
												<hr style="margin-top:10px;margin-bottom:10px;"  class="lg">
												<li><i class="fa fa-location-arrow"></i><span style="font-weight:bold;">Localisation : </span><a href="#"><?php echo $donnees['localisation'];?></a></li>
												<hr style="margin-top:10px;margin-bottom:10px;"  class="lg">
												<li><i class="fa fa-clock-o"></i><span style="font-weight:bold;">Date de publication : </span><?php echo $donnees['date_publication'];?></li>
												<hr style="margin-top:10px;margin-bottom:10px;"  class="lg">
												<li><i class="fa fa-align-left"></i><span style="font-weight:bold;">Nombre de postes : </span><?php echo $donnees['nbr_poste'];?></li>
												<hr style="margin-top:10px;margin-bottom:10px;"  class="lg">
												<li><i class="fa fa-calendar"></i><span style="font-weight:bold;">Démarrage : </span><?php echo $donnees['demarrage'];?></li>
												<hr style="margin-top:10px;margin-bottom:10px;"  class="lg">
												<li><i class="fa fa-clock-o"></i><span style="font-weight:bold;">Durée : </span><?php echo $donnees['duree'];?></li>
												<hr style="margin-top:10px;margin-bottom:10px;"  class="lg">
												<li><i class="fa fa-money"></i><span style="font-weight:bold;">Rémunération : </span><?php echo $donnees['remuneration'];?></li>
												<hr style="margin-top:10px;margin-bottom:10px;"  class="lg">
												
											</ul>
										</div>
										
									</div>

									<div class="spacer-lg"></div>
									<h4>Description</h4>
									<p><?php echo nl2br(htmlspecialchars($donnees['description']));?></p>
										<h4>Profil</h4>
									<p><?php echo nl2br($donnees['profil']);?></p>

									<br>
									<button class="bouttoncontact" id="btnMenu">Contact informations</button><br><br>
    <div class="boxcontact" style="display:none" id="nav">
   
      <p><span class="contactinfo">Nom :  </span><?php echo ''.$do['nom'];?><br>
	  <span class="contactinfo">Téléphone :  </span><?php echo ''.$do['telephone'];?><br>
	  <span class="contactinfo">Email :  </span><?php echo ''.$do['email'];?>
	  </p>
	 
    </div>
									<hr style="margin-top:20px;margin-bottom:20px;"" class="lg">
									
									<div  style="text-align:center;">
									<?php 
									if(isset($_SESSION['login_name']) AND isset($_SESSION['login_user']) and isset($_SESSION['etudiant']) and $postule ==0){
										
									?>
								<button class="btn btn-success" data-toggle="modal" data-target="#bsModal1">
								Postuler maintenant
							</button></div>
								<?php
									}
									else{
								?>
								<button style="opacity:0.7;pointer-events: none; cursor: default;" class="btn btn-primary" data-toggle="modal" data-target="#bsModal1">
								Postuler maintenant
							</button>
								</div>
							<?php
							}
								?>
									<!-- Google Map / End -->
									
								</div>
							  <!-- Modal -->
							<div class="modal fade" id="bsModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Postuler pour cette offre</h4>
											<?php
	if(isset($_SESSION['error'])){
	
	echo $_SESSION['error'];
	 // unset($_SESSION['error']);
	}
											?>
										</div>
										<div class="modal-body">
										<form action="index.php?page=postuler" method="post" enctype="multipart/form-data">
										<input type="hidden" name="id_offre" value="<?php echo $_GET['id'];?>">
										
								<fieldset class="fieldset-job_description">
									<label>Message (500 max)</label>
									<div class="field">
										<textarea name="message" id="message" cols="15" rows="3" class="form-control" required></textarea>
									<div class="erreurloc"></div></div>
									
								</fieldset><br>
								<fieldset style="width:50%;" class="fieldset-job_type">
											<label for="cvactuel">Utiliser le CV actuel :</label>
											<div class="field select-style">
												<select name="cvactuel" id="cvactuel" class="form-control" onchange="catsel(this)">
													<option value="Oui">Oui</option>
													<option value="Non">Non</option>													
												</select>
											</div>
										</fieldset>
										
									<fieldset style="display:none;" id="Oui" class="fieldset-company_logo">
									<label for="cv">Cv <small>(optional)</small></label>
									<div class="field">
										<input name="cv" type="file" class="form-control"  />
										<small class="description">Format : pdf, doc, docx</small>
									</div>
								</fieldset><br>
								
										<fieldset style="width:50%;" class="fieldset-job_type">
											<label for="lmactuelle">Utiliser la lettre de motivation actuelle :</label>
											<div class="field select-style">
												<select name="lmactuelle" id="lmactuelle" class="form-control" onchange="catsel(this)">
													<option value="Oui1">Oui</option>
													<option value="Non1">Non</option>
													
												</select>
											</div>
										</fieldset>
								<fieldset style="display:none;" id="Oui1"class="fieldset-company_logo">
									<label for="lm">Lettre de motivation <small>(optional)</small></label>
									<div class="field">
										<input type="file" class="form-control" name="lm" id="lm" />
										<small class="description">Format : pdf, doc, docx</small>
									</div>
								</fieldset>
								
						
								
								
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
											<input type="submit" name="submit" class="btn btn-success" value="envoyer" />
										</div>
										</form>
									</div>
								</div>
							</div>	
							</div>

							<!-- Additional Info Tabs -->
							
							<!-- Additional Info Tabs / End -->

						</div>

						<!-- Sidebar -->
						<aside  class="sidebar col-md-4">
							<hr class="visible-sm visible-xs lg">

							<div class="box box__color-darken mb-30">
								<h4 style="color:red;"><?php echo $donnees['title'];?></h4>
								
											<figure class="alignnone">
											<?php
											
										   echo '<img src="'.$donnee['logo'].'" alt=""  />';
											//<img src="images/samples/team-member-1-lg.jpg" alt="">
											?>
												
											</figure>
								<div style="color:blue;font-weight:bold;text-decoration:underline;"><?php echo $donnee['name'];?></div>
                                <?php echo $donnees['localisation'];?>	
                               <hr style="margin-top:10px;margin-bottom:10px;" class="lg">
							<span><?php echo $don['nbr_offre'];?> Offres de stage actuelles</span>				
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
	<script src="js/display.js"></script>

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
window.requestAnimationFrame = window.requestAnimationFrame ||
                            window.mozRequestAnimationFrame ||
                            window.webkitRequestAnimationFrame ||
                            window.msRequestAnimationFrame;

class Anim {
    constructor (el) {
        this.el = document.querySelector(el).style;
    }
    
    fadeIn (speed) {
        this.el.opacity = "0";
        this.el.display = "block"
        
        let start = 0;
        let val = speed = speed / 100000;

        let step = () => {
          if(start === 0) {
              this.el.opacity = val
              start = start + val
              requestAnimationFrame(step);
          } else {
              if(start < 1) {
                  start = start + val
                  this.el.opacity = start
                  requestAnimationFrame(step);
              } else {
                  this.el.opacity = 1
              }
          } 
        }
        requestAnimationFrame(step);
    }
    
    fadeOut (speed) {
        let start = 1;
        let val = speed = speed / 100000;

        let step = () => {
          if(start === 1) {
              this.el.opacity = 1 - val
              start = start - val
              requestAnimationFrame(step);
          } else {
              if(start > 0) {
                  start = start - val
                  this.el.opacity = start
                  requestAnimationFrame(step);
              } else {
                  this.el.opacity = 0
                  this.el.display = "none"
              }
          } 
        }
        requestAnimationFrame(step);
    }
}
        
const Animate = (el) => {
    return new Anim(el);
}

/* utilisation */

let count = 0;

document.querySelector("#btnMenu").addEventListener("click", (e) => {
    switch(count) {
        case 0:
            Animate("#nav").fadeIn(3000)
            count = 1
          break;
        case 1:
            Animate("#nav").fadeOut(3000)
            count = 0
          break;
    }
})
	</script>

	
</body>
</html>
<?php
	
?>