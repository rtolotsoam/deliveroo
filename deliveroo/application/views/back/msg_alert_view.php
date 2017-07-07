
<div id="content"><h1 class="content-heading bg-white border-bottom hidden">Historique</h1> 

	<div class="innerAll spacing-x2">
		<!-- msg content tab -->
		<div class="widget widget-inverse">
			
			<div class="widget-head">
				<div class="row">
					<div class="col-md-12">	
						<h4 class="heading">
							Gestion des alertes		
						</h4>
					</div>	
				</div>
			</div>

			<div class="widget-body padding-bottom-none">

						<!-- Table -->
						<table class="dynamicTable ajaxalerte table table-striped table-vertical-center table-responsive">

								<!-- Table heading -->
					            <thead class="bg-gray">
					                <tr>
					                	<th>Modifier</th>
					                    <th>Matricule</th>
					                    <th>Catégorie</th>
					                    <th>Objet</th>
					                    <th>Description</th>
					                    <th>Début</th>
					                    <th>Fin</th>
					                    <th>Etat</th>    
					                </tr>
					            </thead>
					            <!-- // Table heading END -->

					            <!-- Table body -->
					            <tbody>

					            </tbody>
					            <!-- // Table body END -->

						</table>
						<!-- // Table END -->

				
				<!-- // Tab MESSAGE END -->
			
				<!-- Tab ALERT -->
							
				</div>	
			</div>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                	<div class="alert alert alert-danger" style="display:none;" id="warning_">
						<strong>Il y a eu une erreur sur la date.</strong>
					</div>
					<div class="alert alert alert-danger" style="display:none;" id="warning_o">
						<strong>Objet obligatoire.</strong>
					</div>
                    <input type="hidden" value="" name="id_alerte"/> 
                    <div class="row">
					<div class="form-group">
						<div class="col-xs-12 col-md-12  col-lg-6">
							<div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
								
									<label for="matricule">Matricule : </label>
									<select name="matricule" class="form-control select2" multiple="multiple">
									  <?php 
										$content  		 ="";
										$content 		.="<option selected value ='all' >--Toutes--</option>";
										foreach ($users_modal as  $value) {
											$matricule 	 = $value->matricule;
											$prenom      = $value->prenom;
											$content    .="<option value ='".$matricule."' >".$matricule." - ".$prenom."</option>";
										}
										echo $content;
									  ?>
									</select>
								
							</div>
						</div>
						<div class="col-xs-12 col-md-12  col-lg-6">
							
								<div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
									<div class="row">	
										<div class = "col-md-6">
											 <label for="datedeb">Date début : </label>
											 <input type="text" class="form-control datedeb_edit" name="datedeb" value='<?php echo date("d/m/Y");?>' />
										</div>
										<div class = "col-md-6">
											 <label for="datefin">Date fin : </label>
											 <input type="text" class="form-control datedeb_edit" name="datefin" value='<?php echo date("d/m/Y");?>' />
										</div>
									</div>	
								</div>
								<div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
									<label for="categorie">Catégorie : </label>
									<select name="categorie" class="form-control">
									  <?php 
										$content_cat  		 ="";
										$content_cat 		.="<option selected value ='0' >--Toutes--</option>";
										foreach ($categories as  $categorie) {
											$li_cate 	 	 = $categorie->libelle_categories;
											$id_cat        		 = $categorie->fte_categories_id;
											$content_cat    .="<option value ='".$id_cat."' >".$li_cate."</option>";
										}
										echo $content_cat;
									  ?>
									</select>
								</div>
							
						</div>
			</div>
			</div>  <!--  END  row -->
			<!--<div class="row">
							<div class="form-group">
								<div class="col-xs-12 col-md-12  col-lg-6">
									<div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
										
											<label for="type_alerte">Type d'alerte : </label>
											<select name="type_alerte" class="form-control">
											  <option  value ='0' >--Aucun--</option>
													<option selected value ='1' >Offre promo</option>
													<option  value ='2' >Intermpérie</option>
											</select>
										
									</div>
								</div>
								<div class="col-xs-12 col-md-12  col-lg-6">
									<div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
										<div class="row">	
											<div class = "col-md-6">
						            		 <label for="type">Type (Neige, ...) : </label>
											<select name="type" class="form-control">
												<option selected value ='0' >--Toutes--</option>
												<?php 
													$content_all_type ="";
													foreach ($all_type as $value_type) {
														$content_all_type .="<option value='".$value_type->id_type."'>".$value_type->type."</option>";
													}
													echo $content_all_type;
												?>
											</select>
											</div>
											<div class = "col-md-6">
						            		 <label for="flag">Etat : </label>
											<select name="flag" class="form-control">
												<option selected value ='0' >Inactif</option>
												<option  value ='1' >Actif</option>
												
											</select>
											</div>
						            	
										</div>	
									</div>
								</div>
							</div>  
						</div> <!--  END  row -->

					<!--	<div class="row">
						   <div class="form-group">
							<div class="col-xs-12 col-md-12  col-lg-6">
								<div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
									
										<label for="zone">Zone : </label>
										<?php echo $all_zone; ?>
									</div>
								
							</div>
							<div class="col-xs-12 col-md-12  col-lg-6">
								
									<div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
										<div class="row">	
											<div class = "col-md-12">
												 <label for="montant">Montant (€) : </label>
												 <input type="text" name="montant" required pattern="[0-9]*.?[0-9]{0,2}|[0-9]*,?[0-9]{0,2}|[0-9]*" class="form-control" 
												 onblur="if (!this.checkValidity()){val = this.value;res = val.match(/[0-9]*.?[0-9]{0,2}|[0-9]*,?[0-9]{0,2}|[0-9]*/g);this.value = res[0];}"
												 />
											</div>
											
										</div>	
									</div>
								   
								
							</div>
						   </div> 
					   </div> --><!--  END  row -->
					   <div class="row">	
						<div class = "col-md-9">
							 <label for="datefin">Objet : </label>
							 <input type="text" class="form-control" name="objet" placeholder ="Saisir l'objet du message" required />
						</div>
						<div class = "col-md-3">
							  <label for="flag_">Etat : </label>
							<select name="flag_" class="form-control">
								<option selected value ='0' >Inactif</option>
								<option  value ='1' >Actif</option>
							</select>
						</div>
					</div>
					   <div class="row">
					   		<div class="col-xs-12 col-md-12  col-lg-12">
					   			<label for="description">Description : </label>
					   			<textarea id='description' name='description' class='form-control' rows='4' style='resize:none;'></textarea>
					   			<?php  echo display_ckeditor($alert_10); ?>
					   		</div>	
					   </div> <!--  END  row -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-inverse btn-stroke">Enregistrer</button>
                <button type="button" class="btn btn-inverse btn-stroke" data-dismiss="modal">Annuler</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<script type="text/javascript">



