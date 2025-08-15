<?php 

session_start();

extract($_POST);

$reponse=[];

    require('../BaseDeDonnees.php');

        $id =intval($id);
      if(!empty($nom) && !empty($prenom) && !empty($email) && !empty($telephone) && !empty($pseudo)){

        if(!empty($password)){
          
         $mot_de_passe=password_hash(htmlspecialchars($password),PASSWORD_DEFAULT);
   
            $changeStatus=$bd->prepare('UPDATE `utilisateurs` SET `mot_de_passe`= ? WHERE `id_utilisateur`= ? ');
           
            $changeStatus->execute(array($mot_de_passe,$id));
           
            $modif=$bd->prepare('UPDATE `utilisateurs` SET `nom`= ?, `prenom`= ?,`email`= ?,`telephone`= ?,`pseudo`= ? where `id_utilisateur`= ? ');
        
            $modif->execute(array($nom,$prenom,$email,$telephone,$pseudo,$id));
    
    
            $reponse['status']=0;
    }
    else {

          
      
       
        $modif=$bd->prepare('UPDATE `utilisateurs` SET `nom`= ?, `prenom`= ?,`email`= ?,`telephone`= ?,`pseudo`= ? where `id_utilisateur`= ? ');
    
        $modif->execute(array($nom,$prenom,$email,$telephone,$pseudo,$id));

        $reponse['status']=0;
    }

}

else {
    
    $reponse['status']="veuillez remplir tous les champs demandes !";
}

      


    
    
    //SI L`UTILISATEUR VEUX MODIFIER UNIQUEMENT LA PHOTO DE PROFIL
    
    if(!empty($_FILES['photo']['name'])){
    
        $dest_photo= '../image-utilisateurs/'. $nom.$_FILES['photo']['name'];
        
        $dest='image-utilisateurs/'. $nom.$_FILES['photo']['name'];
        $nom_photo=$_FILES['photo']['name'];
         //verifier l'extension de la photo
           
         $extensionPhoto=strrchr($nom_photo,'.');
    
         $extensionAutorise=array('.jpg','.JPG','.jpeg','.JPEG','.png','.PNG');
    
         if(in_array($extensionPhoto,$extensionAutorise)){
    
             //Deplacer l'image dans le dossier image utilisateur
    
             //verifier si l'image a ete enregistre dans le dossier
    
           if(move_uploaded_file($_FILES['photo']['tmp_name'],$dest_photo)){
    
           
    
    //Enregistrer les donnees de l'utilisateurs dans la base de donnees
    
       $enregistre=$bd->prepare('UPDATE `utilisateurs` SET `photo`=? WHERE `id_utilisateur`=? ');
    
       $enregistre->execute(array($dest,$id));
       
       $reponse['status']=0;

           } 
         } else{
            $reponse['status']=" FORMAT DE LA PHOTO INCORRECT";
         }
        
        }
          
        //    Retourner la reponse
        echo json_encode($reponse);
?>
