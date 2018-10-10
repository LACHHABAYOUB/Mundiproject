<?php
session_start();
require('dbconfig.php');
$cnx = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$user_email= mysqli_real_escape_string($cnx,$_POST['email_cmp']);
$user_pwd=mysqli_real_escape_string($cnx,$_POST['pwd']);
if(isset($_POST['submit']))
{


	
$req = $bdd->prepare('SELECT * from entreprise WHERE email=:email and valide=1');
$req->execute(array(
	'email' => $user_email
));
$donnees=$req->fetch();
$hash = $donnees['password'];

if (password_verify($user_pwd, $hash)) {
    $_SESSION['id_entreprise']=$donnees['id'];
	$_SESSION['name']=$donnees['name'];
	$_SESSION['email']=$donnees['email'];
	$_SESSION['joining_date']=$donnees['joining_date'];
	$_SESSION['localisation']=$donnees['localisation'];
	$_SESSION['industrie']=$donnees['industrie'];
	$_SESSION['type']=$donnees['type'];
	$_SESSION['adresse']=$donnees['adresse'];
	$_SESSION['description']=$donnees['description'];
	$_SESSION['telephone']=$donnees['telephone'];
	$_SESSION['siteweb']=$donnees['siteweb'];
	$_SESSION['logo']=$donnees['logo'];
		if(isset($_SESSION['page_origine'])){
		  header('Location:'. $_SESSION['page_origine']);
          unset($_SESSION['page_origine']);
	}else{
		   header('Location: index.php?page=cmp-profile');

	}
   
}
else {
    	$_SESSION['erreurconnexionen']='<div style="z-index:1000;position:fixed;left:313px;top:6px;" class="combobox col-md-6"><div  class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
	<strong >Oops !</strong> Email ou Mot de passe est incorrect.</div></div>';
	header("location:".  $_SERVER['HTTP_REFERER']); 

}

}

?>