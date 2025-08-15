<?php

$mot=$_GET['mot'];
$lieu=$_GET['lieu'];
$categorie=$_GET['categorie'];

if(!empty($mot)){
    if($lieu!=0 && $categorie!=0){
        $req=$bd->query("SELECT * FROM `annonces` where `id_categorie`={$categorie} and `id_localisation`={$lieu} and
        (`description` like '%$mot%' or `titre` like '%$mot%' ) ");
        $resultats=$req->fetchAll();
    }
    else if($lieu==0 && $categorie!=0 ){
        $req=$bd->query("SELECT * FROM `annonces` where `id_categorie`={$categorie} and
        (`description` like '%$mot%' or `titre` like '%$mot%' ) ");
        $resultats=$req->fetchAll();
    }
    else if($lieu!=0 && $categorie==0){
        $req=$bd->query("SELECT * FROM `annonces` where `id_localisation`={$lieu} and
        (`description` like '%$mot%' or `titre` like '%$mot%' ) ");
        $resultats=$req->fetchAll();
    }
    else{
        $req=$bd->query("SELECT * FROM `annonces` where 
        (`description` like '%$mot%' or `titre` like '%$mot%' ) ");
        $resultats=$req->fetchAll();
    }


}
else{

    if($lieu!=0 && $categorie!=0){
        $req=$bd->query("SELECT * FROM `annonces` where `id_categorie`={$categorie} and `id_localisation`={$lieu} ");
        $resultats=$req->fetchAll();
    }
    else if($lieu==0 && $categorie!=0 ){
        $req=$bd->query("SELECT * FROM `annonces` where `id_categorie`={$categorie}  ");
        $resultats=$req->fetchAll();
    }
    else if($lieu!=0 && $categorie==0){
        $req=$bd->query("SELECT * FROM `annonces` where `id_localisation`={$lieu}  ");
        $resultats=$req->fetchAll();
    }
    else{
        $req=$bd->query("SELECT * FROM `annonces` ");
        $resultats=$req->fetchAll();
    }

}


?>