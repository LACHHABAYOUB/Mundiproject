// 
// $(document).ready(function() {
    // alert("I am an alert box!");
// });
//test des etudiants !
$(function(){

 $('#submit_cmp').click(function(){
    valid=true;
	  if($('#email_cmp').val()==""){
	     $('#email_cmp').next('.erreuremail').fadeIn().text('Veuillez entrer votre email');
		  $('#email_cmp').css('border-color','red');
		 		 

		 valid=false;
		 window.scrollTo(0, 300);
	  }
	  
	
	  else{
$('#email_cmp').next('.erreuremail').fadeOut();		  
$('#email_cmp').css('border-color','green');
	   
	    
	  }
	  //
	  if($('#pwd').val()==""){
	     $('#pwd').next('.erreurpwdd').fadeIn().text('Veuillez entrer votre mot de passe');
		  $('#pwd').css('border-color','red');

	     valid=false;
		 window.scrollTo(0, 300);
	  }
 else{
	  $('#pwd').next('.erreurpwdd').fadeOut();
	$('#pwd').css('border-color','green');
	  }
	  //

	  
	  //
if($('#confipwd').val()==""  & $('#pwd').val()!="" ){
	     $('#confipwd').next('erreurcpwdd').fadeIn().text('Veuillez re-entrer votre mot de passe');
		 $('#confipwd').css('border-color','red');
		 
		
	     valid=false;
		 window.scrollTo(0, 300);
	  }
 else{
	  $('#confipwd').next('.erreurcpwddd').fadeOut();
	  }
	  
	  
if($('#pwd').val()!=$('#confipwd').val() & $('#confipwd').val()!="" ){
$('#confipwd').next('.erreurcpwdd').fadeIn().text('les mots de passe ne sont pas identique');
$('#pwd').css('border-color','red');	
	     valid=false;
		 window.scrollTo(0, 300);
}

else{
 $('#confipwd').next('.erreurcpwdd').fadeOut();


}

 if($('#name').val()==""){
	     $('#name').next('.erreurname').fadeIn().text('Veuillez entrer le nom de la compagnie');
		  $('#name').css('border-color','red');
		 		 

		 valid=false;
		 window.scrollTo(0, 750);
	  }
	  
	
	  else{
$('#name').next('.erreurname').fadeOut();		  
$('#name').css('border-color','green');
	   
	    
	  }
 
 
 if($('#adresse').val()==""){
	     $('#adresse').next('.erreurloc').fadeIn().text('Veuillez entrer votre adresse');
		  $('#adresse').css('border-color','red');
		 		 

		 valid=false;
		 window.scrollTo(0, 770);
	  }
	  
	
	  else{
$('#adresse').next('.erreurloc').fadeOut();		  
$('#adresse').css('border-color','green');
	   
	    
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
	     $('#description').next('.erreurloc').fadeIn().text('Veuillez décrire votre compagnie');
		  $('#description').css('border-color','red');
		 		 

		 valid=false;
		 window.scrollTo(0, 800);
	  }
	  
	
	  else{
$('#description').next('.erreurloc').fadeOut();		  
$('#description').css('border-color','green');
	   
	    
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


