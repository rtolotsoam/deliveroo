	<!-- MODAL -->
	<div class="modal fade" id="suppr-bouton-<?php echo $id_act; ?>">
		<div class="modal-dialog">
			<div class="modal-content">


				<!-- MODAL HEADER -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="modal-title">Supprimer bouton</h3>
				</div>
				<!-- END MODAL HEADER -->
				
				<!-- MODAL BODY -->
				<div class="modal-body">
					<div class="innerAll">
						<p class="astuce"><img src="<?php echo img_url('attention.png'); ?>" alt="logo_attention" />&nbsp;Voulez-vous vraiment Supprimer le bouton <span style="color:red;"><?php echo $libelle_act; ?></span> ?</p>
					</div>
				</div>
				<!--  END MODAL BODY -->

				<!-- MODAL FOOTER -->
				<div class="modal-footer">
					<button class="btn btn-block btn-info" onclick="suppr_bouton(<?php echo $id_act; ?>);">Supprimer</button>
				</div>
				<!--  END MODAL FOOTER -->
			
			</div>
		</div> 
	</div>
	<!-- END MODAL -->