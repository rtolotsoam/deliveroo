<!-- MODAL -->
	<div class="modal fade" id="ajout-traitement">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- MODAL HEADER -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="modal-title">Ajouter traitement</h3>
				</div>
				<!-- END MODAL HEADER -->

				<!-- MODAL BODY -->
				<div class="modal-body">
					<div class="innerAll">
						<p id="message_error"></p>
						<form class="margin-none innerLR inner-2x">
							<div class="form-group">
						    	<label for="libelle_traits">Libelle du traitement</label>
						    	<input type="text" class="form-control" id="libelle_traits" placeholder="Entrer Libelle traitement" />
						  	</div>
						  	
						  	<div class="form-group <?php if(!isset($sous_categories)){ echo "hidden"; } ?>">
						    	<label for="sous_cat">Choisir le Sous catégories du traitement</label>
						    	<select class="form-control" id="sous_cat">
						    		<?php 
						  
						    		foreach ($sous_categories as $val_scat) { 
						    		
						    		?>
										<option value="<?php echo $val_scat->fte_categories_id; ?>"><?php echo $val_scat->libelle_categories; ?></option>
									
									<?php 
									}
									?>
								</select>
						  	</div>
						  	<div class="form-group">
						    	<label for="libelle_sous_cat">Libelle Sous catégories</label>
						    	<input type="text" class="form-control" id="libelle_sous_cat" placeholder="Entrer Nouveau Libelle Sous catégories <?php  if(isset($sous_categories)) { echo "Sinon laisser vide"; } ?>" />
						  	</div>
						  	<div class="form-group">
						    	<label for="cont_sous_cat">Contenu Sous catégories</label>
						    	<input type="text" class="form-control" id="cont_sous_cat" placeholder="Entrer Nouveau Contenu Sous catégories <?php  if(isset($sous_categories)) { echo "Sinon laisser vide"; } ?>" />
						  	</div>
						</form>
					</div>
				</div>
				<!--  END MODAL BODY -->

				<!-- MODAL FOOTER -->
				<div class="modal-footer">
					<button class="btn btn-block btn-info" id="bouton_ajout_traits" onclick="ajout_traitement()">Ajouter</button>
				</div>
				<!--  END MODAL FOOTER -->
			
			</div>
		</div> 
	</div>
	<!-- END MODAL -->
