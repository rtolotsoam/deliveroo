
<div id="content"><h1 class="content-heading bg-white border-bottom hidden">Historique</h1> 

<div class="innerAll spacing-x2">
		<div class="widget widget-inverse" >

			<div class="widget-body padding-bottom-none">

				<!-- Table -->
				<table class="dynamicTable <?php if($level == "admin"){ echo "ajax"; }else{ echo "ajax2"; } ?> table">
					
					<!-- Table heading -->
					<thead class="bg-gray">
						<tr>
							<?php if($level =="admin" ){ ?>
							<th>Matricule</th>
							<th>Catégories</th>
							<th>Traitement&nbsp;</th>
							<th>Processus</th>
							<th>Sortie</th>
							<th>Date début</th>
							<th>Heure début</th>
							<th>Date fin</th>
							<th>Heure fin</th>
							<?php }else{ ?>
							<th>Catégories</th>
							<th>Traitement&nbsp;</th>
							<th>Processus</th>
							<th>Sortie</th>
							<th>Date début</th>
							<th>Heure début</th>
							<th>Date fin</th>
							<th>Heure fin</th>
							<?php } ?>
						</tr>
					</thead>
					<!-- // Table heading END -->

					<!-- Table body -->
					<tbody>
						

					</tbody>
					<!-- // Table body END -->
						
				</table>
				<!-- // Table END -->

			</div>	
		</div>		


<!-- Modal -->
<div class="modal fade" id="modal-filtre">
	
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal heading -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Filtre pour vos recherche</h3>
			</div> 
			<!-- // Modal heading END -->
			<!-- Modal body -->

			<div class="modal-body"> 
			
				<form class="margin-none" role="form">
					<div class="form-group">
						<div class="row innerLR innerB">
							<div class="form-group">
								<div class="col-md-12">
								 	<label for="matricule-filtre">Matricule :</label>
								    <select style="height:200px;" id="matricule-filtre" class="form-control" multiple>
										<option value="">--Toutes--</option>


										<?php 
										
										
										foreach ($histo_user as $table_histo) {
										
										?>
											<option value="<?php echo $table_histo->matricule; ?>">
												<?php 
													echo $table_histo->matricule.' - '.ascii_to_entities($table_histo->initcap); 
												?>

											</option>
										<?php
										}
										?>
										
								</select>


								</div>
							 </div>
							
						</div>
						<div class="row innerLR innerB">
							<div class="form-group">
								<div class="alert alert alert-danger" style="display:none;" id="warning-date">
									<strong>Date début doit être inférieur Date fin</strong>
								</div>
							</div>
						</div>
						<div class="row innerLR innerB">
							<div class="form-group">
								<div class="col-md-6">
								 	<label for="datepicker-filtre1">Date début :</label>
								    <input type="text" id="datepicker-filtre1" class="form-control" value='<?php echo date("d/m/Y");?>'>
								</div>
								<div class="col-md-6">
								 	<label for="datepicker-filtre2">Date fin :</label>
								    <input type="text" id="datepicker-filtre2" class="form-control" value='<?php echo date("d/m/Y");?>'>
								</div>
							 </div>
							
						</div>
						<div class="row innerLR innerB">
							<div class="form-group">
								<div class="alert alert alert-danger" style="display:none;" id="warning-heure">
									<strong>Heure début doit être inférieur Heure fin</strong>
								</div>
							</div>
						</div>
						
						<div class="row innerLR innerB">
							<div class="form-group">			
								<div class="col-md-6">
									<div class="input-group bootstrap-timepicker">
									 	<label for="timepicker-filter1">Heure début :</label>
									    <input style="width : 262.5px; height:34px;" type="text" id="timepicker-filter1" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group bootstrap-timepicker">
									 	<label for="timepicker-filter2">Heure fin :</label>
									    <input style="width : 262.5px; height:34px;" type="text" id="timepicker-filter2" class="form-control">
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
				</form>
			
			</div>
			<!-- // Modal body END -->

			<div class="innerAll text-center border-top">
				<a href="#" class="btn btn-block btn-primary" id="rechercher"><i class="fa fa-search"></i>&nbsp;Chercher</a>
			</div>
	
		</div>
	</div>
	
