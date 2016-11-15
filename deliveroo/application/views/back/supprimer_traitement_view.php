	<!-- MODAL -->
	<div class="modal fade" id="supprimer-traitement-<?php echo $id_cat_trait; ?>">
		<div class="modal-dialog">
			<div class="modal-content">


				<!-- MODAL HEADER -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="modal-title">Supprimer <?php echo ascii_to_entities("Catégories"); ?></h3>
				</div>
				<!-- END MODAL HEADER -->
				
				<!-- MODAL BODY -->
				<div class="modal-body">
					<div class="innerAll">
						<p class="astuce"><img src="<?php echo img_url('attention.png'); ?>" alt="logo_attention" />&nbsp;Voulez-vous vraiment Supprimer le <?php echo ascii_to_entities("catégories "); ?><span style="color:red;"><?php echo ascii_to_entities($libelle_cat_trait); ?></span> contenu <span style="color:red;"><?php echo ascii_to_entities($cont_cat_trait); ?></span> ?</p>
					</div>
				</div>
				<!--  END MODAL BODY -->

				<!-- MODAL FOOTER -->
				<div class="modal-footer">
					<button class="btn btn-block btn-info" onclick="suppr_trait_cat(<?php echo $id_cat_trait; ?>);">Supprimer</button>
				</div>
				<!--  END MODAL FOOTER -->
			
			</div>
		</div> 
	</div>
	<!-- END MODAL -->