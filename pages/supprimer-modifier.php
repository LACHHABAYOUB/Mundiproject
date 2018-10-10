<?php
session_start();
require('dbconfig.php');
$cnx = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(isset($_GET['id_utilisateur']) and isset($_GET['id_offre'])){
$id_utilisateur=$_GET['id_utilisateur'];
$id_offre=$_GET['id_offre'];
$req=$bdd->query("delete from postule where id_utilisateur='$id_utilisateur' and id_offre='$id_offre'");  
$_SESSION['error_user']='<div style="z-index:1000;position:fixed;left:313px;top:6px;" class="col-md-6"><div  class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
<strong > Vous</strong> avez supprimer votre postulation</div></div>';
header("Location: " . $_SERVER["HTTP_REFERER"]);
}

if(isset($_GET['id_post_offre'])){
$id_post_offre=$_GET['id_post_offre'];
$req=$bdd->query("delete from offre_stage where id='$id_post_offre'");  
$_SESSION['post_delete']='<div style="z-index:1000;position:fixed;left:313px;top:6px;" class="col-md-6"><div  class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
<strong > Vous</strong> avez supprimer votre Offre</div></div>';
header("Location: " . $_SERVER["HTTP_REFERER"]);
}

if(isset($_POST['submit_modifier'])){
    $titre      = mysqli_real_escape_string($cnx,$_POST['name']);
    $nbr_poste     = mysqli_real_escape_string($cnx,$_POST['poste']);
	$localisation      = mysqli_real_escape_string($cnx,$_POST['localisation']);
    $industrie      = mysqli_real_escape_string($cnx,$_POST['industrie']);
	$demarrage      = mysqli_real_escape_string($cnx,$_POST['demarrage']);
	$duree      = mysqli_real_escape_string($cnx,$_POST['duree']);
	$profil      = mysqli_real_escape_string($cnx,nl2br($_POST['profil']));
	$description      = mysqli_real_escape_string($cnx,nl2br($_POST['description']));
	$id_entreprise      = mysqli_real_escape_string($cnx,$_SESSION['id_entreprise']);
	if($_POST['remuneration']=="Non")	
	$remuneration      = mysqli_real_escape_string($cnx,$_POST['remuneration']);
    else
	$remuneration      = mysqli_real_escape_string($cnx,$_POST['Oui']);
	$contact_name      = mysqli_real_escape_string($cnx,$_POST['contact_name']);
	$contact_email      = mysqli_real_escape_string($cnx,$_POST['contact_email']);
	$contact_fontion      = mysqli_real_escape_string($cnx,$_POST['contact_fonction']);
	$contact_telephone      = mysqli_real_escape_string($cnx,$_POST['contact_telephone']);	
	$id_contact=$_POST['id_contact'];
	
	
$req0=$bdd->prepare("UPDATE contact set nom=:nom,fonction=:fonction,telephone=:telephone,email=:email where id=$id_contact ");
$req0->execute(array(
	'nom' => $contact_name,
	'fonction' => $contact_fontion,
	'telephone' => $contact_telephone,
	'email' => $contact_email
));	

 
$req=$bdd->prepare("UPDATE offre_stage set title=:title,description=:description,nbr_poste=:nbr_poste,localisation=:localisation,industrie=:industrie,demarrage=:demarrage,duree=:duree,profil=:profil,id_entreprise=:id_entreprise,id_contact=:id_contact,remuneration=:remuneration where id=:id");
$req->execute(array(
	'title' => $titre,
	'description' => $description,
	'nbr_poste' => $nbr_poste,
	'localisation' => $localisation,
	'industrie' => $industrie,
	'demarrage' => $demarrage,
	'duree' => $duree,
	'profil' => $profil,
	'id_entreprise' => $id_entreprise,
	'id_contact' => $id_contact,
	'remuneration' => $remuneration,
	'id' => $_POST['id_offre_']


));

$_SESSION['post_delete']='<div style="z-index:1000;position:fixed;left:313px;top:6px;" class="col-md-6"><div  class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
<strong > Vous</strong> avez modifier votre Offre</div></div>';
header("Location: index.php?page=manage-offres");
	
}
?>