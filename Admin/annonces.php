<?php

require('../BaseDeDonnees.php');
session_start();
require('../functions.php');

if(isset($_GET)&&!empty($_GET['id'])){
     $id=$_GET['id'];
    $annonces=getAnnonce($id);
}

include('header.php');

?>



        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Annonces</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Annonces</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Courses-all"></a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="Courses-all">
                        <div class="row row-deck">
                           

                        <?php if(isset($annonces) && !empty($annonces)){foreach($annonces as $annonce){?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="card ribbon">
                                    <div class="ribbon-box orange"><i class="fa fa-star"></i></div>
                                    <a href="#"><img class="card-img-top" src="../<?=$annonce->photo_e?>" alt="" height=200px;></a>
                                    <div class="card-body d-flex flex-column">
                                        <h5><a href="#"><?=$annonce->titre?></a></h5>
                                        <div class="text-muted"><?=$annonce->description?></div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-vcenter mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="w20"><i class="fa fa-calendar text-blue"></i></td>
                                                    <td class="tx-medium">Date limite</td>
                                                    <td class="text-right"><?=$annonce->date_fin?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-money text-danger"></i></td>
                                                    <td class="tx-medium">Salaire</td>
                                                    <td class="text-right"><?=$annonce->salaire?> MAD</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-users text-warning"></i></td>
                                                    <td class="tx-medium">Types </td>
                                                    <td class="text-right"><?=$annonce->type?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex align-items-center mt-auto" style="margin-left:128px;">
                            
                                        <a href="../actions.php?deleteAnnonce=<?=$annonce->id_annonce?>"><button class="btn btn-danger btn-sm">Supprimer</button></a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }}?>
                            <!-- fin -->
                
                        </div>
                    </div>
              
                </div>
            </div>
        </div>
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

<!-- Start Plugin Js -->
<script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
<script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<!-- Start project main js  and page js -->
<script src="../assets/js/core.js"></script>
<script src="assets/js/page/dialogs.js"></script>
</body>
</html>
