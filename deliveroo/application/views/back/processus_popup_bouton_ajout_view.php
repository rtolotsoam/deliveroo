	<!-- MODAL -->
	<div class="modal fade" id="ajout-bouton">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- MODAL HEADER -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="modal-title">Ajouter bouton</h3>
				</div>
				<!-- END MODAL HEADER -->

				<!-- MODAL BODY -->
				<div class="modal-body">
					<div class="innerAll">
						<p id="message_error"></p>
						<form class="margin-none innerLR inner-2x">
							<div class="form-group">
						    	<label for="libelle_traits">Libelle du bouton</label>
						    	<input type="text" class="form-control" id="libelle_traits" placeholder="Entrer Libelle bouton" />
						  	</div>
						  	<div class="form-group">
						    	<label for="source-traits">Processus suivant</label>
						    		<?php
										$sel_attr = ' id="proccs" class="form-control" ';
										echo form_dropdown('proccs', $list_pcs,'',$sel_attr);
						    		?>
								
						  	</div>
						</form>
					</div>
				</div>
				<!--  END MODAL BODY -->

				<!-- MODAL FOOTER -->
				<div class="modal-footer">
					<button class="btn btn-block btn-info" id="bouton_ajout_traits" onclick="insert_nouveau_bouton();">Ajouter</button>
				</div>
				<!--  END MODAL FOOTER -->
			
			</div>
		</div> 
	</div>
	<!-- END MODAL -->