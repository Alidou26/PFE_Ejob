
<?php

require('../BaseDeDonnees.php');
session_start();
require('../functions.php');

if(isset($_GET)){

    $id=$_GET['id'];
    $LesPostes=getPostByUser($id);
}

include("header.php");

?>

        <!-- Start Page title and tab -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Les Postes</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Postes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Les Postes</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        
                        <ul class="nav nav-tabs" role="tablist">
                           
                        </ul>


                        <div class="tab-content mt-3">
                         
                           
                            <div role="tabpanel" class="tab-pane vivify fadeIn active" id="News" aria-expanded="true">
                             
                           <?php foreach($LesPostes as $po){?>
                                <div class="card">
                                    <div class="card-body">
                                        <article class="media">
                                            <div class="mr-3">
                                                <img class="w150" src="../<?=$po->image_poste?>" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="content">
                                                    <p class="h5"><?=$po->nom?><small>@<?=$po->pseudo?></small> <small class="float-right text-muted"> <?=$po->date_poste?> </small></p>
                                                    <p><?php $texte=$po->texte; ?> <?=  $chaine=substr($texte,0,305); ?>.....</p>
                                                </div>
                                                <nav class="d-flex text-muted">
        
                                                    <a href="#" class="icon mr-3"><i class="fe fe-repeat"></i> <?=count(getComments($po->id_poste))?></a>
                                                    <a href="#" class="icon mr-3"><i class="fe fe-heart"></i> <?=getLikes($po->id_poste)?></a>
                                                    <a href="../actions.php?deletepost=<?=$po->id_poste?>" class="text-muted ml-auto">  <button class="btn btn-danger btn-sm">Supprimer</button></a>
                                                </nav>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <?php }?>

                            </div>
                        </div>


                        
                    </div>
                </div>
            </div>
        </div>
        <?php include("footer.php");?>
    </div>    
</div>


<!-- Start Main project js, jQuery, Bootstrap -->
<script src="../assets/bundles/lib.vendor.bundle.js"></script>

<!-- Start all plugin js -->

<!-- Start project main js  and page js -->
<script src="../assets/js/core.js"></script>
</body>
</html>
