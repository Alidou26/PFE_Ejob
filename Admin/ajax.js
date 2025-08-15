$(document).ready(function(e){

    //inscription

    $("#b-form").on('submit', function(e){
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
                $("#b-form")[0].reset();
                $(".alert-inscription-success").show();
                $(".alert-inscription-success").html('VOTRE INSCRIPTION A ETE ENREGISTREE AVEC SUCCES VEUILLEZ  VOUS CONNECTER MAINTENANT ! ');
                setTimeout(function(){$(".alert-inscription-success").hide();},5000);
               }


               else {
                $(".alert-inscription-danger").show();
                $(".alert-inscription-danger").html(reponse);
                setTimeout(function(){$(".alert-inscription-danger").hide();},5000);
               }
            
                }
                
            });
    });


})