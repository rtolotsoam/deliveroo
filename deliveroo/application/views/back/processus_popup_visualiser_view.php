	<?php 
		foreach ($lst_pcs as $val_html) {
			$html = ascii_to_entities($val_html->text_html);			
			$id = $val_html->fte_process_id;				
		}
	?>

	<!-- MODAL -->
	<div class="modal fade" id="visu<?php echo $id; ?>">
		<div class="modal-dialog" style="width:850px;">
			<div class="modal-content">

				<!-- MODAL HEADER -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="modal-title">Visualisation</h3>
				</div>
				<!-- END MODAL HEADER -->

				<!-- MODAL BODY -->
				<div class="modal-body">
					<div class="innerAll">
						<div class="slim-scroll2">
							<?php
								echo $html;
							?>
						</div>
					</div>
				</div>
				<!--  END MODAL BODY -->
			
			</div>
		</div> 
	</div>
	<!-- END MODAL -->