<?php
require_once('dbconfig.php');
$id_user=$_SESSION['login_user'];
if(!isset($traitement_user)){
$id_offre=$_SESSION['id_offre'];
$id=$id_user."_".$id_offre;
if (!file_exists('uploads/cv/'.$id)) {
    mkdir('uploads/cv/'.$id, 0777, true);
}
$target_dir = "uploads/cv/".$id."/";
                                  }
else{
$id=$id_user."_00";
if (!file_exists('uploads/cv/'.$id)) {
    mkdir('uploads/cv/'.$id, 0777, true);
 }
 // $req0=$bdd->query("select * from etudiant where google_id='$id_user'");
// $donnees=$req0->fetch();
// $fichier = "'".$donnees['cv']."'";
// if( file_exists ( $fichier))
     // unlink( $fichier ) ;									 
// $ouverture = opendir("uploads/cv/".$id."/");
// $lecture = readdir($ouverture);
// unlink($donnees['cv']); 		 
$target_dir = "uploads/cv/".$id."/";
   }	
$target_file = $target_dir . basename($_FILES["cv"]["name"]);
$uploadOk = 1;
$fichiertype = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
    // $check = getimagesize($_FILES["company_logo"]["tmp_name"]);
    // if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        // $uploadOk = 1;
    // } else {
        // echo "File is not an image.";
        // $uploadOk = 0;
		// $error1="File is not an image.";
    // }
// }
// Check if file already exists
if (file_exists($target_file)) {
    echo "Désolé, le fichier CV existe déja.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["cv"]["size"] > 100000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
	$error1="Désolé, le fichier CV est trop large.";
}
// Allow certain file formats
if($fichiertype != "pdf" && $fichiertype != "doc" && $fichiertype != "docx") {
    echo "Sorry, only PDF, DOC & DOCX files are allowed.";
    $uploadOk = 0;
	$error1="Désolé, Seulement les fichiers PDF,DOC et DOCX sont autorisés.";
	if(empty($fichiertype)){
	unset ($error);
	$target_file=null;
	                         }
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["cv"]["tmp_name"],$target_file)) {
        echo "The file ". basename( $_FILES["cv"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
		$error1="Désolé, Une erreur s'est produite lors du téléchargement de votre fichier CV.";
    }
}

?>