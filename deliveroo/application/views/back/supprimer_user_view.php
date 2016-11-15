	<!-- MODAL -->
	<div class="modal fade" id="supprimer-user-<?php echo $id_user; ?>">
		<div class="modal-dialog">
			<div class="modal-content">


				<!-- MODAL HEADER -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="modal-title">Supprimer l'utilisateur</h3>
				</div>
				<!-- END MODAL HEADER -->
				
				<!-- MODAL BODY -->
				<div class="modal-body">
					<div class="innerAll">
						<p class="astuce"><img src="<?php echo img_url('attention.png'); ?>" alt="logo_attention" />&nbsp;Voulez-vous vraiment Supprimer l'utilisateur <span style="color:red;"><?php echo ascii_to_entities($pren); ?></span> matricule <span style="color:red;"><?php echo ascii_to_entities($mle); ?></span> ?</p>
					</div>
				</div>
				<!--  END MODAL BODY -->

				<!-- MODAL FOOTER -->
				<div class="modal-footer">
					<button class="btn btn-block btn-info" onclick="supprimer_user(<?php echo $id_user; ?>);">Supprimer</button>
				</div>
				<!--  END MODAL FOOTER -->
			
			</div>
		</div> 
	</div>
	<!-- END MODAL -->