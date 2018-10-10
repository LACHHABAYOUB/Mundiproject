<?php
session_start();
require('dbconfig.php');

$cnx = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if($_POST and !empty($_POST['name']) and !empty($_POST['email_cmp']) and !empty($_POST['localisation']) and !empty($_POST['adresse'])and !empty($_POST['telephone']) and !empty($_POST['description']))
{
	
$req = $bdd->query("SHOW TABLE STATUS FROM test LIKE 'entreprise' ");
$d = $req->fetch();
echo $d['Auto_increment'];
	$id_entreprise=$d['Auto_increment'];
	require('upload.php');
    $user_name      = mysqli_real_escape_string($cnx,$_POST['name']);
    $user_email     = mysqli_real_escape_string($cnx,$_POST['email_cmp']);
    $user_password  = mysqli_real_escape_string($cnx,$_POST['pwd']);
    $joining_date   = date('Y-m-d');
	$localisation      = mysqli_real_escape_string($cnx,$_POST['localisation']);
	$industrie      = mysqli_real_escape_string($cnx,$_POST['industrie']);
	$type      = mysqli_real_escape_string($cnx,$_POST['type']);
	$adresse      = mysqli_real_escape_string($cnx,$_POST['adresse']);
	$telephone      = mysqli_real_escape_string($cnx,$_POST['telephone']);
	$siteweb      = mysqli_real_escape_string($cnx,$_POST['siteweb']);
	$description      = mysqli_real_escape_string($cnx,nl2br($_POST['description']));
    $logo      = mysqli_real_escape_string($cnx,$target_file);
    $valide=1;
	// $def=null;
    
    //password_hash see : http://www.php.net/manual/en/function.password-hash.php
    $password   = password_hash( $user_password, PASSWORD_BCRYPT, array('cost' => 11));
    
    try
    {
        $stmt = $bdd->prepare("SELECT * FROM entreprise WHERE email=:email");
        $stmt->execute(array(":email"=>$user_email));
        $count = $stmt->rowCount();
        
        if($count==0){
			if(!isset($error)){
            $stmt = $bdd->prepare("INSERT INTO entreprise(name,email,password,joining_date,localisation,industrie,type,adresse,description,telephone,siteweb,logo,valide) VALUES(:name,:email,:password,:joining_date,:localisation,:industrie,:type,:adresse,:description,:telephone,:siteweb,:logo,:valide)");
            $stmt->bindParam(":name",$user_name);
            $stmt->bindParam(":email",$user_email);
            $stmt->bindParam(":password",$password);
            $stmt->bindParam(":joining_date",$joining_date);
			$stmt->bindParam(":localisation",$localisation);
			$stmt->bindParam(":industrie",$industrie);
			$stmt->bindParam(":type",$type);
			$stmt->bindParam(":adresse",$adresse);
			$stmt->bindParam(":description",$description);
			$stmt->bindParam(":telephone",$telephone);
			$stmt->bindParam(":siteweb",$siteweb);
			$stmt->bindParam(":logo",$logo);
			$stmt->bindParam(":valide",$valide);
			
			
		
			                }
			else            {
			$_SESSION['error']='<div style="z-index:1000;position:fixed;left:313px;top:6px;" class="col-md-6"><div  class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
	<strong >Oops !</strong>'.$error.'</div></div>';          			
			header('Location: index.php?page=home');
			break 1;
			                }				

            if($stmt->execute())
            {
			//recuper id de l'entreprise pour l'inserer dans le dossier de logo
			// $req=$bdd->query("select max(id) as maxi from entreprise");
			// $donnees=$req->fetch();
			// $id_entreprise=$donnees['maxi'];
			 // require('upload.php');
			// $logo      = mysqli_real_escape_string($cnx,$target_file);
			// $req2=$bdd->query("update entreprise set logo='$logo' where id='$id_entreprise'");
               $_SESSION['register']='<div style="z-index:1000;position:fixed;left:313px;top:6px;" class="col-md-6"><div  class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
	<strong >Félicitation !</strong> vous vous êtes inscrits.</div></div>';
			   header('Location: index.php?page=home');
				
            }
            else
            {
                echo "Query could not execute !";
            }

        }
        else{

           $_SESSION['deja_register']='<div style="z-index:1000;position:fixed;left:313px;top:6px;" class="col-md-6"><div  class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
	<strong >Attention !</strong> vous êtes déja un membre.</div></div>';
		   header('Location: index.php?page=home');
        }

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}





?>