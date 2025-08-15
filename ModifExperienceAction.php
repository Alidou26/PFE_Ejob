<?php

session_start();

require('BaseDeDonnees.php');

$reponse=-1;

if(!empty($_POST['nom']) && !empty($_POST['poste']) && !empty($_POST['date_debut'])&& !empty($_POST['tache']) )

    { 
        //mettre les donnees dans des variables
           
        //mettre les donnees dans des variables
           
        $nom=strtoupper(htmlspecialchars($_POST['nom']));
        $poste=strtoupper(htmlspecialchars($_POST['poste']));
        $date_debut=htmlspecialchars($_POST['date_debut']);
        if(!empty($_POST['date_fin'])){
        $date_fin=htmlspecialchars($_POST['date_fin']);
        }else{
            $date_fin="Présent";
        }
        $tache=htmlspecialchars($_POST['tache']);
        $idExperience=$_POST['id_experience'];

        $req=$bd->prepare("UPDATE `experience` set `nom_organisme`=?,`date_debut`=?,`date_fin`=?,`poste`=?,`tache`=?
         where `id_experience`=? ");
         $req->execute(array($nom,$date_debut,$date_fin,$poste,$tache,$idExperience));

         $reponse=0;


         //si l utilisateur veut modifier la photo de experiences

         if(!empty($_FILES['photo']['name'])){

            $dest_photo='image experiences/'. $_SESSION['pseudo'].$_FILES['photo']['size'].$_FILES['photo']['name'];
            $nom_photo=$_FILES['photo']['name'];
    
                              //verifier l'extension de la photo
               
                              $extensionPhoto=strrchr($nom_photo,'.');
    
                              $extensionAutorise=array('.jpg','.JPG','.jpeg','.JPEG','.png','.PNG');
                  
                              if(in_array($extensionPhoto,$extensionAutorise)){
                  
                                  //Deplacer l'image dans le dossier image utilisateur
                  
                                  //verifier si l'image a ete enregistre dans le dossier
                  
                                  if(move_uploaded_file($_FILES['photo']['tmp_name'],$dest_photo)){
                                     
                                      //Enregistrer les donnees de l'utilisateurs dans la base de donnees
                  
                                             $req=$bd->prepare("UPDATE `experience` set `photo_organisme`=? where `id_experience`=? ");
                                              $req->execute(array($dest_photo,$idExperience));
    
                                      $reponse=0;
                                  }
                                  else{
                                    $reponse="UNE ERREUR EST SURVENUE";
                                  }
                                }
                                  else{
                                    $reponse="EXTENSION NON AUTORISEE,CHOISIR UNE PHOTO EN JPG,JPEG OU PNG";
                                  }
         }

    }


echo json_encode($reponse);

?>