<!-- Apply for a job popup
================================================== -->
<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
			<li><a href="#tab">Rappel</a></li>
		</ul>

		<div class="popup-tabs-container">

			<!-- Tab -->
			<div class="popup-tab-content" id="tab">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Rappel  😎</h3>
				</div>
					
				<!-- Form -->
				<form method="post" id="add-note" action="agendaAction.php">

					<select class="selectpicker with-border default margin-bottom-20" data-size="7" title="Priorité" name="priorite" required>
						<option value="low">Faible</option>
						<option value="medium">Moyen</option>
						<option value="high">Elevé</option>
					</select>

					<input type="hidden" name="pseudo" value="<?=$_SESSION['pseudo'] ?>" >

					<textarea name="note" cols="10" placeholder="Note" class="with-border" required></textarea>

				</form>
				
				<!-- Button -->
				<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="add-note">Ajouter <i class="icon-material-outline-arrow-right-alt"></i></button>

			</div>

		</div>
	</div>
</div>
<!-- Apply for a job popup / End -->