var save_method; 
var table;



function edit_alert(id)
{
    save_method = 'edit';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
	 var title_ = '<span class="label label-inverse">Modifier une alerte</span>';
     $('.modal-title').text('');
     $('.modal-title').html(title_);
	$.ajax({
        url : "<?php echo site_url('back/msg_alert/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			console.log(data);
			$('[name="matricule"]').val(data.matricule.split(","));
            $('[name="datedeb"]').val(data.datedeb.split("-").reverse().join("/"));
           $('[name="categorie"]').val(data.categorie);
            $('[name="id_alerte"]').val(data.id_alerte);
            $('[name="objet"]').val(data.objet);
            $('[name="datefin"]').val(data.datefin.split("-").reverse().join("/"));
            $('[name="flag_"]').val(data.flag);
           /* $('[name="type_alerte"]').val(data.type_alerte);
            $('[name="type"]').val(data.type);
            $('[name="flag"]').val(data.flag);
            $('[name="zone"]').val(data.zone);
            $('[name="montant"]').val(data.montant);*/
            
            CKEDITOR.instances.description.setData(data.description);
            

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
   
    var url;

    if(save_method == 'add') {
    	 
         url = "<?php echo site_url('back/msg_alert/ajax_add_msg')?>";
     }else {
   /* alert(save_method);
    return 0;*/
    	
        url = "<?php echo site_url('back/msg_alert/ajax_update')?>";
    }

    
		var matricule = $('[name="matricule"]').val();
			matricule = matricule.toString();
		var datedeb = $('[name="datedeb"]').val();
		var categorie = $('[name="categorie"]').val();
		var id_alerte = $('[name="id_alerte"]').val();
		var datefin = $('[name="datefin"]').val();
		//var type_alerte = $('[name="type_alerte"]').val();
		//var type = $('[name="type"]').val();
		var flag = $('[name="flag_"]').val();
		//var zone = $('[name="zone"]').val();
		var montant = $('[name="montant"]').val();
		var objet = $('[name="objet"]').val();
     	/*if($('[name="datefin"]').val() < $('[name="datedeb"]').val() && ( $('[name="datefin"]').val()  !="" && $('[name="datedeb"]').val() !=""))
		{
			$('[name="datefin"]').focus();
			$("#warning_").show();
				setTimeout(function(){
		  			$("#warning_").hide();
				}, 1000);
			return false;
		}*/

		var datedeb = new Date(convert_date_format($('[name="datedeb"]').val()));
		var datefin = new Date(convert_date_format($('[name="datefin"]').val()));
		
		
		if(datefin < datedeb )
		{
			$('[name="datefin"]').focus();
			$("#warning_").show();
				setTimeout(function(){
		  			$("#warning_").hide();
				}, 1000);
			return false;
		}
		if($('[name="objet"]').val().trim() == '')
		{
			$("#warning_o").show();
			$('[name="objet"]').focus();
				setTimeout(function(){
		  			$("#warning_o").hide();
				}, 3000);

			return false;
		}

		$('#btnSave').text('saving...'); //change button text
		$('#btnSave').attr('disabled',true); //set button disable 
    $.ajax({
        url : url,
        type: "POST",
        data: {
			matricule 	: matricule,
			datedeb   	: convert_date_format($('[name="datedeb"]').val()),
			/*categorie 	: categorie,
			id_alerte 	: id_alerte,*/
			datefin   	: convert_date_format($('[name="datefin"]').val()),
			objet       : objet,
			flag 		: flag,
			/*type_alerte : type_alerte,
			type 		: type,
			flag 		: flag,
			zone 		: zone,
			montant 	: montant,*/
			categorie 	: categorie,
			id_alerte 	: id_alerte,
			description: CKEDITOR.instances.description.getData()	
        },
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
               location.reload();
                $('#modal_form').modal('hide');
                 
                 
                $('#btnSave').attr('disabled',false); //set button disable 
            }
            
            $('#btnSave').text('Enregistrer'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

	function add_msg()
	{
		save_method = 'add';
		var title_ = '<span class="label label-info">Ajouter une nouvelle alerte</span>';
    	$('.modal-title').text('');
    	$('.modal-title').html(title_);
		$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
	}

	function convert_date_format(date)
	{
		var newdate = date.split("/").reverse().join("-");
		return newdate;
	}

</script>	

