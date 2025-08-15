<?php 

session_start();

if(isset($_SESSION['_SESSION_connecte'])){
    
    setcookie('_SESSION_connecte',"true",time()+60*60*24*30);

    //On cree une SESSION pour l'_SESSION

    $_SESSION['_SESSION_connecte']=true;
    $_SESSION['id__SESSION']=$_SESSION['id__SESSION'];
    $_SESSION['nom']=$_SESSION['nom'];
    $_SESSION['prenom']=$_SESSION['prenom'];
    $_SESSION['telephone']=$_SESSION['telephone'];
    $_SESSION['email']=$_SESSION['email'];
    $_SESSION['pseudo']=$_SESSION['pseudo'];
    $_SESSION['photo']=$_SESSION['photo'];
    $_SESSION['status']=$_SESSION['status'];
    $_SESSION['derniere_connexion']=$_SESSION['derniere_connexion'];
    $_SESSION['face_id']=$_SESSION['face_id'];
    $_SESSION['date_inscription']=$_SESSION['date_inscription'];
    $_SESSION['pays']=$_SESSION['pays'];
    $_SESSION['cv']=$_SESSION['cv'];
    $_SESSION['presentation']=$_SESSION['presentation'];
    $_SESSION['pretention_salarial']=$_SESSION['pretention_salarial'];
    $_SESSION['verifie']=$_SESSION['verifie'];
}
else if(isset($_SESSION['entreprise_connecte'])){
    setcookie('entreprise_connecte',"true",time()+60*60*24*30);
    
    //On cree une SESSION pour l'entreprise

    $_SESSION['entreprise_connecte']=true;
    $_SESSION['id_entreprise']=$_SESSION['id_entreprise'];
    $_SESSION['nom_e']=$_SESSION['nom_e'];
    $_SESSION['sigle_e']=$_SESSION['sigle_e'];
    $_SESSION['telephone_e']=$_SESSION['telephone_e'];
    $_SESSION['email_e']=$_SESSION['email_e'];
    $_SESSION['pseudo']=$_SESSION['pseudo'];
    $_SESSION['status']=$_SESSION['status'];
    $_SESSION['derniere_connexion']=$_SESSION['derniere_connexion'];
    $_SESSION['face_id']=$_SESSION['face_id'];
    $_SESSION['date_inscription']=$_SESSION['date_inscription'];
    $_SESSION['date_de_creation']=$_SESSION['date_de_creation'];
    $_SESSION['nombre_employe']=$_SESSION['nombre_employe'];
    $_SESSION['latitude']=$_SESSION['latitude'];
    $_SESSION['longitude']=$_SESSION['longitude'];
    $_SESSION['description_e']=$_SESSION['description_e'];
    $_SESSION['pays_e']=$_SESSION['pays_e'];
    $_SESSION['photo_e']=$_SESSION['photo_e'];

}

?>