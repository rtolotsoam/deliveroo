<div id="content">
	<h1 class="content-heading bg-white border-bottom">
		<a href="#ajouter-user" data-toggle="modal" class="btn btn-success">AJOUTER NOUVEAU UTILISATEUR</a>
	</h1> 
	
<div class="innerAll spacing-x2">


		<div class="widget widget-inverse   corp-info">
			<div class="widget-body padding-bottom-none">

				<!-- Table -->
				<table class="dynamicTable colVis table table-bordered table-condensed table-striped table-vertical-center">
					
					<!-- Table heading -->
					<thead class="bg-gray">
						<tr>
							<th>Matricule</th>
							<th>Level</th>
							<th><?php echo ascii_to_entities('Prénom'); ?></th>
							<th>E-mail</th>
							<th class="center">Statut</th>
							<th class="center"><span data-toggle="tooltip" data-original-title="DELIVERY SUPPORT" data-placement="left">Accès 1</span></th>
							<th class="center"><span data-toggle="tooltip" data-original-title="RESTAURANT SUPPORT" data-placement="left">Accès 2</span></th>
							<th class="center"><span data-toggle="tooltip" data-original-title="CUSTOMER SUPPORT" data-placement="right">Accès 3</span></th>
							<th class="center"><span data-toggle="tooltip" data-original-title="ORDER MONITORING" data-placement="right">Accès 4</span></th>
							<th class="center"><span data-toggle="tooltip" data-original-title="GESTION DES UTILISATEUR" data-placement="right">Utilisateur</span></th>
							<th class="center"><span data-toggle="tooltip" data-original-title="GESTION DES PROCESSUS" data-placement="right">Processus</span></th>
							<th class="center" style="width: 150px;">Modifier</th>
							<th class="center" style="width: 150px;">Supprimer</th>
						</tr>
					</thead>
					<!-- // Table heading END -->

					<!-- Table body -->
					<tbody>
						<?php 
						 if($users){	
							foreach ($users as $val_user) {
								
							
						?>

								<!-- Table row -->
								<tr>
									<td><?php echo ascii_to_entities($val_user->matricule); ?></td>
									<td><?php echo ascii_to_entities($val_user->level); ?></td>
									<td><?php echo ascii_to_entities($val_user->prenom); ?></td>
									<td><?php echo ascii_to_entities($val_user->mail); ?></td>
									<td class="center">
										<?php 
										if(!empty($val_user->statut) && $val_user->statut == 1){
										?>

											<span class="label label-success"> ACTIVER </span> 

										<?php
										}else{
										?> 
											<span class="label label-danger"> DESACTIVER </span> 
										<?php 
										} 
										?>
									</td>
									<td class="center">
										<?php 
										if(!empty($val_user->access_1) && $val_user->access_1 == 1){
										?>

											<span class="label label-success" data-toggle="tooltip" data-original-title="DELIVERY SUPPORT" data-placement="left"> OUI </span> 

										<?php
										}else{
										?> 
											<span class="label label-danger" data-toggle="tooltip" data-original-title="DELIVERY SUPPORT" data-placement="left"> NON </span> 
										<?php 
										} 
										?>
									</td>
									<td class="center">
										<?php 
										if(!empty($val_user->access_2) && $val_user->access_2 == 1){
										?>

											<span class="label label-success" data-toggle="tooltip" data-original-title="RESTAURANT SUPPORT" data-placement="left"> OUI </span> 

										<?php
										}else{
										?> 
											<span class="label label-danger" data-toggle="tooltip" data-original-title="RESTAURANT SUPPORT" data-placement="left"> NON </span> 
										<?php 
										} 
										?>
									</td>
									<td class="center">
										<?php 
										if(!empty($val_user->access_3) && $val_user->access_3 ==1){
										?>

											<span class="label label-success" data-toggle="tooltip" data-original-title="CUSTOMER SUPPORT" data-placement="right"> OUI </span> 

										<?php
										}else{
										?> 
											<span class="label label-danger" data-toggle="tooltip" data-original-title="CUSTOMER SUPPORT" data-placement="right"> NON </span> 
										<?php 
										} 
										?>
									</td>
									<td class="center">
										<?php 
										if(!empty($val_user->access_4) && $val_user->access_4 ==1){
										?>

											<span class="label label-success" data-toggle="tooltip" data-original-title="ORDER MONITORING" data-placement="right"> OUI </span> 

										<?php
										}else{
										?> 
											<span class="label label-danger" data-toggle="tooltip" data-original-title="ORDER MONITORING" data-placement="right"> NON </span> 
										<?php 
										} 
										?>
									</td>
									<td class="center">
										<?php 
										if(!empty($val_user->gestion_user) && $val_user->gestion_user ==1){
										?>

											<span class="label label-success" data-toggle="tooltip" data-original-title="GESTION DES UTILISATEUR" data-placement="right"> OUI </span> 

										<?php
										}else{
										?> 
											<span class="label label-danger" data-toggle="tooltip" data-original-title="GESTION DES UTILISATEUR" data-placement="right"> NON </span> 
										<?php 
										} 
										?>
									</td>
									<td class="center">
										<?php 
										if(!empty($val_user->gestion_process) && $val_user->gestion_process ==1){
										?>

											<span class="label label-success" data-toggle="tooltip" data-original-title="GESTION DES PROCESSUS" data-placement="right"> OUI </span> 

										<?php
										}else{
										?> 
											<span class="label label-danger" data-toggle="tooltip" data-original-title="GESTION DES PROCESSUS" data-placement="right"> NON </span> 
										<?php 
										} 
										?>
									</td>
									<td class="center">
										<div class="btn-group btn-group-sm">
											<a href="#modifier-user-<?php echo $val_user->fte_user_id; ?>" data-toggle="modal" class="btn btn-inverse"><i class="fa fa-pencil"></i></a>
										</div>
									</td>
									<td class="center">
										<div class="btn-group btn-group-sm">
											<a href="#supprimer-user-<?php echo $val_user->fte_user_id; ?>" data-toggle="modal" class="btn btn-danger"><i class="fa fa-times"></i></a>
										</div>
									</td>
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
	



	
		
		
		