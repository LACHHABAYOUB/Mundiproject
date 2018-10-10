<?php
session_start();
require('dbconfig.php');
$_SESSION['id_offre']=$_POST['id_offre'];
$id_user=$_SESSION['login_user'];
$cnx = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$req=$bdd->query("select * from etudiant where google_id='$id_user'");
$donnees=$req->fetch();
//

//
$valide="";

if(isset($_POST['submit']) and isset($_POST['message']))
{
	
	if($_POST['cvactuel']=="Non" and $_POST['lmactuelle']=="Non1" and $_FILES["cv"]["name"] !="" and $_FILES["lm"]["name"] !=""){
require_once('upload-cv.php');
	require_once('upload-lm.php');
    $user_id    = mysqli_real_escape_string($cnx,$_SESSION['login_user']);
	$id_offre    = mysqli_real_escape_string($cnx,$_POST['id_offre']);
    $date_postulation   = date('Y-m-d h-m-s');
	$message      = mysqli_real_escape_string($cnx,nl2br($_POST['message']));
    $cv      = mysqli_real_escape_string($cnx,$target_file);
	$lm      = mysqli_real_escape_string($cnx,$target_file_lm);
	$valide      = mysqli_real_escape_string($cnx,$valide);
	}
	elseif($_POST['cvactuel']=="Oui" and $_POST['lmactuelle']=="Oui1" ){
		if($donnees['cv']==null){
			$error1="Vous n'avez pas un CV actuel";
			
		}
		elseif($donnees['lm']==null){
			$error1="Vous n'avez pas une lettre de motivation actuelle";
			
		}
		else{
    $user_id    = mysqli_real_escape_string($cnx,$_SESSION['login_user']);
	$id_offre    = mysqli_real_escape_string($cnx,$_POST['id_offre']);
    $date_postulation   = date('Y-m-d h-m-s');
	$message      = mysqli_real_escape_string($cnx,nl2br($_POST['message']));
    $cv      = $donnees['cv'];
	$lm      = $donnees['lm'];
	$valide  = mysqli_real_escape_string($cnx,$valide);
		   }
	}
elseif($_POST['cvactuel']=="Non" and $_POST['lmactuelle']=="Oui1" and $_FILES["cv"]["name"] !=""){
	
	if($donnees['lm']==null){
			$error1="Vous n'avez pas une lettre de motivation actuelle";
			
		}
		else{
    require('upload-cv.php');
    $user_id    = mysqli_real_escape_string($cnx,$_SESSION['login_user']);
	$id_offre    = mysqli_real_escape_string($cnx,$_POST['id_offre']);
    $date_postulation   = date('Y-m-d h-m-s');
	$message      = mysqli_real_escape_string($cnx,nl2br($_POST['message']));
    $cv      = mysqli_real_escape_string($cnx,$target_file);
	$lm      = $donnees['lm'];
    $valide  = mysqli_real_escape_string($cnx,$valide);
		
		   }
		}
		elseif($_POST['cvactuel']=="Oui" and $_POST['lmactuelle']=="Non1" and $_FILES["lm"]["name"] !=""){
        if($donnees['cv']==null){
			$error1="Vous n'avez pas un CV actuel";
			
		}
		else{
		
	require('upload-lm.php');
	$user_id    = mysqli_real_escape_string($cnx,$_SESSION['login_user']);
	$id_offre    = mysqli_real_escape_string($cnx,$_POST['id_offre']);
    $date_postulation   = date('Y-m-d h-m-s');
	$message      = mysqli_real_escape_string($cnx,nl2br($_POST['message']));
    $cv      = $donnees['cv'];
	$lm      = mysqli_real_escape_string($cnx,$target_file_lm);
    $valide  = mysqli_real_escape_string($cnx,$valide);
		}
		}
	else
		$error1="Un champ est vide";
	

	
														  
														  


														  
    try
    {
 
        
  			if(!isset($error1)){
            $stmt = $bdd->prepare("INSERT INTO postule (id_utilisateur,id_offre,message,nv_cv,nv_lm,date_postulation,valide_postule) values (:id_utilisateur,:id_offre,:message,:nv_cv,:nv_lm,:date_postulation,:valide_postule) ");
            $stmt->bindParam(":id_utilisateur",$user_id);
            $stmt->bindParam(":id_offre",$id_offre);
            $stmt->bindParam(":message",$message);
            $stmt->bindParam(":nv_cv",$cv);
			$stmt->bindParam(":nv_lm",$lm);
			$stmt->bindParam(":date_postulation",$date_postulation);
			$stmt->bindParam(":valide_postule",$valide);
			                }
			else            {
			$_SESSION['error']='<div style="z-index:1000;position:fixed;left:313px;top:6px;" class="col-md-6"><div  class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
	<strong >Oops ! </strong>'.$error1.'</div></div>';          			
			header('Location: index.php?page=details-offre&id='.$_POST['id_offre']);
			break 1;
			}				

            if($stmt->execute())
            {
               $_SESSION['register']='<div style="z-index:1000;position:fixed;left:313px;top:6px;" class="col-md-6"><div  class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
	<strong >Félicitation !</strong> vous avez postuler pour cette offre.</div></div>';
			   header('Location: index.php?page=home');
				
            }
            else
            {
                echo "Query could not execute !";
            }

        
    

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
//
$req0=$bdd->query("select * from offre_stage where id='$id_offre'");
$donnees0=$req0->fetch();
//	
$nom_postule=$donnees['google_name'];
$nom_offre=$donnees0['title'];
$lien='localhost/site/index.php?page=condidat-detail&id_user='.$user_id.'&id_offre='.$id_offre;	
$file_cv=$cv;
$file_lm=$lm;
require('sendemail/index.php');	

	
	
	
	
	
	
}





?>