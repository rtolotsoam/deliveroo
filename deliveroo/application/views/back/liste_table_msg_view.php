<style type="text/css">
.dataTables_scrollHead{
	height : 38px !important;
}
td {word-break: break-all}
</style>
<br/>
<table class="table table-striped " id="list_msg" width="100">
	<thead class="bg-gray">
		<tr >
			
			<th width="10%">Début</th>
			<th width="10%">Fin</th>
			<th width="10%">Catégorie</th>
			<th width="10%">Matricule</th>
			<th width="15%">Objet</th>
			<th width="35%">Message</th>
			<th width="5%">Etat</th>
			<th width="5%"><span style ='float:right !important;'>Action</span></th>
		</tr>
	</thead>
	<tbody role="alert" aria-live="polite" aria-relevant="all">
		<?php 
				$content_msg 		="";
				foreach ($categories as  $value) {
           			$cat[$value->fte_categories_id] =$value->libelle_categories;
        		}
        		
				foreach ($list_msg as $value) {
					$debut 			= $value->datedeb_msg;
					$fin 			= $value->datefin_msg;
					$categorie 		= $value->id_categorie;
					$matricule 		= $value->matricule;
					
					$msg 			= $value->description;
					$etat 			= $value->flag;
					$id_msg 		= $value->msg_id;
					$type 			= $value->message_type;
					$objet 			= $value->objet;
					
					if( $value->id_categorie != 0){
						$cat_affic  = $cat[$value->id_categorie];
					}
					else{
						$cat_affic  = 'Toutes';
					}
					$type_msg 		=  'Message';
					if ($type == 1) {
						$type_msg 	=  'Message';
					}
					if($matricule == 'all'){
						$matricule = 'Toutes';
					}
					$state 			= 'Actif';
					if ($etat != 1) {
						$state 		= 'Inactif';
					}
					
					$content_msg   .="<tr>";
					
					$content_msg   .="<td>".date_fr($debut)."</td>";
					$content_msg   .="<td>".date_fr($fin)."</td>";
					$content_msg   .="<td>".$cat_affic."</td>";
					$content_msg   .="<td><span>".$matricule."</td>";
					$content_msg   .="<td>".$objet."</td>";
					$content_msg   .="<td><span style='float:left !important;'>".$msg."</span></td>";
					$content_msg   .="<td>".$state."</td>";
					$content_msg   .="
					<td width='5%'>
						<span style ='float:right !important;' tooltip='Modier cette ligne.'><li class='style_li'><a href='#edit_msg_".$id_msg."' data-toggle='modal' class='btn btn-info'><i class='fa fa-pencil'></i></a></li></span>
					</td>";
					$content_msg   .="</tr>";
				}
				echo $content_msg; 
			?>
	</tbody>
</table>