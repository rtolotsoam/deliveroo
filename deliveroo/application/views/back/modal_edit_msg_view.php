<?php  
foreach ($list_msg as  $value_edit) {
		$msg_id = "";
		$matricule = "";
		$datedeb = "";
		$datefin = "";
		$msg_typ ="";
		$content_msg = "";
		$id_edit ="";

		$msg_id = $value_edit->msg_id;
		$matricule = $value_edit->matricule;
		$datedeb = $value_edit->datedeb_msg;
		$datefin = $value_edit->datefin_msg;
		$id_categori = $value_edit->id_categorie;
		$msg_typ = $value_edit->message_type;
		$content_msg =$value_edit->description;
		$falgg = $value_edit->flag;
		$msg_content = $value_edit->description;
		$id_edit = 'msg_'.$msg_id;




?>
		<!-- MODAL -->
		<div class="modal fade" id="edit_msg_<?php echo $msg_id; ?>">
			<div class="modal-dialog">
				<div class="modal-content">

					<!-- MODAL HEADER -->
					<div class="modal-header">
						<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h2 class="modal-title"><span class="label label-info">Modification d'un message ou d'une alerte</span></h2>
							<div style="display:none;" class="alert alert-success" id="id_warning_<?php echo $msg_id; ?>" align="center">Modification effectuée!</div>
							<div class="alert alert alert-danger" style="display:none;" id="warning_<?php echo $msg_id; ?>">
								<strong>Il y a eu une erreur sur la date.</strong>
							</div>
					    </div>
					</div>
					<!-- END MODAL HEADER -->

					<!-- MODAL BODY -->
					<div class="modal-body">
						<div class="row">
					    <div class="col-xs-12 col-md-12  col-lg-6">
					        <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
					            <div class="form-group">
							    	<label for="matricule_edit">Matricule : </label>
							    	<select id="matricule_edit_<?php echo $msg_id; ?>" class="form-control select2" multiple="multiple">
									  <?php 
									  	$content  		 ="";
									  	 if($matricule =='all')
									  	 {
									  		$content 		.="<option selected value ='all' >--Toutes--</option>"; 	
									  	 }
									  	 else
									  	 {
									  	 	$content 		.="<option  value ='all' >--Toutes--</option>"; 
									  	 	$array_matricule = array();
									  	 	$array_matricule = explode(',', $matricule);
									  	 }
									  	
									  	foreach ($users_modal as  $value) {
									  		$selected	 = "";
									  		$matricule 	 = $value->matricule;
									  		if(in_array($matricule, $array_matricule))
									  		{
									  			$selected	 = "selected";
									  		}
									  		$prenom      = $value->prenom;
											$content    .="<option ".$selected." value ='".$matricule."' >".$matricule." - ".$prenom."</option>";
									  	}
									  	echo $content;
									  ?>
									</select>
								</div>
					        </div>
					    </div>
					    <div class="col-xs-12 col-md-12  col-lg-6">
						    <div class="form-group">
						        <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
						            <div class="row">	
						            	<div class = "col-md-6">
						            		 <label for="msg_deb_edit">Date début : </label>
											 <input type="text" class="form-control datedeb_edit" id="msg_deb_edit_<?php echo $msg_id; ?>" data-format="dd/MM/yyyy" value='<?php echo date("d/m/Y");?>' />
						            	</div>
						            	<div class = "col-md-6">
						            		 <label for="msg_fin_edit">Date fin : </label>
											 <input type="text" class="form-control datefin_edit" id="msg_fin_edit_<?php echo $msg_id; ?>" value='<?php echo date("d/m/Y");?>' />
						            	</div>
						            </div>	
								</div>
						        <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
						            <label for="categ_edit">Catégorie : </label>
									<select id="categ_edit_<?php echo $msg_id; ?>" class="form-control">
									  <?php 
									  	$content_cat  		 ="";
									  	
									  	if ($id_categori == 0) {$content_cat 	.="<option selected value ='0' >--Toutes--</option>";}
									  	else{$content_cat 	.="<option value ='0' >--Toutes--</option>";}

									  	foreach ($categories as  $categorie) {
									  		$li_cate 	 	= $categorie->libelle_categories;
									  		$select			= "";
									  		$id_cat        	= $categorie->fte_categories_id;
									  		if($id_categori == $id_cat){$select="selected";}
											$content_cat   .="<option ".$select." value ='".$id_cat."' >".$li_cate."</option>";
									  	}
									  	echo $content_cat;
									  ?>
									</select>
								</div>
								
						    </div>
					    </div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-md-12  col-lg-6">
						    <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
						        <div class="form-group">
							    	<label for="objet_<?php echo $msg_id; ?>">Objet : </label>
							    	<input type="text" id="objet_<?php echo $msg_id; ?>" class="form-control" value="<?php echo $value_edit->objet;?>">
								</div>
						    </div>
						</div>

						<div class="col-xs-12 col-md-12  col-lg-6">
						    <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
						        <div class="form-group">
							    	<label for="matricule_edit">Etat ( actif ou inactif ) : </label>
							    	<select id="etat_edit_<?php echo $msg_id; ?>" class="form-control">
							    		<option value ="1" <?php if($falgg == 1) echo 'selected'; ?> >Actif</option>
							    		<option value ="0" <?php if($falgg == 0) echo 'selected'; ?> >Inactif</option>
							    	</select>
								</div>
						    </div>
						</div>
					</div>

					<div class="row">
						<div class="form-group">
							<div class=" col-md-12">
						            <div class="form-group">
								    	<label for="message">Message : </label>
								    	<p>
								    		<textarea id='msg_<?php echo $msg_id;?>' class='form-control' rows='4' style='resize:none;'><?php echo $msg_content;?></textarea>
																<?php  echo display_ckeditor($$id_edit); ?>
								    	</p>
									</div>
						        </div>
					    		
						</div>
    				</div>
    				
					</div>
					<!--  END MODAL BODY -->

					<!-- MODAL FOOTER -->
					<div class="modal-footer">
						<button class="btn btn-block btn-info" onclick="update_msg(<?php echo $msg_id; ?>)">Modifier</button>
					</div>
					<!--  END MODAL FOOTER -->
				
				</div>
			</div> 
		</div>
		<!-- END MODAL -->



	<?}
