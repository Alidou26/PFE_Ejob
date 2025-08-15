$(document).ready(function(e){

    //inscription

    $("#register-account-form-1").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'inscriptionAction.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            success: function(reponse){
               if(reponse == 0)
               {
                   window.location.href='face.php';
               }


               else {
                $(".alert-inscription-danger").show();
                $(".alert-inscription-danger").html(reponse);
                setTimeout(function(){$(".alert-inscription-danger").hide();},5000);
               }
            
                }
                
            });
    });

    //2

    $("#register-account-form").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'inscriptionAction.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            success: function(reponse){
               if(reponse == 0)
               {
                   window.location.href='face.php';
               }


               else {
                $(".alert-inscription-danger").show();
                $(".alert-inscription-danger").html(reponse);
                setTimeout(function(){$(".alert-inscription-danger").hide();},5000);
               }
            
                }
                
            });
    });

    //connexion

    $("#login-form").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'connexionAction.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            success: function(reponse){
               if(reponse['status'] == 0)
               {
                   window.location.href=reponse['url'];
    
    
               }
    
    
               else {
                $(".alert-warning").show();
                $(".alert-warning").html(reponse['status']);
                setTimeout(function(){$(".alert-warning").hide();},5000);
               }
            
                }
                
            });
    });


    




})