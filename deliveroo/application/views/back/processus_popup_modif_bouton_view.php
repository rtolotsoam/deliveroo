	<!-- MODAL -->
	<div class="modal fade" id="modif-bouton-<?php echo $id_act; ?>">
		<div class="modal-dialog">
			<div class="modal-content">


				<!-- MODAL HEADER -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="modal-title">Modifier bouton</h3>
				</div>
				<!-- END MODAL HEADER -->
				
				<!-- MODAL BODY -->
				<div class="modal-body">
					<div class="innerAll">
						<p id="message_error"></p>
						<form class="margin-none innerLR inner-2x">
							<div class="form-group">
						    	<label for="libelle_modif_<?php echo $id_act; ?>">Libelle du bouton</label>
						    	<input type="text" class="form-control" id="libelle_modif_<?php echo $id_act; ?>" value="<?php echo $libelle_act; ?>" placeholder="Entrer Libelle bouton" />
						  	</div>
						  	<div class="form-group">
						    	<label for="redirect_proc_<?php echo $id_act; ?>">Processus suivant</label>

						    	<select id="redirect_proc_<?php echo $id_act; ?>" class="form-control">

						    		<?php
										foreach ($list_pcs as $cle => $valeur) {
									?>
										<option value="<?php echo $cle; ?>" <?php if($cle==$id_process_act) echo "selected"; ?>><?php echo $valeur; ?></option>
									<?php
										}
									?>
						    	</select>
						    	
						  	</div>
						</form>
					</div>
				</div>
				<!--  END MODAL BODY -->

				<!-- MODAL FOOTER -->
				<div class="modal-footer">
					<button class="btn btn-block btn-info" onclick="modif_bouton(<?php echo $id_act; ?>);">Modifier</button>
				</div>
				<!--  END MODAL FOOTER -->
			
			</div>
		</div> 
	</div>
	<!-- END MODAL -->