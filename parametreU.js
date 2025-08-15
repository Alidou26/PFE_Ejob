$(document).ready(function(e){

$("#parametreUtilisateur").on('submit', function(e){
	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: 'modifUtilisateur.php',
		data: new FormData(this),
		dataType: 'json',
		contentType: false,
		cache: false,
		processData:false,
		success: function(reponse){
		   if(reponse['status']==0)
		   {
			$(".success ").show();
			
			setTimeout(function(){$(".success").hide();},5000);

		   }
		   else if(reponse['status']==1){
			$("#msg_pass").show();
			
			setTimeout(function(){$("#msg_pass").hide();},5000);
			
		   }
		   else {
			
			$(".error").show();
			$(".error").html(reponse['status']);
			setTimeout(function(){$(".error").hide();},5000);
		   }
		
			}
			
		});

}) 


$("#completermonprofil").on('submit', function(e){
	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: 'completerProfilAction.php',
		data: new FormData(this),
		dataType: 'json',
		contentType: false,
		cache: false,
		processData:false,
		success: function(reponse){
		   if(reponse['status']==0)
		   {
			$(".success ").show();
			setTimeout(function(){$(".success").hide();},5000);
			window.location.href='dashboardU.php';

		   }
		   else {
			
			$(".error").show();
			$(".error").html(reponse['status']);
			setTimeout(function(){$(".error").hide();},5000);
		   }
		
			}
			
		});

}) 


})