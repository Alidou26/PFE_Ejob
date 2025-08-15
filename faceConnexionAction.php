<?php

session_start();

require('BaseDeDonnees.php');

$reponse=-1;

if(isset($_POST['face_id'])){

                        //recuperer les informations de l'utilisateur

                        $verifUtilisateur=$bd->prepare("SELECT * from `utilisateurs` WHERE `face_id` = ?  ");
                        $verifUtilisateur->execute(array($_POST['face_id']));

                        if($verifUtilisateur->rowcount() > 0){
    
                        $utilisateur=$verifUtilisateur->fetch();

                //on met a jour son status dans la base de donnee

                $changeStatus=$bd->prepare('UPDATE `utilisateurs` SET `status`= ? WHERE `id_utilisateur`= ? ');
                $changeStatus->execute(array('CONNECTE',$utilisateur['id_utilisateur']));

           //On cree une SESSION pour l'utilisateur

           $_SESSION['utilisateur_connecte']=true;
           $_SESSION['id_utilisateur']=$utilisateur['id_utilisateur'];
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
    
                        $reponse=0; 

                        }

                        else{
                            //entreprise

                            $verifUtilisateur=$bd->prepare("SELECT * from `entreprises` WHERE `face_id` = ?  ");
                             $verifUtilisateur->execute(array($_POST['face_id']));

                             $utilisateur=$verifUtilisateur->fetch();

             //on met a jour son status dans la base de donnee
    
             $changeStatus=$bd->prepare('UPDATE `entreprises` SET `status`= ? WHERE `id_entreprise`= ? ');
             $changeStatus->execute(array('CONNECTE',$utilisateur['id_entreprise']));
    
           //On cree une SESSION pour l'entreprise

           $_SESSION['entreprise_connecte']=true;
           $_SESSION['id_entreprise']=$utilisateur['id_entreprise'];
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
      

           $reponse=0; 
           

    
                        }
}


echo json_encode($reponse);


?>