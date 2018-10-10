// 
// $(document).ready(function() {
    // alert("I am an alert box!");
// });
//test des etudiants !
$(function(){

 $('#submit_cmp').click(function(){
    valid=true;  
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


