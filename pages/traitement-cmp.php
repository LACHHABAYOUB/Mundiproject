<?php
session_start();
require('dbconfig.php');
$cnx = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$id_entreprise=$_SESSION['id_entreprise'];
if(isset($_POST['submit_cmp'])){
	if(isset($_POST['name']) or isset($_POST['adresse']) or isset($_POST['localisation']) or isset($_POST['description']) or isset($_POST['telephone'])){
		$adresse=$_POST['adresse'];
		$name=$_POST['name'];
	    $localisation=$_POST['localisation'];
		$email=$_POST['email'];
		$telephone=$_POST['telephone'];
		$industrie=$_POST['industrie'];
		$type=$_POST['type'];
		$siteweb=$_POST['siteweb'];
		$description=$_POST['description'];
		
		$req=$bdd->prepare("UPDATE entreprise set name=:name,siteweb=:siteweb,description=:description,type=:type, localisation=:localisation, email=:email, adresse=:adresse, industrie=:industrie, telephone=:telephone where id='$id_entreprise'");
		$req->execute(array(
		'name'=>$name,
		'siteweb'=>$siteweb,
		'description'=>$description,
		'type'=>$type,
		'localisation'=>$localisation,
		'email'=>$email,
		'adresse'=>$adresse,
		'industrie'=>$industrie,
		'telephone'=>$telephone
		));
		
		if(isset($_POST['pwd']) and isset($_POST['confipwd']) and $_POST['pwd']==$_POST['confipwd'] and !empty($_POST['pwd']) and !empty($_POST['confipwd'])){
			    $user_password  = mysqli_real_escape_string($cnx,$_POST['pwd']);
			    $password   = password_hash( $user_password, PASSWORD_BCRYPT, array('cost' => 11));
        $req0=$bdd->prepare("UPDATE entreprise set password=:password where id='$id_entreprise'");
		$req0->execute(array(
		'password'=>$password
		));
		}
	}
if($_FILES["logo"]["name"] !="" )	{
	$traitement_user="";
	require('upload.php');
		if(isset($error)){
    $_SESSION['error_user']='<div style="z-index:1000;position:fixed;left:313px;top:6px;" class="col-md-6"><div  class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
	<strong >Oppss !</strong> '.$error.'</div></div>';
	header ("Location: $_SERVER[HTTP_REFERER]" );
                     }
					 else{

$logo = $target_file;
$req1 = $bdd->query("UPDATE entreprise set logo='$logo' where id='$id_entreprise' ");        						 
$_SESSION['success_user']='<div style="z-index:1000;position:fixed;left:313px;top:6px;" class="col-md-6"><div  class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
<strong >Félicitation !</strong> vous avez mis vos informations à jour</div></div>';
header ("Location: $_SERVER[HTTP_REFERER]" );

	                      }
	
}
else{
$_SESSION['success_user']='<div style="z-index:1000;position:fixed;left:313px;top:6px;" class="col-md-6"><div  class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
<strong >Félicitation !</strong> vous avez mis vos informations à jour</div></div>';
header ("Location: $_SERVER[HTTP_REFERER]" );	

}


	
}
	
	

	


?>