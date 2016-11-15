
<div id="content"><h1 class="content-heading bg-white border-bottom hidden">Historique</h1> 
<div class="innerAll spacing-x2">

		<div class="widget widget-inverse" >
			<div class="widget-body padding-bottom-none">

				<!-- Table -->
				<table class="dynamicTable colVis table">
					
					<!-- Table heading -->
					<thead class="bg-gray">
						<tr>
							<?php if($level =="admin" ){ ?>
							<th>Matricule</th>
							<th>traitement&nbsp;</th>
							<th>Etapes</th>
							<th>Début</th>
							<th>Fin</th>
							<?php }else{ ?>
							<th>traitement&nbsp;</th>
							<th>Processus</th>
							<th>Début</th>
							<th>Fin</th>
							<?php } ?>
						</tr>
					</thead>
					<!-- // Table heading END -->

					<!-- Table body -->
					<tbody>
						<?php 
						 if($data_table){	
							foreach ($data_table as $val_table) {
								
							
						?>

								<!-- Table row -->
								<tr>
									<?php if($level =="admin" ){ ?>
									<td><?php echo $val_table->matricule; ?></td>
									<td><?php $libelle = 'lib_'.$val_table->session_id;  echo ascii_to_entities($$libelle); ?></td>
									<td><?php echo ascii_to_entities($val_table->etapes); ?></td>
									<td><?php echo ascii_to_entities($val_table->debut); ?></td>
									<td><?php echo ascii_to_entities($val_table->fin); ?></td>
									<?php }else{ ?>
									<td><?php $libelle = 'lib_'.$val_table->session_id;  echo ascii_to_entities($$libelle); ?></td>
									<td><?php echo ascii_to_entities($val_table->etapes); ?></td>
									<td><?php echo ascii_to_entities($val_table->debut); ?></td>
									<td><?php echo ascii_to_entities($val_table->fin); ?></td>
									<?php } ?>
								</tr>
								<!-- // Table row END -->
						
						<?php 
							}
						}
						?>

					</tbody>
					<!-- // Table body END -->
						
				</table>
				<!-- // Table END -->

			</div>	
		</div>		
	



	
		
		
		