<table class="table table-striped list_alert" >
	<thead class="bg-gray testok">
		<tr >
			<th>Début</th>
			<th>Fin</th>
			<th>Matricule</th>
			<th>Catégorie</th>
			<th>Type d'alerte</th>
			<th>Type</th>
			<th>Zone</th>
			<th>Montant</th>
			<th>Description</th>
			<th>Etat</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$content_alert = "";

			foreach ($categories as  $value) {
           			$cat[$value->fte_categories_id] =$value->libelle_categories;
        		}

        	foreach ($type as $value_type) {
					$typ[$value_type->id_type] = $value_type->type;
				}
			
			foreach ($all_zone as $value_zones){
				$zon[$value_zones->id_zone] = $value_zones->region;
			}

			foreach ($all_alert as $value_alert) {
				$debut = $value_alert->datedeb;
				$fin = $value_alert->datefin;
				$matricule = $value_alert->matricule;

				if ( $value_alert->matricule == 'all') {
					$matricule = 'Toutes';
				}

				/*$categorie_alerte = $value_alert->categorie;*/
				if( $value_alert->categorie!= 0){
						$categorie_alerte  = $cat[$value_alert->categorie];
					}
				else{
						$categorie_alerte  = 'Toutes';
					}


				/*$type_alerte = $value_alert->type_alerte;*/
				if ($value_alert->type_alerte = 1) {
					$type_alerte ='Offre promo';
				}elseif ($value_alert->type_alerte = 2) {
					$type_alerte = 'Intermpérie';
				}else{
					$type_alerte ='Aucun';
				}


				/*$type = $value_alert->type;*/
				if( $value_alert->type != 0){
						$type  = $typ[$value_alert->type];
					}
				else{
						$type  = 'Toutes';
					}


				$zone_alerte = $value_alert->zone;
				if( $value_alert->zone != 0){
						$zone_alerte  = $zon[$value_alert->zone];
					}
				else{
						$zone_alerte  = 'Aucun';
					}

				$montant_alerte = $value_alert->montant;
				$description_alerte = $value_alert->description;
				$etat_alerte = $value_alert->flag;
				
				$content_alert .= "<tr>";
				$content_alert .= "<td>".date_fr($debut)."</td>";
				$content_alert .= "<td>".date_fr($fin)."</td>";
				$content_alert .= "<td>".$matricule."</td>";
				$content_alert .= "<td>".$categorie_alerte."</td>";
				$content_alert .= "<td>".$type_alerte."</td>";
				$content_alert .= "<td>".$type."</td>";
				$content_alert .= "<td>".$zone_alerte."</td>";
				$content_alert .= "<td>".$montant_alerte."</td>";
				$content_alert .= "<td>".$description_alerte."</td>";
				$content_alert .= "<td>".$etat_alerte."</td>";
				$content_alert .= "<td>xx</td>";
				$content_alert .= "</tr>";
			}
			echo $content_alert;
		?>
	</tbody>
</table>
