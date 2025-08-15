<?php

session_start();

require('BaseDeDonnees.php');

$reponse=-1;

if(!empty($_POST['nom']) && !empty($_POST['poste']) && !empty($_POST['date_debut'])
    && !empty($_POST['tache']) && !empty($_FILES['photo'])  )

    { 
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
        $dest_photo='image experiences/'.$_SESSION['pseudo'].$_FILES['photo']['size'].$_FILES['photo']['name'];
        $nom_photo=$_FILES['photo']['name'];

                          //verifier l'extension de la photo
           
                          $extensionPhoto=strrchr($nom_photo,'.');

                          $extensionAutorise=array('.jpg','.JPG','.jpeg','.JPEG','.png','.PNG');
              
                          if(in_array($extensionPhoto,$extensionAutorise)){
              
                              //Deplacer l'image dans le dossier image utilisateur
              
                              //verifier si l'image a ete enregistre dans le dossier
              
                              if(move_uploaded_file($_FILES['photo']['tmp_name'],$dest_photo)){
                                 
                                  //Enregistrer les donnees de l'utilisateurs dans la base de donnees
              
                                  $enregistre=$bd->prepare('INSERT INTO `experience`( `nom_organisme`, `date_debut`,`date_fin`, `photo_organisme`, `poste`, `tache`, `id_utilisateur`) 
                                  VALUES(? ,? ,? , ?,? ,? ,?)');
              
                                  $enregistre->execute(array($nom,$date_debut,$date_fin,$dest_photo,$poste,$tache,$_SESSION['id_utilisateur']));

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

    echo json_encode($reponse);


?>