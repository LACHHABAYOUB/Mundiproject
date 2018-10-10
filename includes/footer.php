<?php
require('pages/dbconfig.php');
	$req22=$bdd->query('select * from offre_stage LIMIT 3');
	?>
	<footer class="footer" id="footer">
				<div class="footer-widgets">
					<div class="container">
						<div class="row">
							<div class="col-sm-4 col-md-4">
								<!-- Widget :: Contacts Info -->
								<div class="contacts-widget widget widget__footer">
									<h3 class="widget-title">Contact</h3>
									<div class="widget-content">
										<ul class="contacts-info-list">
											<li>
												<i class="fa fa-map-marker"></i>
												<div class="info-item">
													Campus Université Mundiapolis Aeropole de formation, Nouacer
												</div>
											</li>
											<li>
												<i class="fa fa-phone"></i>
												<div class="info-item">
														05 29 01 37 00<br>
														05 29 01 37 07
												</div>
											</li>
											<li>
												<i class="fa fa-envelope"></i>
												<span class="info-item">
													<a href="mailto:info@dan-fisher.com">	contact@mundiapolis.ma</a>
												</span>
											</li>
										
										</ul>
									</div>
								</div>
								<!-- /Widget :: Contacts Info -->
							</div>
							<div class="col-sm-4 col-md-4">
								<!-- Widget :: Latest Posts -->
								<div class="latest-posts-widget widget widget__footer">
									<h3 class="widget-title">Les dernières offres</h3>
									<div class="widget-content">
										<ul class="latest-posts-list">
										<?php
										while($donnees=$req22->fetch()){
										?>
											<li>
												<figure class="thumbnail"><a href="index.php?page=details-offre&id=<?php echo $donnees['id']; ?>"><img src="images/samples/post-img1-sm.jpg" alt=""></a></figure>
												<h5 class="title"><a href="index.php?page=details-offre&id=<?php echo $donnees['id']; ?>"><?php echo $donnees['title'];?></a></h5>
												<span class="date"><?php echo $donnees['date_publication'];?></span>
											</li>
											<?php
										}
										?>
										</ul>
									</div>
								</div>
								<!-- /Widget :: Latest Posts -->
							</div>

							<div class="clearfix visible-sm"></div>

							<div class="col-sm-4 col-md-4">
								<!-- Widget :: Newsletter -->
								<div class="widget_newsletter widget widget__footer">
									<h3 class="widget-title">Inscrivez-vous à notre newslette</h3>
									<div class="widget-content">
										<p></p>

										<form action="php/newsletter-form.php" method="POST" id="newsletter-form">

											<div class="alert alert-success hidden" id="newsletter-alert-success">
												<strong>Success!</strong> Merci pour votre inscription.
											</div>
											<div class="alert alert-danger hidden" id="newsletter-alert-error">
												<strong>Error!</strong> une erreur s'est produite.
											</div>

											<div class="form-group">
												<input type="email" 
													value=""
													data-msg-required="Veuillez entrer votre email."
													data-msg-email="Veuillez entrer une adresse email valide."
													class="form-control"
													placeholder="Votre email..."
													name="subscribe-email"
													id="subscribe-email">
											</div>
											<button type="submit" class="btn btn-primary btn-block" data-loading-text="Chargement...">S'inscrire</button>
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
								Copyright &copy; 2017  <a href="index.php?page=home">Mundiapolis</a> &nbsp;| &nbsp;TOUS DROITS RÉSERVÉS
							</div>
						</div>
					</div>
				</div>
			</footer>