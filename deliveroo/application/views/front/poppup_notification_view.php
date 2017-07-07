	<!-- MODAL -->
	<div class="modal fade" id="affiche-not-<?php echo $id_not; ?>">
		<div class="modal-dialog">
			<div class="modal-content">


				<!-- MODAL HEADER -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="modal-title">Notification</h3>
				</div>
				<!-- END MODAL HEADER -->
				
				<!-- MODAL BODY -->
				<div class="modal-body">
					<div class="innerAll">
						<p>
						<b>Obejt : </b><br/>
						<?php
							echo ascii_to_entities($notifications[0]->objet);
						?>
						</p>
						<p>
						<b>Date modification : </b><br/>
						<?php
							echo ascii_to_entities(str_replace(" ", " à ", date("d/m/Y H:i:s", strtotime($notifications[0]->datetime_modif))));
						?>
						</p>
						<p>
						<b>Chemin complet : </b><br/>	
						<?php
							echo str_replace(array("§§§", "&#487;&#167;"), "&nbsp;<i class='fa fa-hand-o-right'></i>&nbsp;",ascii_to_entities(str_replace(array("§§§", "&#487;&#167;"), "&nbsp;<i class='fa fa-hand-o-right'></i>&nbsp;",$notifications[0]->description)));
						?>
						</p>	
						<p class="astuce">
						<b>Détails des modification effectuer :</b><br />	
						<?php
							echo ascii_to_entities($notifications[0]->commentaires);
						?>
						</p>
					</div>
				</div>
				<!--  END MODAL BODY -->

				<!-- MODAL FOOTER -->
				<div class="modal-footer">
				</div>
				<!--  END MODAL FOOTER -->
			
			</div>
		</div> 
	</div>
	<!-- END MODAL -->