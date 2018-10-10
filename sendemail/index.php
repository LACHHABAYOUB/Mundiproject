<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'h.setti@mundiapolis.ma';          // SMTP username
$mail->Password = '/HatiM/1993/'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('h.setti@mundiapolis.ma', 'Mundiapolis');
$mail->addReplyTo('h.setti@mundiapolis.ma', 'Mundiapolis');
$mail->addAddress('h.setti@mundiapolis.ma');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

// $nom_cv=pathinfo($file_cv, PATHINFO_FILENAME);
// $nom_lm=pathinfo($donnees['lm'], PATHINFO_FILENAME);
// $mail->addStringAttachment(file_get_contents($file_cv), $nom_cv);
// $mail->addStringAttachment(file_get_contents($file_lm), $nom_lm);
$mail->addAttachment($file_cv);
$mail->addAttachment($file_lm);

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h4>Bonjour,</h4>';
$bodyContent .= '<p>l\'etudiant <B>'.$nom_postule. '</B> a postulé pour votre offre <B>'.$nom_offre. '</B> </br>Vous trouvez ci-joint le Cv et la lettre Motivation du condidat.<br>
Veuillez consulter notre site pour accepter ou réfuser sa condidature <a href="'.$lien.'"> Cliquez ici </a></p><br>Mundiastage';

$mail->Subject = 'Postulation pour l\'offre '.$nom_offre;
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>
