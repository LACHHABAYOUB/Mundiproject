$(function(){

	
$('#1').click(function(){
	if(!$('#bloc').is(':visible'))
	{
		$('#bloc').show();
	}
	});
			

 
 });
 //

 $(function(){

	
$('#cvactuel').click(function(){
	if(!$('#bloc').is(':visible'))
	{
		$('#bloc').show();
	}
	});
$('#cvactuel').click(function(){
	if($('#bloc').is(':visible'))
	{
		$('#bloc').hide();
	}
	});		

 
 });
// $(document).ready(function animation(){
//                  
//   $('#bloc1').hide();
//                      
//   $('#remuneration').toggle(
//     function show(){
//       $('#bloc1').slideDown("slow");
//     },
//     function hide(){
//       $('#bloc1').slideUp("normal");
//     }
//   );
//                  
// })