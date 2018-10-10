<?php
require_once("dbconfig.php");
session_start();
if (isset($_POST['accepter']) and isset($_POST['id_offre']) and isset($_POST['id_utilisateur']) ){
$id_user=$_POST['id_utilisateur'];
$id_offre=$_POST['id_offre'];
$req=$bdd->query("UPDATE postule set valide_postule=1 where id_offre=$id_offre and id_utilisateur=$id_user");
header("Location: " . $_SERVER["HTTP_REFERER"]);	
}
if (isset($_POST['refuser']) and isset($_POST['id_offre']) and isset($_POST['id_utilisateur']) ){
$id_user=$_POST['id_utilisateur'];
$id_offre=$_POST['id_offre'];
$req=$bdd->query("UPDATE postule set valide_postule=0 where id_offre=$id_offre and id_utilisateur=$id_user");
header("Location: " . $_SERVER["HTTP_REFERER"]);	
}

?>