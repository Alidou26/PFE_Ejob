$(document).ready(function(){
  
    $("#message__form").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../messageAction.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            success: function(){
                
            }   
                
            });
            $("#message__form")[0].reset();
    
    });
    
    	});