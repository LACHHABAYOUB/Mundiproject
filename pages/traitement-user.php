<?php
session_start();
require('dbconfig.php');
$cnx = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(isset($_POST['submit_user'])){
	if(isset($_POST['date_naissance']) or isset($_POST['adresse']) or isset($_POST['pays']) or isset($_POST['ville']) or isset($_POST['telephone'])){
		$adresse=$_POST['adresse'];
	    $pays=$_POST['pays'];
		$ville=$_POST['ville'];
		$telephone=$_POST['telephone'];
		$date_naissance=$_POST['date_naissance'];
		$req=$bdd->prepare("UPDATE etudiant set ville=:ville, pays=:pays, adresse=:adresse, date_naissance=:date_naissance, telephone=:telephone");
		$req->execute(array(
		'ville'=>$ville,
		'pays'=>$pays,
		'adresse'=>$adresse,
		'date_naissance'=>$date_naissance,
		'telephone'=>$telephone
		
		
		));
	}
if($_FILES["cv"]["name"] !="" and $_FILES["lm"]["name"] =="")	{
	$traitement_user="";	
	require_once('upload-cv.php');
		if(isset($error1)){
    $_SESSION['error_user']='<div style="z-index:1000;position:fixed;left:313px;top:6px;" class="col-md-6"><div  class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
	<strong >Oppss !</strong> '.$error1.'</div></div>';
	header ("Location: $_SERVER[HTTP_REFERER]" );
                     }
					 else{
$cv = $target_file;
$req1 = $bdd->query("UPDATE etudiant set cv='$cv' ");        						 
$_SESSION['success_user']='<div style="z-index:1000;position:fixed;left:313px;top:6px;" class="col-md-6"><div  class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
<strong >Félicitation !</strong> vous avez mis vos informations à jour</div></div>';
header ("Location: $_SERVER[HTTP_REFERER]" );
	                      }
	
}
elseif($_FILES["lm"]["name"] !="" and $_FILES["cv"]["name"] ==""){
	$traitement_user="";	
	require_once('upload-lm.php');	
	if(isset($error1)){
    $_SESSION['error_user']='<div style="z-index:1000;position:fixed;left:313px;top:6px;" class="col-md-6"><div  class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
	<strong >Oppss !</strong> '.$error1.'</div></div>';
	header ("Location: $_SERVER[HTTP_REFERER]" );
                     }
					 else{
$lm   = $target_file_lm;
$req = $bdd->query("UPDATE etudiant set lm='$lm' ");        						 						 
$_SESSION['success_user']='<div style="z-index:1000;position:fixed;left:313px;top:6px;" class="col-md-6"><div  class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
<strong >Félicitation !</strong> vous avez mis vos informations à jour</div></div>';
header ("Location: $_SERVER[HTTP_REFERER]" );	
		
		
	}
}
     	

elseif($_FILES["lm"]["name"] !="" and $_FILES["cv"]["name"] !=""){
$traitement_user="";	
	require_once('upload-lm.php');
	require_once('upload-cv.php');	
	
	if(isset($error1)){
    $_SESSION['error_user']='<div style="z-index:1000;position:fixed;left:313px;top:6px;" class="col-md-6"><div  class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
	<strong >Oppss !</strong> '.$error1.'</div></div>';
	header ("Location: $_SERVER[HTTP_REFERER]" );
                     }
					 else{
$lm   = $target_file_lm;
$cv   = $target_file;
$req = $bdd->query("UPDATE etudiant set lm='$lm' , cv='$cv' ");        						 						 
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

                                                             // }
// if(isset($error1)){
// $_SESSION['error_user']='<div style="z-index:1000;position:fixed;left:313px;top:6px;" class="col-md-6"><div  class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
	// <strong >Oppss !</strong> '.$error1.'</div></div>';
	// header ("Location: $_SERVER[HTTP_REFERER]" );	
// }
															 
}
?>