</div>
<!-- // Modal END -->	

	
<!-- Modal -->
<div class="modal fade" id="modal-compose">
	
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal heading -->
			<div class="modal-header">
				<button type="button" data-dismiss="modal" class="bootbox-close-button close">×</button>
				<h4 class="modal-title">Filtre pour l'export</h4>
			</div>
			<!-- // Modal heading END -->

			<!-- Modal body -->
			<div class="modal-body"> 
			
				<form class="margin-none" role="form">
					<div class="form-group">
						<div class="row innerLR innerB">
							<div class="form-group">
								<div class="col-md-12">
								 	<label for="matricule">Matricule :</label>
									    <select style="height:200px;" id="matricule" class="form-control" multiple>
											<option value="">--Toutes--</option>


											<?php 
											
											
											foreach ($histo_user as $table_histo) {
											
											?>
												<option value="<?php echo $table_histo->matricule; ?>">
													<?php 
														echo $table_histo->matricule.' - '.ascii_to_entities($table_histo->initcap); 
													?>

												</option>
											<?php
											}
											?>
											
										</select>


								</div>
							 </div>
							
						</div>
						<div class="row innerLR innerB">	
							<div class="alert alert alert-danger" style="display:none;" id="warning">
								<strong>Date début doit être inférieur Date fin</strong>
							</div>
						</div>	
						<div class="row innerLR innerB">
							<div class="form-group">
								<div class="col-md-6">
								 	<label for="matr">Date début :</label>
								    <input type="text" id="datepicker1" class="form-control" value='<?php echo date("d/m/Y");?>'>
								</div>
								<div class="col-md-6">
								 	<label for="matr">Date fin :</label>
								    <input type="text" id="datepicker1b" class="form-control" value='<?php echo date("d/m/Y");?>'>
								</div>
							 </div>
							
						</div>
						<div class="row innerLR innerB">	
							<div class="alert alert alert-danger" style="display:none;" id="warning-heure-export">
								<strong>Heure début doit être inférieur Heure fin</strong>
							</div>
						</div>
						<div class="row innerLR innerB">
							<div class="form-group">			
								<div class="col-md-6">
									<div class="input-group bootstrap-timepicker">
									 	<label for="timepicker-export1">Heure début :</label>
									    <input style="width : 262.5px; height:34px;" type="text" id="timepicker-export1" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group bootstrap-timepicker">
									 	<label for="timepicker-export2">Heure fin :</label>
									    <input style="width : 262.5px; height:34px;" type="text" id="timepicker-export2" class="form-control">
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
				</form>
			
			</div>
			<!-- // Modal body END -->

			<div class="innerAll text-center border-top">
				<a href="" class="btn btn-default" data-dismiss="modal" ><i class="fa fa-fw icon-crossing"></i> Cancel</a>
				<a href="" class="btn btn-primary" id="exporter"><i class="fa fa-fw icon-outbox-fill"></i>Exporter</a>
			</div>
	
		</div>
	</div>
	
</div>
<!-- // Modal END -->


<?php

?>
<script type="text/javascript">

// Pour Export

$("#exporter").on('click',function(){
	var list_matr    = $("#matricule").val();
	var datepicker1  = $("#datepicker1").val();
	var datepicker1b = $("#datepicker1b").val();

	datepicker1 	 = convert_date_format(datepicker1);
	datepicker1b 	 = convert_date_format(datepicker1b);

	deb = datepicker1.split('-');
  	fin = datepicker1b.split('-');
	
	Odeb = new Date(deb[0], deb[1], deb[2]);
  	Ofin = new Date(fin[0], fin[1], fin[2]);

	if(Ofin < Odeb && ( datepicker1b  !="" && datepicker1 !=""))
	{
		$("#datepicker1").focus();
		$("#warning").show();
			setTimeout(function(){
	  			$("#warning").hide();
			}, 3000);
		return false;
	}else
	{	

		var heureD  = $("#timepicker-export1").val();
		var heureF = $("#timepicker-export2").val();

		hd = heureD.split(":");
		hf = heureF.split(":");

		var d1 = new Date(parseInt("2017",10),(parseInt("01",10))-1,parseInt("01",10),parseInt(hd[0],10),parseInt(hd[1],10),parseInt(hd[2],10));
		var d2 = new Date(parseInt("2017",10),(parseInt("01",10))-1,parseInt("01",10),parseInt(hf[0],10),parseInt(hf[1],10),parseInt(hf[2],10));
		var dd1 = d1.valueOf();
		var dd2 = d2.valueOf();

		if(dd1 <= dd2){


			/*
			var form_data = {
				"dateD" : datepicker1,
				"dateF" : datepicker1b,
				"heureD" : heureD,
				"heureF" : heureD,
				"list_matr" : list_matr
			};

			var exportUrl = '<?php echo site_url('back/fte_histo_user_c_export/export'); ?>';

			$.ajax({
	                type    : 'POST',
	                url     : exportUrl,
	                data    : form_data ,
	                success : function(data){
	                	return false;	
	                }
	        });*/

			if(list_matr == ""){
				list_matr = null;
			}
			
			window.location = "<?php echo site_url('back/fte_histo_user_c_export/'); ?>"+'/'+datepicker1+'/'+datepicker1b+'/'+heureD+'/'+heureF+'/'+list_matr;
			$('#modal-compose').modal('hide');

			return false;
			//alert('dans test');

			//return false;
			/*window.location = "<?php echo site_url('back/fte_histo_user_c_export/index');?>?list_matr="+list_matr+'&datepicker1='+datepicker1+'&datepicker1b='+datepicker1b+'&test=ggg';
			return false;*/
		}else{

			$("#timepicker-export1").focus();
			$("#warning-heure-export").show();
				setTimeout(function(){
		  			$("#warning-heure-export").hide();
				}, 3000);
			return false;
		}
		
		
	}
});



	function convert_date_format(date)
	{
		var newdate = date.split("/").reverse().join("-");
		return newdate;
	}
</script>

<?php

?>

