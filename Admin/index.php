<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Ejob</title>
  	<!--favicon-->
	<link rel="icon" href="../logo.png" type="image/png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
      <div class="container a-container" id="a-container">
        <form class="form" id="a-form" method="POST">
          <img src="../logo.png" alt="" style="width:10rem;;height:10rem;border-radius:50%;">
          <h2 class="form_title title">Bienvenue Admin !</h2>
          <input class="form__input" type="text" placeholder="Pseudo" name="pseudo" required>
          <input class="form__input" type="password" placeholder="Mot de passe" name="mot_de_passe" required>
          <div class="alert alert-warning" role="alert" style="width:100%;font-size:1.2rem;">   </div>
          <button class="form__button button" type="submit">Se Connecter</button>
        </form>
      </div>
      <div class="container b-container" id="b-container" hidden>
        <form class="form" id="b-form" >
          <h2 class="form_title title" style="font-size: 1.5rem;">Ajouter un Admin</h2>
          <input class="form__input" type="text" placeholder="Nom" name="nom" required>
          <input class="form__input" type="text" placeholder="Prenom" name="prenom" required>

          <input class="form__input" type="text" placeholder="Pseudo" name="pseudo" required>
          <input class="form__input" type="password" placeholder="Mot de Passe" name="mot_de_passe" required>

                    <!-- reponse -->
          <div class="alert alert-danger alert-inscription-danger" role="alert" style="width:100%;font-size:1.2rem;">   </div>
          <div class="alert alert-success alert-inscription-success" role="alert" style="width:100%;font-size:1.2rem;">   </div>
          <button class="form__button button" type="submit">Ajouter</button>

        </form>
      </div>
      <div class="switch" id="switch-cnt">
        <div class="switch__circle"></div>
        <div class="switch__circle switch__circle--t"></div>
        <div class="switch__container" id="switch-c1">
          <h2 class="switch__title title"></h2>
          <p class="switch__description description"></p>
          <button class="switch__button button switch-btn" hidden>S'inscrire</button>
        </div>
        <div class="switch__container is-hidden" id="switch-c2">
          <h2 class="switch__title title"></h2>
          <p class="switch__description description"></p>
          <button class="switch__button button switch-btn">Se Connecter</button>
        </div>
      </div>
    </div>
  </body>
</html>

  
  <script src="ajax.js"></script>
  <script>
    
    //connexion

    $("#a-form").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'connexionAdminAction.php',
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

  </script>
  <script  src="./script.js"></script>
  <script> 
$(".alert-inscription-danger").hide();
$(".alert-inscription-success").hide();
$(".alert-warning").hide();
</script>
</body>
</html>
