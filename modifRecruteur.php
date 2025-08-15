<?php 

session_start();

extract($_POST);

$reponse=[];

    require('BaseDeDonnees.php');

//recherche du mot de passe de l`entreprise connecter pour la modification

    $verifentreprise=$bd->prepare("SELECT `mot_de_passe` from `entreprises` WHERE `id_entreprise` = ?");

    $verifentreprise->execute(array($_SESSION['id_entreprise']));
     $entreprise=$verifentreprise->fetch();
    
  
      if(!empty($nom_e) && !empty($sigle_e) && !empty($pays_e) && !empty($email_e) && !empty($telephone_e) 
      && !empty($date_de_creation) && !empty($employe) && !empty($description) && !empty($pseudo)){

        if(!empty($pws_actuel) || !empty($pws1) || !empty($pws2)){

                    //modification du mot de passe

         if(!empty($pws_actuel) && !empty($pws1) && !empty($pws2)){
 
        if(password_verify($pws_actuel,$entreprise['mot_de_passe']) && $pws1 == $pws2){
          
         $mot_de_passe=password_hash(htmlspecialchars($pws1),PASSWORD_DEFAULT);
   
            $changeStatus=$bd->prepare('UPDATE `entreprises` SET `mot_de_passe`= ? WHERE `id_entreprise`= ? ');
           
            $changeStatus->execute(array($mot_de_passe,$_SESSION['id_entreprise']));
           
            $modif=$bd->prepare('UPDATE `entreprises` SET `nom_e`= ?, `sigle_e`= ?,`description_e`= ? ,`email_e`= ?,`pays_e`= ? ,`nombre_employe`= ? ,
            `date_de_creation`=? ,`telephone_e`=? ,`pseudo`=?  WHERE `id_entreprise`= ? ');
            
            $modif->execute(array($nom_e,$sigle_e,$description,$email_e,$pays_e,$employe,$date_de_creation,$telephone_e,$pseudo,$_SESSION['id_entreprise']));
            
            $verifUtilisateur=$bd->prepare("SELECT * from `entreprises` WHERE `id_entreprise` = ?  ");
            $verifUtilisateur->execute(array($_SESSION['id_entreprise']));
    
            $utilisateur=$verifUtilisateur->fetch();
    
            $_SESSION['nom_e']=$utilisateur['nom_e'];
            $_SESSION['sigle_e']=$utilisateur['sigle_e'];
            $_SESSION['telephone_e']=$utilisateur['telephone_e'];
            $_SESSION['email_e']=$utilisateur['email_e'];
            $_SESSION['pseudo']=$utilisateur['pseudo'];
            $_SESSION['status']=$utilisateur['status'];
            $_SESSION['derniere_connexion']=$utilisateur['derniere_connexion'];
            $_SESSION['face_id']=$utilisateur['face_id'];
            $_SESSION['date_inscription']=$utilisateur['date_inscription'];
            $_SESSION['date_de_creation']=$utilisateur['date_de_creation'];
            $_SESSION['nombre_employe']=$utilisateur['nombre_employe'];
            $_SESSION['latitude']=$utilisateur['latitude'];
            $_SESSION['longitude']=$utilisateur['longitude'];
            $_SESSION['description_e']=$utilisateur['description_e'];
            $_SESSION['pays_e']=$utilisateur['pays_e'];
            $_SESSION['photo_e']=$utilisateur['photo_e'];
    
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
     
    
        $modif=$bd->prepare('UPDATE `entreprises` SET `nom_e`= ?, `sigle_e`= ?,`description_e`= ? ,`email_e`= ?,`pays_e`= ? ,`nombre_employe`= ? ,
        `date_de_creation`=? ,`telephone_e`=? ,`pseudo`=?  WHERE `id_entreprise`= ? ');
        
        $modif->execute(array($nom_e,$sigle_e,$description,$email_e,$pays_e,$employe,$date_de_creation,$telephone_e,$pseudo,$_SESSION['id_entreprise']));
        
        $verifUtilisateur=$bd->prepare("SELECT * from `entreprises` WHERE `id_entreprise` = ?  ");
        $verifUtilisateur->execute(array($_SESSION['id_entreprise']));

        $utilisateur=$verifUtilisateur->fetch();

        $_SESSION['nom_e']=$utilisateur['nom_e'];
        $_SESSION['sigle_e']=$utilisateur['sigle_e'];
        $_SESSION['telephone_e']=$utilisateur['telephone_e'];
        $_SESSION['email_e']=$utilisateur['email_e'];
        $_SESSION['pseudo']=$utilisateur['pseudo'];
        $_SESSION['status']=$utilisateur['status'];
        $_SESSION['derniere_connexion']=$utilisateur['derniere_connexion'];
        $_SESSION['face_id']=$utilisateur['face_id'];
        $_SESSION['date_inscription']=$utilisateur['date_inscription'];
        $_SESSION['date_de_creation']=$utilisateur['date_de_creation'];
        $_SESSION['nombre_employe']=$utilisateur['nombre_employe'];
        $_SESSION['latitude']=$utilisateur['latitude'];
        $_SESSION['longitude']=$utilisateur['longitude'];
        $_SESSION['description_e']=$utilisateur['description_e'];
        $_SESSION['pays_e']=$utilisateur['pays_e'];
        $_SESSION['photo_e']=$utilisateur['photo_e'];

        $reponse['status']=0;
    
    }

}
       else {
    
        $reponse['status']="veuillez remplir tous les champs demandes !";
    }
    
    


    
    
    //SI L`entreprise VEUX MODIFIER UNIQUEMENT LA PHOTO DE PROFIL
    
    if(!empty($_FILES['photo']['name'])){
    
        $dest_photo= 'image-entreprise/'. $_FILES['photo']['size'].$_FILES['photo']['name'];
        
        $dest='image-entreprise/'. $_FILES['photo']['size'].$_FILES['photo']['name'];
        $nom_photo=$_FILES['photo']['name'];
         //verifier l'extension de la photo
           
         $extensionPhoto=strrchr($nom_photo,'.');
    
         $extensionAutorise=array('.jpg','.JPG','.jpeg','.JPEG','.png','.PNG');
    
         if(in_array($extensionPhoto,$extensionAutorise)){
    
             //Deplacer l'image dans le dossier image entreprise
    
             //verifier si l'image a ete enregistre dans le dossier
    
           if(move_uploaded_file($_FILES['photo']['tmp_name'],$dest_photo)){
    
            $_SESSION['photo']=$dest;
           
    
    //Enregistrer les donnees de l'entreprises dans la base de donnees
    
       $enregistre=$bd->prepare('UPDATE `entreprises` SET `photo_e`=? WHERE `id_entreprise`=? ');
    
       $enregistre->execute(array($dest,$_SESSION['id_entreprise']));
       
       $reponse['status']=0;

       $_SESSION['photo_e']= $dest;
           } 
         } else{
            $reponse['status']=" FORMAT DE LA PHOTO INCORRECT";
         }
        
        }
          
        //    Retourner la reponse
        echo json_encode($reponse);
?>
