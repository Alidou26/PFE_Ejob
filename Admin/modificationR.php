<?php 

session_start();

extract($_POST);

$reponse=[];

    require('../BaseDeDonnees.php');

        $id =intval($id);
      if(!empty($nom) && !empty($sigle) && !empty($email) && !empty($telephone) && !empty($pseudo) &&!empty($nombre) &&!empty($description)){

        if(!empty($password)){
          
         $mot_de_passe=password_hash(htmlspecialchars($password),PASSWORD_DEFAULT);
   
            $changeStatus=$bd->prepare('UPDATE `entreprises` SET `mot_de_passe`= ? WHERE `id_entreprise`= ? ');
           
            $changeStatus->execute(array($mot_de_passe,$id));
           
            $modif=$bd->prepare('UPDATE `entreprises` SET `nom_e`= ?, `sigle_e`= ?,`email_e`= ?,`telephone_e`= ?,`pseudo`= ?,`nombre_employe`= ?,`description_e`= ?   where `id_entreprise`= ? ');
        
            $modif->execute(array($nom,$sigle,$email,$telephone,$pseudo,$nombre,$description,$id));
    
    
            $reponse['status']=0;
    }
    else {

        $modif=$bd->prepare('UPDATE `entreprises` SET `nom_e`= ?, `sigle_e`= ?,`email_e`= ?,`telephone_e`= ?,`pseudo`= ?,`nombre_employe`= ?,`description_e`= ?   where `id_entreprise`= ? ');
        
        $modif->execute(array($nom,$sigle,$email,$telephone,$pseudo,$nombre,$description,$id));



        $reponse['status']=0;
    }

}

else {
    
    $reponse['status']="veuillez remplir tous les champs demandes !";
}

      


    
    
    //SI L`UTILISATEUR VEUX MODIFIER UNIQUEMENT LA PHOTO DE PROFIL
    
    if(!empty($_FILES['photo']['name'])){
    
        $dest_photo= '../image-entreprise/'. $nom.$_FILES['photo']['name'];
        
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
