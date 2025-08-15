<?php


@$pseudo=$_GET['pseudo'];
@$nom=$_GET['nom'];
@$prenom=$_GET['prenom'];

$pseudo.=$nom;
$prenom.=$pseudo;
$mot=$prenom;
if(!empty($pseudo)&& !empty($nom)&& !empty($prenom)){
  
        $req=$bd->query("SELECT * FROM `utilisateurs` where `pseudo` like '%$pseudo%' or `nom` like '%$nom%' or `prenom` like '%$prenom%' ");
        $resultats=$req->fetchAll(PDO::FETCH_OBJ);
}else if(!empty($pseudo)&& !empty($nom)){

    $req=$bd->query("SELECT * FROM `utilisateurs` where `pseudo` like '%$pseudo%' or `nom` like '%$nom%'");
    $resultats=$req->fetchAll(PDO::FETCH_OBJ);

}else if(!empty($nom)&& !empty($prenom)){

    $req=$bd->query("SELECT * FROM `utilisateurs` where `nom` like '%$nom%' or `prenom` like '%$prenom%'");
    $resultats=$req->fetchAll(PDO::FETCH_OBJ);

}else if(!empty($pseudo)&& !empty($prenom)){

    $req=$bd->query("SELECT * FROM `utilisateurs` where `pseudo` like '%$pseudo%'  or `prenom` like '%$prenom%' ");
    $resultats=$req->fetchAll(PDO::FETCH_OBJ);

}else if(!empty($pseudo)){

    $req=$bd->query("SELECT * FROM `utilisateurs` where `pseudo` like '%$pseudo%' ");
    $resultats=$req->fetchAll(PDO::FETCH_OBJ);
}else if(!empty($nom)){

    $req=$bd->query("SELECT * FROM `utilisateurs` where `nom` like '%$nom%' ");
    $resultats=$req->fetchAll(PDO::FETCH_OBJ);

}else if(!empty($prenom)){

    $req=$bd->query("SELECT * FROM `utilisateurs` where `prenom` like '%$prenom%' ");
    $resultats=$req->fetchAll(PDO::FETCH_OBJ);
}