?>
		
<script type="text/javascript">
  $(".datefin_edit").bdatepicker({
		format: "dd/mm/yyyy",
		autoclose: true
	});
$(".datedeb_edit").bdatepicker({
		format: "dd/mm/yyyy",
		autoclose: true
	});
function update_msg(id)
{
	
	var id_msg    = id;
	var msg 	  = CKEDITOR.instances["msg_"+id].getData();
	var matricule = $("#matricule_edit_"+id).val();
		matricule = matricule.toString();
	var datedeb   = $("#msg_deb_edit_"+id).val(); 	
	var datefin   = $("#msg_fin_edit_"+id).val();
	var categorie = $("#categ_edit_"+id).val();
	var type 	  = $("#type_edit_"+id).val();
	var etat      = $("#etat_edit_"+id).val();
	var objet 	  = $("#objet_"+id).val();

	
	if(datefin < datedeb && ( datefin  !="" && datedeb !=""))
	{
		$("#msg_deb_edit_"+id).focus();
		$("#warning_"+id).show();
			setTimeout(function(){
	  			$("#warning_"+id).hide();
			}, 1000);
		return false;
	}

	var base_url = window.location.href.split('back');
		base_url = base_url[0]+'back/fte_insert_msg/update';
	
	$.ajax({
	       url : base_url,
	       type : 'POST',
	       timeout:10000,
	       data:{
	       		matricule : matricule,
	       		datedeb   : convert_date_format(datedeb),
	       		datefin   : convert_date_format(datefin),
	       		msg 	  : msg,
	       		categ     : categorie,
	       		objet	  : objet,
	       		id_msg    : id_msg,
	       		etat 	  : etat
	       },
	       success : function(rslt, statut){
	           // if(rslt > 0){
	       		   $('#id_warning_'+id).show();
	       		    setTimeout(function(){ 
	       		    	 $('#id_warning_'+id).hide();
	       		    	 $('.close').click();
	       		    }, 3000);
					$('.close').click();
	       		   all_msg();
	       		// }
	       },
		error : function(resultat, statut, erreur){
	       	 if(statut==="timeout") {
		            alert("got timeout");
		        } else {
		            alert(statut);
		        }

	       }
	    });
}

   function all_msg()
    {
    	
    	var base_url = window.location.href.split('back');
    	base_url = base_url[0]+'back/fte_insert_msg/all_msg';

    	$.ajax({
	       url : base_url,
	       type : 'POST',
	       timeout:10000,
	       data:{
	       		all:1
	       },
	       success : function(rslt, statut){
	           $("#content_msg").html(rslt);
	       },
		error : function(resultat, statut, erreur){
	       	 if(statut==="timeout") {
		            alert("got timeout");
		        } else {
		            alert(statut);
		        }

	       }
	    });
    }

</script>