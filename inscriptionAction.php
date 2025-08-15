<?php 

session_start();

require('BaseDeDonnees.php');

$reponse=-1;

if($_POST['type']=='utilisateur'){

    //verifier que tous les champs sont remplis

    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['telephone']) && !empty($_POST['email'])
    && !empty($_POST['pseudo']) && !empty($_POST['mot_de_passe']) && !empty($_FILES) && !empty($_POST['pays']) )

    { 
        //mettre les donnees dans des variables
           
        $nom=strtoupper(htmlspecialchars($_POST['nom']));
        $prenom=strtoupper(htmlspecialchars($_POST['prenom']));
        $telephone=htmlspecialchars($_POST['telephone']);
        $email=htmlspecialchars($_POST['email']);
        $pseudo=htmlspecialchars($_POST['pseudo']);
        $pays=htmlspecialchars($_POST['pays']);
        $mot_de_passe=password_hash(htmlspecialchars($_POST['mot_de_passe']),PASSWORD_DEFAULT);
        $dest_photo='image-utilisateurs/'. $pseudo.$_FILES['photo']['name'];
        $nom_photo=$_FILES['photo']['name'];



         //verifier si le pseudo n'existe pas deja

         $verifPseudo=$bd->prepare("SELECT `pseudo` from `utilisateurs` WHERE `pseudo` = ?  ");
         $verifPseudo->execute(array($pseudo));
         $verifPseudo1=$bd->prepare("SELECT `pseudo` from `entreprises` WHERE `pseudo` = ?  ");
         $verifPseudo1->execute(array($pseudo));

         if($verifPseudo->rowcount() > 0 || $verifPseudo1->rowcount() > 0  ){
            $reponse="Ce pseudo existe deja , veuillez choisir un autre un pseudo";

         }
       
         else {


            //verifier l'email

            if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                  //verifier l'extension de la photo
           
            $extensionPhoto=strrchr($nom_photo,'.');

            $extensionAutorise=array('.jpg','.JPG','.jpeg','.JPEG','.png','.PNG');

            if(in_array($extensionPhoto,$extensionAutorise)){

                //Deplacer l'image dans le dossier image utilisateur

                //verifier si l'image a ete enregistre dans le dossier

                if(move_uploaded_file($_FILES['photo']['tmp_name'],$dest_photo)){
                   
                    //Enregistrer les donnees de l'utilisateurs dans la base de donnees

                    $enregistre=$bd->prepare('INSERT INTO `utilisateurs`( `nom`, `prenom`,`telephone`, `email`, `pseudo`, `mot_de_passe`, `photo`, `pays`) 
                    VALUES(? ,? ,? , ?,? ,? ,?,?)');

                    $enregistre->execute(array($nom,$prenom,$telephone,$email,$pseudo,$mot_de_passe,$dest_photo,$pays));

                    //recuperer les informations de l'utilisateurs nouvellement inscris dans la premiere etape

                    $verifUtilisateur=$bd->prepare("SELECT * from `utilisateurs` WHERE `pseudo` = ?  ");
                    $verifUtilisateur->execute(array($pseudo));

                    $utilisateur=$verifUtilisateur->fetch();

                                    //on met a jour son status dans la base de donnee

                $changeStatus=$bd->prepare('UPDATE `utilisateurs` SET `status`= ? WHERE `id_utilisateur`= ? ');
                $changeStatus->execute(array('CONNECTE',$utilisateur['id_utilisateur']));

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
                    $reponse="une erreur est survenu , l'image n'a pas ete enregistree !";
                }

            }
            else{

                $reponse="veuillez choisir une photo en jpg ou png !";

            }
            
         
            }
            else {
                $reponse="Votre email n'est pas valide";
            }
         }
         
         
    }

    else{
        $reponse="Veuillez remplir correctement tous les champs !";
    }
}


