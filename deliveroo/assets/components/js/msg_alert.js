/*
var datedeb   = $("#msg_deb").val();
var datefin   = $("#msg_fin").val();
all_msg();	
all_alerte();
	
$("#send_msg").on('click',function(){

	var msg_type = 'msg';
	var msg = CKEDITOR.instances["msg_insert"].getData();
	var matricule = $("#matricule").val();
	var date1 = $("#msg_deb").val();
	var date2 = $("#msg_fin").val();
	if(date2 < date1 && ( date2  !="" && date1 !=""))
	{
		$("#msg_deb").focus();
		$("#warning").show();
			setTimeout(function(){
	  			$("#warning").hide();
			}, 3000);
		return false;
	}
	
	var base_url = window.location.href.split('back');
		base_url = base_url[0]+'back/fte_insert_msg/insert';
	
	$.ajax({
	       url : base_url,
	       type : 'POST',
	       timeout:10000,
	       data:{
	       		matricule : matricule.toString(),
	       		datedeb   : convert_date_format($("#msg_deb").val()),
	       		datefin   : convert_date_format($("#msg_fin").val()),
	       		msg 	  : CKEDITOR.instances["msg_insert"].getData(),
	       		categ     : $("#categ").val(),
	       		objet	  : $("#objet").val(),
	       		msg_type  : 1
	       },
	       success : function(rslt, statut){
	           if(rslt > 0){
	       		   $('#id_warning').show();
	       		    setTimeout(function(){ 
	       		    	 $('#id_warning').hide();
	       		    	 $('.close').click();
	       		    }, 1000);
	       		    $("#content_msg").text('xxxx');
	       		 	all_msg();
	       		}
	       },
		error : function(resultat, statut, erreur){
	       	 if(statut==="timeout") {
		            alert("got timeout");
		        } else {
		            alert(statut);
		        }

	       }
	    });



	
});

$("#send_alert").on('click',function(){

	var matricule_alert = $("#matricule_alert").val();
		matricule_alert = matricule_alert.toString();
	var datedeb_alert 	= $("#alert_deb").val();
	var datefin_alert 	= $("#alert_fin").val();
	var type_alert 		= $("#typ_alert").val();
	var type 			= $("#alert_type").val();
	var zone 			= $("#type_alert_zone").val();
	var montant 		= $("#montant").val();
	var content_alert 	= CKEDITOR.instances["alert_insert"].getData();
	var base_url = window.location.href.split('back');
		base_url_a = base_url[0]+'back/fte_insert_alert/index';

	if(datefin_alert < datedeb_alert && ( datefin_alert  !="" && datedeb_alert !=""))
	{
		$("#alert_deb").focus();
		$("#warning_a").show();
			setTimeout(function(){
	  			$("#warning_a").hide();
			}, 3000);
		return false;
	}


	$.ajax({
	       url : base_url_a,
	       type : 'POST',
	       timeout:10000,
	       data:{
	       		matricule : matricule_alert,
	       		datedeb   : convert_date_format(datedeb_alert),
	       		datefin   : convert_date_format(datefin_alert),
	       		msg 	  : content_alert,
	       		categ     : $("#alert_categ").val(),
	       		type_alert: $("#typ_alert").val(),
	       		type      : $("#alert_type").val(),
	       		zone  	  : $("#type_alert_zone").val(),
	       		montant	  : $("#montant").val()
	       },
	       success : function(rslt, statut){
	       	if(rslt > 0){
	       		   $('#id_warning_a').show();
	       		    setTimeout(function(){ 
	       		    	 $('#id_warning_a').hide();
	       		    	 $('.close').click();
	       		    }, 1000);
	       		    //$("#content_msg").text('xxxx');
	       		 	//all_msg();
	       		}
	       },
		error : function(resultat, statut, erreur){
	       	 if(statut==="timeout") {
		            alert("got timeout");
		        } else {
		            alert(statut);
		        }

	       }
	    }); 

});


/************************************//*
	function convert_date_format(date)
	{
		var newdate = date.split("/").reverse().join("-");
		return newdate;
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
    function all_alerte()
    {
    	var base_url = window.location.href.split('back');
    	base_url = base_url[0]+'back/fte_insert_alert/all_alert';

    	$.ajax({
	       url : base_url,
	       type : 'POST',
	       cache: false,
	       dataType: "html",
	       timeout:10000,
	       data:{
	       		all:1
	       },
	       success : function(rslt, statut){
	           $("#content_alert").html(rslt);
	           
	           	setTimeout(function(){ 
	       		$('.list_alert').dataTable({
						"sPaginationType": "bootstrap",
						"sDom": "<'row separator bottom'<'col-md-5'T><'col-md-3'l><'col-md-4'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"oLanguage": {
							"sLengthMenu": "_MENU_ Afficher"
						},
						"oTableTools": {
							"sSwfPath": componentsPath + "modules/admin/tables/datatables/assets/lib/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
					    },
					    "aoColumnDefs": [
				          { 'bSortable': false, 'aTargets': [ 0 ] }
				       	],
				       	"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
					    "fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}, 1000);
	           
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


function fnInitCompleteCallback(that)
					{
					var p = that.parents('.dataTables_wrapper').first();
			    	var l = p.find('.row').find('label');

			    	l.each(function(index, el) {
			    		var iw = $("<div>").addClass('col-md-8').appendTo($(el).parent());
			    		$(el).parent().addClass('form-group margin-none').parent().addClass('form-horizontal');
			            $(el).find('input, select').addClass('form-control').removeAttr('size').appendTo(iw);
			            $(el).addClass('col-md-4 control-label');
			    	});

			    	var s = p.find('select');
			    	s.addClass('.selectpicker').selectpicker();
			    	
					}*/