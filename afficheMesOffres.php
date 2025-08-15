<?php 
 
 $req=$bd->query("SELECT * FROM  `annonces` where `id_entreprise`={$_SESSION['id_entreprise']} ");
 $offres=$req->fetchAll();
 
 function nombreCandidature($id){

    $req2=$GLOBALS['bd']->query("SELECT COUNT(*) as `total`  from `postulation` where `id_annonce`={$id} ");
    
    if($req2->rowcount()>0){
        $nombre=$req2->fetch();
    }
    else{
        $nombre['total']=0;
    }

    return $nombre['total'];
 }

 if(isset($_GET['id_annonce'])){

    $req3=$bd->query("SELECT * FROM `annonces` where `id_annonce`={$_GET['id_annonce']} ");
    $annonce=$req3->fetch();

    $req4=$bd->query("SELECT * FROM `postulation` as p,`utilisateurs` as u where u.`id_utilisateur`=p.`id_utilisateur` and
    p.`id_annonce`={$_GET['id_annonce']} ");

    $utilisateurs=$req4->fetchAll();

 }

?>