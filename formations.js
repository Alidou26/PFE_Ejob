$(document).ready(function(e){
    
    $("#AjouterFormation").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'AjouterFormationAction.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            success: function(reponse){
               if(reponse==0)
               {
                $("#AjouterFormation")[0].reset();
                $(".success ").show();
                setTimeout(function(){$(".success").hide();},5000);
    
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

    $("#ModifFormation").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'ModifFormationAction.php',
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
                setTimeout(function(){window.location.href='mesformations.php';},5000);
                
    
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