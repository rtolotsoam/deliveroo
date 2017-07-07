<style type="text/css">
.dataTables_scrollHead{height : 38px !important;}
</style>
<div class="innerAll spacing-x2" style="z-index: 0 !important;">
	<!-- msg content tab -->
	<div class="widget widget-tabs widget-tabs-double-2 widget-tabs-responsive">
		<div class="widget widget-inverse">
			<div class="widget-head">
				<div class="row">
					<div class="col-md-10">	
						<h4 class="heading">
							Gestion des notifications
						</h4> 
					</div>
					<div class="col-md-2">
						<a style="margin : 2px !important; float:right;" data-toggle="tooltip" data-original-title="Ajouter une alerte" data-placement="top" onclick = "add_msg();" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp;Ajout</a>
					</div>
							
				</div>
			</div>	
		</div>
		<div class="widget-body">
					<table  id = "alerte" class="ajaxnotification dynamicTable table table-striped dataTable" >
			            <thead class="bg-gray">
			                <tr >
			                    <th>Début</th>
			                    <th>Fin</th>
			                    <th>Description</th>
			                    <th>Objet</th>
			                    <th>Etat</th>
			                    <th width='10' >Action</th>
			                </tr>
			            </thead>
			            <tbody>
			            </tbody>
					</table>				
		</div>
	</div>

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
					<input type="hidden" value="" name="id_notification"/> 
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
					<div class="row">	
						<div class = "col-md-9">
							 <label for="datefin">Objet : </label>
							 <input type="text" class="form-control" name="objet" placeholder ="Saisir l'objet de la notification" required />
						</div>
						<div class = "col-md-3">
							  <label for="flag">Etat : </label>
							<select name="flag" class="form-control">
								<option selected value ='0' >Inactif</option>
								<option  value ='1' >Actif</option>
							</select>
						</div>
					</div>
					<div class="row">
					   		<div class="col-md-12">
					   			<label for="description_not">Description : </label>
					   			<textarea id='description_not' name='description_not' class='form-control' rows='4' style='resize:none;'></textarea>
					   			<?php  echo display_ckeditor($noti_10); ?>
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

function edit_nofication(id)
{
    save_method = 'edit';
    
	 var title_ = '<span class="label label-inverse">Modifier une notification</span>';
     $('.modal-title').text('');
     $('.modal-title').html(title_);
	$.ajax({
        url : "<?php echo site_url('back/msg_notification/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			
			$('[name="datedeb"]').val(data.datedeb.split("-").reverse().join("/"));
            $('[name="id_notification"]').val(data.id_notification);
            $('[name="datefin"]').val(data.datefin.split("-").reverse().join("/"));
            $('[name="objet"]').val(data.objet);
            $('[name="flag"]').val(data.flag);
            CKEDITOR.instances.description_not.setData(data.description);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function save()
{
    
    var url;

    if(save_method == 'add') {
    	 
         url = "<?php echo site_url('back/msg_notification/ajax_add')?>";
     }else {
         url = "<?php echo site_url('back/msg_notification/ajax_update')?>";
    }
   		
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
		var objet = $('[name="objet"]').val();
		var description = CKEDITOR.instances.description_not.getData();
		var datedeb = convert_date_format($('[name="datedeb"]').val());
		var datefin = convert_date_format($('[name="datefin"]').val());
		var id_notification = $('[name="id_notification"]').val();

    
    $.ajax({
        url : url,
        type: "POST",
        data: {
			
			datedeb   	: convert_date_format(datedeb),
			objet	    : objet,
			datefin   	: convert_date_format(datefin),
			flag 		: $('[name="flag"]').val(),
			id_notification : id_notification,
			description: CKEDITOR.instances.description_not.getData()	
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
		var title_ = '<span class="label label-success">Ajouter une nouvelle notification</span>';
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

