<?php 

session_start();

$reponse=[];


require('../BaseDeDonnees.php');

//verifier que tous les champs sont remplis

if(!empty($_POST['pseudo']) && !empty($_POST['mot_de_passe']) ){

    //enregistrer les donnees dans des variables

    $pseudo=htmlspecialchars($_POST['pseudo']);
    $mot_de_passe=htmlspecialchars($_POST['mot_de_passe']);

    //verifier si l'utilisateur existe
    
    $verifUtilisateur=$bd->prepare("SELECT * from `admin` WHERE `pseudo` = ?  ");
    $verifUtilisateur->execute(array($pseudo));

    if($verifUtilisateur->rowcount() > 0){
        
        //verifier le mot de passe
       
    $utilisateur=$verifUtilisateur->fetch();
    

    if($mot_de_passe == $utilisateur['mot_de_passe']){

               
           //On cree une SESSION pour l'utilisateur

           $_SESSION['Admin_connecte']=true;
      
           $_SESSION['nom']=$utilisateur['nom'];
           $_SESSION['prenom']=$utilisateur['prenom'];
         
           $_SESSION['pseudo']=$utilisateur['pseudo'];
         
        $reponse['status']=0;
  
        
            $reponse['url']="accueil.php";
        
      
    }
    else {
        $reponse['status']="Votre mot de passe est incorrect !";
    }

    }


}
else {
    $reponse['status']="veuillez remplir tous les champs demandes !";
}


//Retourner la reponse

echo json_encode($reponse);