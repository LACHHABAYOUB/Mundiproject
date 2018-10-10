// 
// $(document).ready(function() {
    // alert("I am an alert box!");
// });
//test des etudiants !
$(function(){

 $('#submit_cmp').click(function(){
    valid=true;
	  if($('#name').val()==""){
	     $('#name').next('.erreurname').fadeIn().text('Veuillez entrer le titre');
		  $('#name').css('border-color','red');
		 		 

		 valid=false;
		 window.scrollTo(0, 300);
	  }
	  
	
	  else{
$('#name').next('.erreurname').fadeOut();		  
$('#name').css('border-color','green');
	   
	    
	  }
	  //
 if($('#poste').val()==""){
	     // $('#poste').next('.erreurname').fadeIn().text('Veuillez choisir le nbr de poste');
		  $('#poste').css('border-color','red');
		 		 

		 valid=false;
		 window.scrollTo(0, 770);
	  }
	  
	
	  else{
$('#poste').next('.erreurname').fadeOut();		  
$('#poste').css('border-color','green');
	   
	    
	  }
	  //
 
 if($('#duree').val()==""){
	     $('#duree').next('.erreurname').fadeIn().text('Veuillez choisir une durée');
		  $('#duree').css('border-color','red');
		 		 

		 valid=false;
		 window.scrollTo(0, 770);
	  }
	  
	
	  else{
$('#duree').next('.erreurname').fadeOut();		  
$('#duree').css('border-color','green');
	   
	    
	  }
	  //
 if($('#profil').val()==""){
	     $('#profil').next('.erreurname').fadeIn().text('Veuillez choisir une durée');
		  $('#profil').css('border-color','red');
		 		 

		 valid=false;
		 window.scrollTo(0, 770);
	  }
	  
	
	  else{
$('#profil').next('.erreurname').fadeOut();		  
$('#profil').css('border-color','green');
	   
	    
	  }	  
	  //
 
 if($('#demarrage').val()==""){
	     $('#demarrage').next('.erreurname').fadeIn().text('Veuillez choisir une date');
		  $('#demarrage').css('border-color','red');
		 		 

		 valid=false;
		 window.scrollTo(0, 770);
	  }
	  
	
	  else{
$('#demarrage').next('.erreurname').fadeOut();		  
$('#demarrage').css('border-color','green');
	   
	    
	  }
 
  if($('#telephone').val()==""){
	     $('#telephone').next('.erreurloc').fadeIn().text('Veuillez entrer votre téléphone');
		  $('#telephone').css('border-color','red');
		 		 

		 valid=false;
		 window.scrollTo(0, 800);
	  }
	  
	
	  else{
$('#telephone').next('.erreurloc').fadeOut();		  
$('#telephone').css('border-color','green');
	   
	    
	  }
 
  if($('#description').val()==""){
	     $('#description').next('.erreurloc').fadeIn().text('Veuillez décrire votre offre');
		  $('#description').css('border-color','red');
		 		 

		 valid=false;
		 window.scrollTo(0, 800);
	  }
	  
	
	  else{
$('#description').next('.erreurloc').fadeOut();		  
$('#description').css('border-color','green');
	   
	    
	  }

  if($('#contact_name').val()==""){
	     $('#contact_name').next('.erreurname').fadeIn().text('Veuillez entrer le nom de la personne à contacter ');
		  $('#contact_name').css('border-color','red');
		 		 

		 valid=false;
		 window.scrollTo(0, 800);
	  }
	  
	
	  else{
$('#contact_name').next('.erreurname').fadeOut();		  
$('#contact_name').css('border-color','green');
	   
	    
	  }	  

  if($('#contact_email').val()==""){
	     $('#contact_email').next('.erreuremail').fadeIn().text('Veuillez l\'email de la personne à contacter ');
		  $('#contact_email').css('border-color','red');
		 		 

		 valid=false;
		 window.scrollTo(0, 800);
	  }
	  
	
	  else{
$('#contact_email').next('.erreuremail').fadeOut();		  
$('#contact_email').css('border-color','green');
	   
	    
	  }	 
 
  if($('#contact_telephone').val()==""){
	     $('#contact_telephone').next('.erreurname').fadeIn().text('Veuillez le telephone de la personne à contacter ');
		  $('#contact_telephone').css('border-color','red');
		 		 

		 valid=false;
		 window.scrollTo(0, 850);
	  }
	  
	
	  else{
$('#contact_telephone').next('.erreurname').fadeOut();		  
$('#contact_telephone').css('border-color','green');
	   
	    
	  }	 
 
 return valid;
 
 });
});


//test de connexion !


// $(function(){
 // $('#connexion').click(function(){
    // valid=true;
	  // if($('#pseudo').val()==""){
	     // $('#pseudo').next('.erreurcc').fadeIn().text('Veuillez entrer votre nom');
		 // valid=false;
	  // }
	  // else{
	  // $('#pseudo').next('.erreurcc').fadeOut();
	  

	  // }
	  
	  // if($('#pwd').val()==""){
	     // $('#pwd').next('.erreurcc').fadeIn().text('Veuillez entrer votre mot de passe');
	     // valid=false;
	  // }
 // else{
	  // $('#pwd').next('.erreurcc').fadeOut();
	
	  // }

 
 // return valid;

 // });
// });


