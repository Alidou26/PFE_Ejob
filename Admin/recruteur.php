<?php

require('../BaseDeDonnees.php');
session_start();
require('../functions.php');

$recruteur=recruteur();

include("header.php");
?>


        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Recruteur</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ejob</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Recruteur</li>
                        </ol>
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="pro-grid">
                        <div class="row">

                        <?php foreach($recruteur as $recru){?>
                          
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body text-center ribbon">
                                        <div class="ribbon-box green" data-toggle="tooltip" title="Recruteur"><i class="fa fa-star"></i></div>
                                        <a href="profilRecruteur.php?id=<?=$recru->id_entreprise?>"><img class="card-profile-img" src="../<?=$recru->photo_e?>" alt="" style="height:5rem;"></a>
                                        <h5 class="mb-0"><?= $recru->nom_e?></h5>
                                        <span><?= $recru->sigle_e?></span>
                                        <div class="text-muted"><?= $recru->telephone_e?></div>
                                        <p class="mb-4 mt-3"><?= $recru->email_e?></p>
                                        <a href="annonces.php?id=<?= $recru->id_entreprise?>">  <button class="btn btn-primary btn-sm">Les offres</button></a> 
                                       <a href="../actions.php?deleteRecruteur=<?= $recru->id_entreprise?>"><button class="btn btn-danger btn-sm">Supprimer</button></a> 
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                           
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

<!-- Start Plugin Js -->
<script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="../assets/plugins/dropify/js/dropify.min.js"></script>
<script src="../assets/bundles/summernote.bundle.js"></script>

<!-- Start project main js  and page js -->
<script src="../assets/js/core.js"></script>
<script src="assets/js/form/dropify.js"></script>
<script src="assets/js/page/summernote.js"></script>
</body>
</html>
