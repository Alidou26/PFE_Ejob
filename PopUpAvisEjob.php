<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
			<li><a href="#tab">Ajouter un Avis</a></li>
		</ul>

		<div class="popup-tabs-container">

			<!-- Tab -->
			<div class="popup-tab-content" id="tab">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Votre Note de Satisfaction ?</h3>
					
				<!-- Form -->
				<form method="post" id="leave-company-review-form" action="ajoutAvisEjob.php">

					<!-- Leave Rating -->
					<div class="clearfix"></div>
					<div class="leave-rating-container">
						<div class="leave-rating margin-bottom-5">
							<input type="radio" name="rating" id="rating-1" value="5" required>
							<label for="rating-1" class="icon-material-outline-star"></label>
							<input type="radio" name="rating" id="rating-2" value="4" required>
							<label for="rating-2" class="icon-material-outline-star"></label>
							<input type="radio" name="rating" id="rating-3" value="3" required>
							<label for="rating-3" class="icon-material-outline-star"></label>
							<input type="radio" name="rating" id="rating-4" value="2" required>
							<label for="rating-4" class="icon-material-outline-star"></label>
							<input type="radio" name="rating" id="rating-5" value="1" required>
							<label for="rating-5" class="icon-material-outline-star"></label>
						</div>
					</div>
					<div class="clearfix"></div>
					<!-- Leave Rating / End-->

				</div>


					<div class="row">
                        <input type="hidden" name="pseudo" value="<?=$_SESSION['pseudo'] ?>">

                        <?php if(isset($_SESSION['utilisateur_connecte'])){ ?>
                            <input type="hidden" name="nom" value="<?=$_SESSION['nom'] ?>">
                            <input type="hidden" name="prenom" value="<?=$_SESSION['prenom'] ?>">
                            <input type="hidden" name="type" value="Utilisateur">

                            <?php }else{ ?>
                            <input type="hidden" name="nom" value="<?=$_SESSION['nom_e'] ?>">
                            <input type="hidden" name="prenom" value="<?=$_SESSION['sigle_e'] ?>">
                            <input type="hidden" name="type" value="Recruteur">
                                <?php } ?>


					<textarea class="with-border" placeholder="Votre Avis" name="message" id="message" cols="7"  required></textarea>

				</form>
				
				<!-- Button -->
				<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit" form="leave-company-review-form">Ajouter<i class="icon-material-outline-arrow-right-alt"></i></button>

			</div>

		</div>
	</div>
</div>