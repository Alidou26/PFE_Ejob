<?php

require('../BaseDeDonnees.php');
session_start();
require('../functions.php');
$annonce=annonce();

include("header.php");
?>

        <!-- Start Page title and tab -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Offres</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ejob</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Offres</li>
                        </ol>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane fade show active" id="list" role="tabpanel">
                        <div class="row row-deck">
                         
                      
                        <?php foreach($annonce as $an){?>
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="card-status bg-pink"></div>
                                        <div class="mb-3"> <img src="../<?=$an->photo_e?>" class="rounded-circle w100" alt=""> </div>
                                        <div class="mb-2">
                                            <h5 class="mb-0"><?=$an->titre?></h5>
                                            <p><?=$an->email_e?></p>
                                            <span><?=$an->nom_e?></span> <br><br>DESCRIPTION: <br><br>
                                            <span> <?=$an->description?></span>
                                        </div>
                                    
                                        <ul class="list-unstyled team-info margin-0 pt-2">
                                        <a href="../actions.php?deleteAnnonce=<?=$an->id_annonce?>"><button class="btn btn-danger btn-sm">Supprimer</button></a> 
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                            
                        </div>
                    </div>
                  
                </div> 
            </div>
        </div>
        <!-- Start main footer -->
       <?php include("footer.php");?>
    </div>    
</div>

<!-- Start Main project js, jQuery, Bootstrap -->
<script src="../assets/bundles/lib.vendor.bundle.js"></script>

<!-- Start Plugin Js -->
<script src="../assets/bundles/sweetalert.bundle.js"></script>
<script src="../assets/plugins/dropify/js/dropify.min.js"></script>

<!-- Start project main js  and page js -->
<script src="../assets/js/core.js"></script>
<script src="assets/js/page/dialogs.js"></script>
<script>
$(function() {
    "use strict";
    
    $('.dropify').dropify();

    var drEvent = $('#dropify-event').dropify();
    drEvent.on('dropify.beforeClear', function(event, element) {
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element) {
        alert('File deleted');
    });

    $('.dropify-fr').dropify({
        messages: {
            default: 'Glissez-déposez un fichier ici ou cliquez',
            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
            remove: 'Supprimer',
            error: 'Désolé, le fichier trop volumineux'
        }
    });
});
</script>
</body>
</html>
