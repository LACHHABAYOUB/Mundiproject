<header class="header header-menu-fullw">

			<!-- Header Top Bar -->
			

			
		
		
		
			<div class="header-top">
			
				<div class="container">
				
					<div class="header-top-left">
					
						<button class="btn btn-sm btn-default menu-link menu-link__secondary">
							<i class="fa fa-bars"></i>
						</button>
						<div class="menu-container">
							<ul class="header-top-nav header-top-nav__secondary">
								<li><a href="#"><i class="fa fa-twitter"></i> <span class="nav-label">Twitter</span></a></li>
								<li><a href="#"><i class="fa fa-facebook"></i> <span class="nav-label">Facebook</span></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i> <span class="nav-label">Google+</span></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i> <span class="nav-label">Pinterest</span></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i> <span class="nav-label">Instagram</span></a></li>
								<li><a href="#"><i class="fa fa-rss"></i> <span class="nav-label">RSS Feed</span></a></li>
							</ul>
						</div>
					</div>
					<div class="header-top-right">
						<button class="btn btn-sm btn-default menu-link menu-link__tertiary">
							<i class="fa fa-user"></i>
						</button>
						<div class="menu-container">
						<?php
						if(!isset($_SESSION['login_user']) and !isset($_SESSION['login_name']) and !isset($_SESSION['id_entreprise'])){
						?>
						<ul class="header-top-nav header-top-nav__tertiary main-nav">
					        	
								
								<!--<li><a href="#0"><i class="fa fa-sign-in"></i> S'identifier</a></li>-->
								<!--<li><a href="page-login.php"><i class="fa fa-user-plus"></i> Etudiant</a></li>
								-->
								<li class="cd-signin" ><a href="index.php?page=page-login"><i class="fa fa-sign-in"></i>S'identifier</a></li>
								<li class="cd-signup" ><a href="index.php?page=register"><i class="fa fa-user-plus"></i>S'enregistrer</a></li>
								
							</ul>
						<?php
						}
						if(isset($_SESSION['login_name']) AND isset($_SESSION['login_user']) and isset($_SESSION['professeur'])){
						echo '<div style="margin-top:8px;color:white;" class="info"><span style="font-weight:bold;text-decoration:underline;">Salut Professeur</span>  '.$_SESSION['login_name'].' - <a href="./index.php?page=profile-professeur">Profile</a> | <a href="./index.php?page=home&logout=1">Déconnexion</a>	</div>';
					}
						
						if(isset($_SESSION['login_name']) AND isset($_SESSION['login_user']) and isset($_SESSION['etudiant'])){
						echo '<div style="margin-top:8px;color:white;" class="info"><span style="font-weight:bold;text-decoration:underline;">Salut</span>  '.$_SESSION['login_name'].' - <a href="./index.php?page=profile-etudiant">Profile</a> | <a href="./index.php?page=home&logout=1">Déconnexion</a></div>';
					}
                      	if(isset($_SESSION['id_entreprise']) and isset($_SESSION['name'])){
						echo '<div style="margin-top:8px;color:white;" class="info"><span style="font-weight:bold;text-decoration:underline;">Salut</span>  '.$_SESSION['name'].' - <a href="./index.php?page=cmp-profile">Profile</a> | <a href="./index.php?page=home&logout=1">Déconnexion</a></div>';
					}
						
						?>
				
							
						</div>
					</div>
				</div>
			</div>
																			<?php
	if(isset($_SESSION['erreurconnexion'])){
	
	echo $_SESSION['erreurconnexion'];
	 unset($_SESSION['erreurconnexion']);
	}
		if(isset($_SESSION['erreurconnexionen'])){
	
	echo $_SESSION['erreurconnexionen'];
	 unset($_SESSION['erreurconnexionen']);
	}
		if(isset($_SESSION['deconnexion'])){
	
	echo $_SESSION['deconnexion'];
	 unset($_SESSION['deconnexion']);
	}
	//message d inscription 
			if(isset($_SESSION['register'])){
	
	echo $_SESSION['register'];
	 unset($_SESSION['register']);
	}
	
				if(isset($_SESSION['deja_register'])){
	
	echo $_SESSION['deja_register'];
	 unset($_SESSION['deja_register']);
	}
	
					if(isset($_SESSION['error'])){
	
	echo $_SESSION['error'];
	 unset($_SESSION['error']);
	}
						if(isset($_SESSION['post_submit'])){
	
	echo $_SESSION['post_submit'];
	 unset($_SESSION['post_submit']);
	}
	if(isset($_SESSION['error_user'])){
	
	echo $_SESSION['error_user'];
	 unset($_SESSION['error_user']);
	}
					if(isset($_SESSION['success_user'])){
	
	echo $_SESSION['success_user'];
	 unset($_SESSION['success_user']);
	}
						if(isset($_SESSION['post_delete'])){
	
	echo $_SESSION['post_delete'];
	 unset($_SESSION['post_delete']);
	}
?>
			<!-- Header Top Bar / End -->
			
			<div class="header-main">
				<div class="container">
					<!-- Logo -->
					<div class="logo">
						<a href="index.php"><img src="images/logo.png" alt="Handyman"></a>
						<!-- <h1><a href="index.html"><span>Handy</span>Man</a></h1> -->
					</div>
					<!-- Logo / End -->

					<button type="button" class="navbar-toggle">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Navigation -->
					<nav class="nav-main">
						<div class="nav-main-inner">
							<ul data-breakpoint="992" class="flexnav">
								<li class="active"><a href="index.php?page=home">Accueil</a></li>
						        <li><a href="index.php?page=offres">Liste des offres</a></li>	
							    <li><a href="index.php?page=page-about">A propos de nous</a></li>
								<li><a href="index.php?page=page-contacts">Nous contacter</a></li>
							</ul>
						</div>
						
					</nav>
					<!-- Navigation / End -->

				</div>
				
			</div>
			
		
