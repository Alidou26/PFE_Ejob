<?php

session_start();

$reponse=[];

require('BaseDeDonnees.php');

if(!empty($_POST['presentation']) && !empty($_POST['pretention']) ){

    $presentation=htmlspecialchars($_POST['presentation']);
    $salaire=htmlspecialchars($_POST['pretention']);

    if(!empty($_FILES['fichier']['tmp_name'])){

    $dest_fichier='cv/'. $_SESSION['pseudo'].$_FILES['fichier']['size'].$_FILES['fichier']['name'];
    $nom_fichier=$_FILES['fichier']['name'];

     //verifier l'extension du fichier
       
     $extensionfichier=strrchr($nom_fichier,'.');

     $extensionAutorise=array('.pdf','.PDF','.DOCX','.docx');

     if(in_array($extensionfichier,$extensionAutorise)){

         if(move_uploaded_file($_FILES['fichier']['tmp_name'],$dest_fichier)){
            
             //Enregistrer les donnees de l'utilisateurs dans la base de donnees

             $info=$bd->prepare("UPDATE `utilisateurs` set `pretention_salarial`= ?,`cv`=?,`presentation`=?,`verifie`=? 
             where `id_utilisateur`=? ");
             $info->execute(array($salaire,$dest_fichier,$presentation,'OUI',$_SESSION['id_utilisateur']));

             $_SESSION['cv']=$dest_fichier;
             $_SESSION['presentation']=$presentation;
             $_SESSION['pretention_salarial']=$salaire;
             $_SESSION['verifie']="OUI";

             $reponse['status']=0;

         }
         else{
            $reponse['status']="UNE ERREUR EST SURVENUE";
         }
        }
        else{
            $reponse['status']="EXTENSION NON AUTORISEE. CHOISIR UN FICHIER PDF OU WORD";
         }

        }
        else{

            $info=$bd->prepare("UPDATE `utilisateurs` set `pretention_salarial`= ?,`presentation`=? 
            where `id_utilisateur`=? ");
            $info->execute(array($salaire,$presentation,$_SESSION['id_utilisateur']));

            $_SESSION['presentation']=$presentation;
            $_SESSION['pretention_salarial']=$salaire;

            $reponse['status']=0;
        }

}

echo json_encode($reponse);

?>