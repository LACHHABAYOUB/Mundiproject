<?php
session_start();
require('dbconfig.php');
$cnx = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if($_POST and !empty($_POST['name']) and !empty($_POST['industrie']) and !empty($_POST['localisation']) and !empty($_POST['description'])and !empty($_POST['profil']) and !empty($_POST['duree']) and !empty($_POST['contact_name']) and !empty($_POST['contact_email']))
{
	
    $titre      = mysqli_real_escape_string($cnx,$_POST['name']);
    $nbr_poste     = mysqli_real_escape_string($cnx,$_POST['poste']);
	$localisation      = mysqli_real_escape_string($cnx,$_POST['localisation']);
    $industrie      = mysqli_real_escape_string($cnx,$_POST['industrie']);
	$demarrage      = mysqli_real_escape_string($cnx,$_POST['demarrage']);
	$duree      = mysqli_real_escape_string($cnx,$_POST['duree']);
	$profil      = mysqli_real_escape_string($cnx,nl2br($_POST['profil']));
	$description      = mysqli_real_escape_string($cnx,nl2br($_POST['description']));
	$date_publication   = date('Y-m-d h-m-s');
	$id_entreprise      = mysqli_real_escape_string($cnx,$_SESSION['id_entreprise']);
	if($_POST['remuneration']=="Non")	
	$remuneration      = mysqli_real_escape_string($cnx,$_POST['remuneration']);
    else
	$remuneration      = mysqli_real_escape_string($cnx,$_POST['Oui']);
    $valide=1;
	$contact_name      = mysqli_real_escape_string($cnx,$_POST['contact_name']);
	$contact_email      = mysqli_real_escape_string($cnx,$_POST['contact_email']);
	$contact_fontion      = mysqli_real_escape_string($cnx,$_POST['contact_fonction']);
	$contact_telephone      = mysqli_real_escape_string($cnx,$_POST['contact_telephone']);

$req0=$bdd->prepare("INSERT INTO contact (nom,fonction,telephone,email) values (:nom,:fonction,:telephone,:email) ");
$req0->execute(array(
	'nom' => $contact_name,
	'fonction' => $contact_fontion,
	'telephone' => $contact_telephone,
	'email' => $contact_email
));	
$req1=$bdd->query('select id from contact order by id desc limit 1');
$donnees=$req1->fetch();
 
$req=$bdd->prepare("INSERT INTO offre_stage (title,description,nbr_poste,localisation,industrie,demarrage,duree,date_publication,profil,valide,id_entreprise,id_contact,remuneration) values (:title,:description,:nbr_poste,:localisation,:industrie,:demarrage,:duree,:date_publication,:profil,:valide,:id_entreprise,:id_contact,:remuneration) ");
$req->execute(array(
	'title' => $titre,
	'description' => $description,
	'nbr_poste' => $nbr_poste,
	'localisation' => $localisation,
	'industrie' => $industrie,
	'demarrage' => $demarrage,
	'duree' => $duree,
	'date_publication' => $date_publication,
	'profil' => $profil,
	'valide' => $valide,
	'id_entreprise' => $id_entreprise,
	'id_contact' => $donnees['id'],
	'remuneration' => $remuneration


));

 
$_SESSION['post_submit']='<div style="z-index:1000;position:fixed;left:313px;top:6px;" class="col-md-6"><div  class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
	<strong >Félicitation !</strong> Vous avez posté l\'offre.</div></div>';
	header('Location: index.php?page=cmp-profile'); 
}





?>