else{


//verifier que tous les champs sont remplis

if(!empty($_POST['nom']) && !empty($_POST['sigle']) && !empty($_POST['telephone']) && !empty($_POST['email'])
&& !empty($_POST['pseudo']) && !empty($_POST['mot_de_passe'])&& !empty($_POST['date_de_creation']) 
&& !empty($_POST['employe'])&& !empty($_POST['description']) && !empty($_POST['latitude']) && !empty($_POST['longitude']) 
&& !empty($_FILES['photo'])  && !empty($_POST['pays']) )

{ 
    //mettre les donnees dans des variables
       
    $nom=strtoupper(htmlspecialchars($_POST['nom']));
    $sigle=strtoupper(htmlspecialchars($_POST['sigle']));
    $telephone=htmlspecialchars($_POST['telephone']);
    $pays=htmlspecialchars($_POST['pays']);
    $email=htmlspecialchars($_POST['email']);
    $pseudo=htmlspecialchars($_POST['pseudo']);
    $employe=htmlspecialchars($_POST['employe']);
    $date_creation=htmlspecialchars($_POST['date_de_creation']);
    $description=htmlspecialchars($_POST['description']);
    $latitude=htmlspecialchars($_POST['latitude']);
    $longitude=htmlspecialchars($_POST['longitude']);
    $mot_de_passe=password_hash(htmlspecialchars($_POST['mot_de_passe']),PASSWORD_DEFAULT);
    $dest_photo='image-entreprise/'. $pseudo.$_FILES['photo']['name'];
    $nom_photo=$_FILES['photo']['name'];
    



     //verifier si le pseudo n'existe pas deja

     $verifPseudo=$bd->prepare("SELECT `pseudo` from `utilisateurs` WHERE `pseudo` = ?  ");
     $verifPseudo->execute(array($pseudo));
     $verifPseudo1=$bd->prepare("SELECT `pseudo` from `entreprises` WHERE `pseudo` = ?  ");
     $verifPseudo1->execute(array($pseudo));

     if($verifPseudo->rowcount() > 0 || $verifPseudo1->rowcount() > 0  ){
        $reponse="Ce pseudo existe deja , veuillez choisir un autre un pseudo";

     }
   
     else {


        //verifier l'email

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

              //verifier l'extension de la photo
       
        $extensionPhoto=strrchr($nom_photo,'.');

        $extensionAutorise=array('.jpg','.JPG','.jpeg','.JPEG','.png','.PNG');

        if(in_array($extensionPhoto,$extensionAutorise)){

            //Deplacer l'image dans le dossier image utilisateur

            //verifier si l'image a ete enregistre dans le dossier

            if(move_uploaded_file($_FILES['photo']['tmp_name'],$dest_photo)){
               
                //Enregistrer les donnees de l'utilisateurs dans la base de donnees

                $enregistre=$bd->prepare('INSERT INTO `entreprises`( `nom_e`, `sigle_e`,`telephone_e`, `email_e`, `pseudo`, `mot_de_passe`, `photo_e`,`pays_e`,
                `nombre_employe`,`date_de_creation`,`description_e`,`latitude`,`longitude`) VALUES(? ,? ,? , ?,? ,? ,?,?,?,?,?,?,?) ');

                $enregistre->execute(array($nom,$sigle,$telephone,$email,$pseudo,$mot_de_passe,$dest_photo,$pays,$employe,$date_creation,$description,$latitude,$longitude));

                //recuperer les informations de l'utilisateurs nouvellement inscris dans la premiere etape

                $verifUtilisateur=$bd->prepare("SELECT * from `entreprises` WHERE `pseudo` = ?  ");
                $verifUtilisateur->execute(array($pseudo));

                $utilisateur=$verifUtilisateur->fetch();

                
             //on met a jour son status dans la base de donnee
    
             $changeStatus=$bd->prepare('UPDATE `entreprises` SET `status`= ? WHERE `id_entreprise`= ? ');
             $changeStatus->execute(array('CONNECTE',$utilisateur['id_entreprise']));

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

            else{
                $reponse="une erreur est survenu , l'image n'a pas ete enregistree !";
            }

        }
        else{

            $reponse="veuillez choisir une photo en jpg ou png !";

        }
        
     
        }
        else {
            $reponse="Votre email n'est pas valide";
        }
     }
     
     
}

else{
    $reponse="Veuillez remplir correctement tous les champs !";
}


}

    //RETOUR DE LA REPONSE

    echo json_encode($reponse);








?>