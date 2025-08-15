$(document).ready(function(e){
    
    $("#AjouterExperience").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'AjouterExperienceAction.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            success: function(reponse){
               if(reponse==0)
               {
                $("#AjouterExperience")[0].reset();
                $(".success ").show();
                setTimeout(function(){$(".success").hide();},5000);
                setTimeout(function(){window.location.href='mesexperiences.php';},3000);
    
               }
               else {
                
                $(".error").show();
                $(".error").html(reponse);
                setTimeout(function(){$(".error").hide();},5000);
               }
            
                }
                
            });
    
    }) 

    //modif

    $("#ModifierExperience").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'ModifExperienceAction.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            success: function(reponse){
               if(reponse==0)
               {
                $(".success ").show();
                setTimeout(function(){$(".success").hide();},5000);
                setTimeout(function(){window.location.href='mesexperiences.php';},3000);
                
    
               }
               else {
                
                $(".error").show();
                $(".error").html(reponse);
                setTimeout(function(){$(".error").hide();},5000);
               }
            
                }
                
            });
    
    }) 

    
    
    
    })