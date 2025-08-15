<?php

session_start();

require('BaseDeDonnees.php');

$reponse=-1;

if(!empty($_POST['nom']) && !empty($_POST['pays']) && !empty($_POST['anneeDebut']) && !empty($_POST['anneeFin'])
    && !empty($_POST['filiere']) && !empty($_POST['id_formation']) )

    { 
        //mettre les donnees dans des variables
           
        $nom=strtoupper(htmlspecialchars($_POST['nom']));
        $pays=htmlspecialchars($_POST['pays']);
        $anneeDebut=htmlspecialchars($_POST['anneeDebut']);
        $anneeFin=htmlspecialchars($_POST['anneeFin']);
        $filiere=strtoupper(htmlspecialchars($_POST['filiere']));
        $idFormation=$_POST['id_formation'];

        $req=$bd->prepare("UPDATE `formations` set `lieu_formation`=?,`date_debut`=?,`date_fin`=?,`nom_ecole`=?,`filiere`=?
         where `id_formation`=? ");
         $req->execute(array($pays,$anneeDebut,$anneeFin,$nom,$filiere,$idFormation));

         $reponse=0;


         //si l utilisateur veut modifier la photo de formations

         if(!empty($_FILES['photo']['name'])){

            $dest_photo='image formations/'. $_SESSION['pseudo'].$_FILES['photo']['size'].$_FILES['photo']['name'];
            $nom_photo=$_FILES['photo']['name'];
    
                              //verifier l'extension de la photo
               
                              $extensionPhoto=strrchr($nom_photo,'.');
    
                              $extensionAutorise=array('.jpg','.JPG','.jpeg','.JPEG','.png','.PNG');
                  
                              if(in_array($extensionPhoto,$extensionAutorise)){
                  
                                  //Deplacer l'image dans le dossier image utilisateur
                  
                                  //verifier si l'image a ete enregistre dans le dossier
                  
                                  if(move_uploaded_file($_FILES['photo']['tmp_name'],$dest_photo)){
                                     
                                      //Enregistrer les donnees de l'utilisateurs dans la base de donnees
                  
                                             $req=$bd->prepare("UPDATE `formations` set `photo_ecole`=? where `id_formation`=? ");
                                              $req->execute(array($dest_photo,$idFormation));
    
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