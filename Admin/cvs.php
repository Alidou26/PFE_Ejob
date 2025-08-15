<?php

require('../BaseDeDonnees.php');
session_start();
require('../functions.php');
$utilisateur=utilisateur();
include("header.php");
?>

        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">CVs</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ejob</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cvs</li>
                        </ol>
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">LES CVs</h3>
                                <div class="card-options ">
                                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="file_folder">
                                  
                                <?php foreach($utilisateur as $can){
                                    $chaine=substr($can->cv,0,20); 
                                    if(!empty($chaine)){
                                    ?>
                                    
                                        <div style="display:inline-block; vertical-align:middle;vertical-align:auto;border:1px solid #E8E9E9;width:20%">
                                        <div class="icon">
                                            
                                            <a href="../<?=$can->cv ?>" style="border:none; display:inline;" title="Consulter"><i class="fa fa-file-pdf-o text-primary"></i></a>
                                            
                                            <br>
                                           <a href="../actions.php?deleteCv=<?=$can->id_utilisateur?>" style="border:none; display:inline;"> <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Supprimer" style="margin-left:80px;"><i class="fa fa-trash-o text-danger"></i></button></a>
                                        
                                        </div>
                                        <div class="file-name">
                                        
                                            <p class="mb-0 text-muted"> <?= $chaine?>.pdf</p>
                                            
                                            <small style="color:#0000CD;"><?=$can->nom?> <?=$can->prenom?></small>
                                           
                                        </div>

                                        </div>
                                        
                                        <?php }}?>
                               
                                </div>
                            </div>
                        </div>
                      




                    </div>
                </div>
            </div>
        </div>
        <!-- Start main footer -->
        <div class="section-body">
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            Copyright © 2023 <a href="https://themeforest.net/user/puffintheme/portfolio"> par Soukroumde Ki Saltani  </a>.
                        </div>
                        
                    </div>
                </div>
            </footer>
        </div>
    </div>    
</div>

<!-- Start Main project js, jQuery, Bootstrap -->
<script src="../assets/bundles/lib.vendor.bundle.js"></script>

<!-- Start project main js  and page js -->
<script src="../assets/js/core.js"></script>
</body>
</html>
