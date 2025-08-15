<?php 

session_start();

extract($_POST);

$reponse=[];

    require('BaseDeDonnees.php');

//recherche du mot de passe de l`utilisateur connecter pour la modification

    $verifUtilisateur=$bd->prepare("SELECT `mot_de_passe` from `utilisateurs` WHERE `id_utilisateur` = ?");

    $verifUtilisateur->execute(array($_SESSION['id_utilisateur']));
     $utilisateur=$verifUtilisateur->fetch();
     
   
    
  
      if(!empty($nom) && !empty($prenom) && !empty($pays) && !empty($email) && !empty($telephone) && !empty($pseudo)){

        if(!empty($pws_actuel) || !empty($pws1) || !empty($pws2)){

                    //modification du mot de passe

         if(!empty($pws_actuel) && !empty($pws1) && !empty($pws2)){
 
        if(password_verify($pws_actuel,$utilisateur['mot_de_passe']) && $pws1 == $pws2){
          
         $mot_de_passe=password_hash(htmlspecialchars($pws1),PASSWORD_DEFAULT);
   
            $changeStatus=$bd->prepare('UPDATE `utilisateurs` SET `mot_de_passe`= ? WHERE `id_utilisateur`= ? ');
           
            $changeStatus->execute(array($mot_de_passe,$_SESSION['id_utilisateur']));
           
            $modif=$bd->prepare('UPDATE `utilisateurs` SET `nom`= ?, `prenom`= ?, `pays`= ?,`email`= ?,`telephone`= ?,`pseudo`= ? where `id_utilisateur`= ? ');
        
            $modif->execute(array($nom,$prenom,$pays,$email,$telephone,$pseudo,$_SESSION['id_utilisateur']));
    
            $verifUtilisateur=$bd->prepare("SELECT * from `utilisateurs` WHERE `id_utilisateur` = ?  ");
            $verifUtilisateur->execute(array($_SESSION['id_utilisateur']));
    
            $utilisateur=$verifUtilisateur->fetch();
            
    
            $_SESSION['nom']=$utilisateur['nom'];
            $_SESSION['prenom']=$utilisateur['prenom'];
            $_SESSION['telephone']=$utilisateur['telephone'];
            $_SESSION['email']=$utilisateur['email'];
            $_SESSION['pseudo']=$utilisateur['pseudo'];
            $_SESSION['photo']=$utilisateur['photo'];
            $_SESSION['status']=$utilisateur['status'];
            $_SESSION['derniere_connexion']=$utilisateur['derniere_connexion'];
            $_SESSION['face_id']=$utilisateur['face_id'];
            $_SESSION['date_inscription']=$utilisateur['date_inscription'];
            $_SESSION['pays']=$utilisateur['pays'];
            $_SESSION['cv']=$utilisateur['cv'];
            $_SESSION['presentation']=$utilisateur['presentation'];
            $_SESSION['pretention_salarial']=$utilisateur['pretention_salarial'];
            $_SESSION['verifie']=$utilisateur['verifie'];
    
            $reponse['status']=0;
    }
    else {

        $reponse['status']="mot de passe incorrect";
    }

}

else {
    
    $reponse['status']="veuillez remplir tous les champs demandes !";
}

        } else{
     
    
        $modif=$bd->prepare('UPDATE `utilisateurs` SET `nom`= ?, `prenom`= ?, `pays`= ?,`email`= ?,`telephone`= ?,`pseudo`= ? where `id_utilisateur`= ? ');
        
        $modif->execute(array($nom,$prenom,$pays,$email,$telephone,$pseudo,$_SESSION['id_utilisateur']));

        $verifUtilisateur=$bd->prepare("SELECT * from `utilisateurs` WHERE `id_utilisateur` = ?  ");
        $verifUtilisateur->execute(array($_SESSION['id_utilisateur']));

        $utilisateur=$verifUtilisateur->fetch();
        

        $_SESSION['nom']=$utilisateur['nom'];
        $_SESSION['prenom']=$utilisateur['prenom'];
        $_SESSION['telephone']=$utilisateur['telephone'];
        $_SESSION['email']=$utilisateur['email'];
        $_SESSION['pseudo']=$utilisateur['pseudo'];
        $_SESSION['photo']=$utilisateur['photo'];
        $_SESSION['status']=$utilisateur['status'];
        $_SESSION['derniere_connexion']=$utilisateur['derniere_connexion'];
        $_SESSION['face_id']=$utilisateur['face_id'];
        $_SESSION['date_inscription']=$utilisateur['date_inscription'];
        $_SESSION['pays']=$utilisateur['pays'];
        $_SESSION['cv']=$utilisateur['cv'];
        $_SESSION['presentation']=$utilisateur['presentation'];
        $_SESSION['pretention_salarial']=$utilisateur['pretention_salarial'];
        $_SESSION['verifie']=$utilisateur['verifie'];

        $reponse['status']=0;
    
    }

}
       else {
    
        $reponse['status']="veuillez remplir tous les champs demandes !";
    }
    
    


    
    
    //SI L`UTILISATEUR VEUX MODIFIER UNIQUEMENT LA PHOTO DE PROFIL
    
    if(!empty($_FILES['photo']['name'])){
    
        $dest_photo= 'image-utilisateurs/'. $nom.$_FILES['photo']['name'];
        
        $dest='image-utilisateurs/'. $nom.$_FILES['photo']['name'];
        $nom_photo=$_FILES['photo']['name'];
         //verifier l'extension de la photo
           
         $extensionPhoto=strrchr($nom_photo,'.');
    
         $extensionAutorise=array('.jpg','.JPG','.jpeg','.JPEG','.png','.PNG');
    
         if(in_array($extensionPhoto,$extensionAutorise)){
    
             //Deplacer l'image dans le dossier image utilisateur
    
             //verifier si l'image a ete enregistre dans le dossier
    
           if(move_uploaded_file($_FILES['photo']['tmp_name'],$dest_photo)){
    
            $_SESSION['photo']=$dest;
           
    
    //Enregistrer les donnees de l'utilisateurs dans la base de donnees
    
       $enregistre=$bd->prepare('UPDATE `utilisateurs` SET `photo`=? WHERE `id_utilisateur`=? ');
    
       $enregistre->execute(array($dest,$_SESSION['id_utilisateur']));
       
       $reponse['status']=0;

       $_SESSION['photo']= $dest;
           } 
         } else{
            $reponse['status']=" FORMAT DE LA PHOTO INCORRECT";
         }
        
        }
          
        //    Retourner la reponse
        echo json_encode($reponse);
?>
