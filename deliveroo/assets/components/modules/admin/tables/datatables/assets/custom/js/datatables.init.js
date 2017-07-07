(function($, window)
{

	$(window).on('load', function()
	{
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
		}

		/* DataTables */
		if ($('.dynamicTable').size() > 0)
		{
			$('.dynamicTable').each(function()
			{
				// DataTables with TableTools
				if ($(this).is('.tableTools'))
				{
					$(this).dataTable({
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
				}
				// colVis extras initialization
				else if ($(this).is('.colVis'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"sDom": "<'row separator bottom'<'col-md-3'f><'col-md-3'l><'col-md-6'C>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"oLanguage": {
							"sLengthMenu": "_MENU_ Nb entrées"
						},
						"oColVis": {
							"buttonText": "Afficher / Masquer les colonnes",
							"sAlign": "right"
						},
						"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
						"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
				else if ($(this).is('.scrollVertical'))
				{
					$(this).dataTable({
						"bPaginate": false,
						"sScrollY": "200px",
						"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
				       	"sDom": "<'row separator bottom'<'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				       	"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
				else if ($(this).is('.ajax'))
				{


						ajax_datatable = $(this).dataTable({
										"sPaginationType": "bootstrap",
										"bProcessing": true,
										"bServerSide": true,
										"sAjaxSource": rootPath + 'front/accueil/datatable',
								       	"sDom": "<'row separator bottom'<'col-md-2'f><'col-md-2 filtre'><'col-md-3'l><'col-md-3'C><'col-md-2 export'>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
										"oLanguage": {
											"sLengthMenu": "_MENU_ Nb entrées"
										},
										"oColVis": {
											"buttonText": "Afficher / Masquer les colonnes",
											"sAlign": "right"
										},
								       	"sScrollX": "100%",
								       	"sScrollXInner": "100%",
								        "bScrollCollapse": true,
								       	"fnInitComplete": function () {
									    	fnInitCompleteCallback(this);
								        },
								        "fnServerData": function(sSource, aoData, fnCallback)
							            {
							              $.ajax
							              ({
								                'dataType': 'json',
								                'type'    : 'POST',
								                'url'     : sSource,
								                'data'    : aoData,
								                'success' : fnCallback
							              });
							            }
									});

						$("div.export").html('<a style="margin-left: 100px;" href="#modal-compose" data-toggle="modal" class="btn btn-success"><i class="fa fa-fw icon-document-blank-fill"></i> Export</a>');
						$("div.filtre").html('<a style="margin-left: 50px;" href="#modal-filtre" data-toggle="modal" class="btn btn-info"><i class="fa fa-filter"></i> Filtre</a>');



					$("#rechercher").on('click',function(){

								var list_matr    = $("#matricule-filtre").val();
								var dateD  = $("#datepicker-filtre1").val();
								var dateF = $("#datepicker-filtre2").val();

								var date_d 	 = dateD.split("/").reverse().join("-");
								var date_f 	 = dateF.split("/").reverse().join("-");

								deb = date_d.split('-');
							  	fin = date_f.split('-');
								
								Odeb = new Date(deb[0], deb[1], deb[2]);
							  	Ofin = new Date(fin[0], fin[1], fin[2]);

								if(Ofin < Odeb && ( dateD  !="" && dateD !=""))
								{
									$("#datepicker-filtre1").focus();
									$("#warning-date").show();
										setTimeout(function(){
								  			$("#warning-date").hide();
										}, 3000);
									return false;
								}else{

									var heureD  = $("#timepicker-filter1").val();
									var heureF = $("#timepicker-filter2").val();

									hd = heureD.split(":");
									hf = heureF.split(":");

									var d1 = new Date(parseInt("2017",10),(parseInt("01",10))-1,parseInt("01",10),parseInt(hd[0],10),parseInt(hd[1],10),parseInt(hd[2],10));
									var d2 = new Date(parseInt("2017",10),(parseInt("01",10))-1,parseInt("01",10),parseInt(hf[0],10),parseInt(hf[1],10),parseInt(hf[2],10));
									var dd1 = d1.valueOf();
									var dd2 = d2.valueOf();

									if(dd1 <= dd2){

											ajax_datatable.fnClose;
											ajax_datatable.fnDestroy();
											

											ajax_datatable.dataTable({
												"sPaginationType": "bootstrap",
												"bProcessing": true,
												"bServerSide": true,
												"sAjaxSource": rootPath + 'front/accueil/datatable_filtre',
										       	"sDom": "<'row separator bottom'<'col-md-2'f><'col-md-2 filtre'><'col-md-3'l><'col-md-3'C><'col-md-2 export'>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
												"oLanguage": {
													"sLengthMenu": "_MENU_ Nb entrées"
												},
												"oColVis": {
													"buttonText": "Afficher / Masquer les colonnes",
													"sAlign": "right"
												},
										       	"sScrollX": "100%",
										       	"sScrollXInner": "100%",
										        "bScrollCollapse": true,
										       	"fnInitComplete": function () {
											    	fnInitCompleteCallback(this);
										        },
										        "fnServerData": function(sSource, aoData, fnCallback)
									            {
									            	var form_data = {
									            			"dateD" : convert_date_format($('#datepicker-filtre1').val()),
											                "dateF" : convert_date_format($('#datepicker-filtre2').val()),
											                "heureD" : $('#timepicker-filter1').val(),
											                "heureF" : $('#timepicker-filter2').val(),
													        "matricule" : $('#matricule-filtre').val()	
											        };


							            			for(var i = 0; i < aoData.length; i++){
											           // var d = "\""+aoData[i].name +"\" : "+ aoData[i].value+",";

											           form_data[aoData[i].name] = aoData[i].value;
											        }
											        
									              $.ajax
									              ({
										                'dataType': 'json',
										                'type'    : 'POST',
										                'url'     : sSource,
										                'data'    : form_data,
										                'success' : fnCallback
									              });
									            }
											});

											$("div.export").html('<a style="margin-left: 100px;" href="#modal-compose" data-toggle="modal" class="btn btn-success"><i class="fa fa-fw icon-document-blank-fill"></i> Export</a>');
											$("div.filtre").html('<a style="margin-left: 50px;" href="#modal-filtre" data-toggle="modal" class="btn btn-info"><i class="fa fa-filter"></i> Filtre</a>');


											$('#modal-filtre').modal('hide');
										
									}else{
										$("#timepicker-filter1").focus();
										$("#warning-heure").show();
											setTimeout(function(){
									  			$("#warning-heure").hide();
											}, 3000);
										return false;
									}

								}
							});
						

				}
				else if ($(this).is('.ajaxalerte'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"bServerSide": true,
						"bProcessing": true,
						"sAjaxSource" : rootPath + 'back/msg_alert/ajax_list',
				       	"sDom": "<'row separator bottom'<'col-md-2 ajoutMsg'><'col-md-10'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				       	"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
				       	"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				       },
				        "fnServerData": function(sSource, aoData, fnCallback)
			            {
			              $.ajax
			              ({
				                'dataType': 'json',
				                'type'    : 'POST',
				                'url'     : sSource,
				                'data'    : aoData,
				                'success' : fnCallback
			              });
			            }
					});

					$("div.ajoutMsg").html('<a data-toggle="tooltip" data-original-title="Ajouter une alerte" data-placement="top" onclick = "add_msg();" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp;Ajout</a>');
				}
				else if ($(this).is('.ajax2'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"bProcessing": true,
						"bServerSide": true,
						"sAjaxSource": rootPath + 'front/accueil/datatableUser',
				       	"sDom": "<'row separator bottom'<'col-md-3'f><'col-md-3'l><'col-md-6'C>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"oLanguage": {
							"sLengthMenu": "_MENU_ Nb entrées"
						},
						"oColVis": {
							"buttonText": "Afficher / Masquer les colonnes",
							"sAlign": "right"
						},
				       	"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
				       	"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        },
				        "fnServerData": function(sSource, aoData, fnCallback)
			            {
			              $.ajax
			              ({
				                'dataType': 'json',
				                'type'    : 'POST',
				                'url'     : sSource,
				                'data'    : aoData,
				                'success' : fnCallback
			              });
			            }
					});

				}
				else if ($(this).is('.ajax3'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"bProcessing": true,
						"bServerSide": true,
						"sAjaxSource": rootPath + 'front/accueil/datatableAdmin',
				       	// "sDom": "<'row separator bottom'<'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				       	"sDom": "<'row separator bottom'<'col-md-3'f><'col-md-3'l><'col-md-6'C>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"oLanguage": {
							"sLengthMenu": "_MENU_ Nb entrées"
						},
						"oColVis": {
							"buttonText": "Afficher / Masquer les colonnes",
							"sAlign": "right"
						},
				       	"sScrollX": "100%",
				       	"sScrollY": "350px",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
				       	"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        },
				        "fnServerData": function(sSource, aoData, fnCallback)
			            {
			              $.ajax
			              ({
				                'dataType': 'json',
				                'type'    : 'POST',
				                'url'     : sSource,
				                'data'    : aoData,
				                'success' : fnCallback
			              });
			            },
			            "fnCreatedRow" : function(nRow, aData, iDataIndex){
			            	$(nRow).attr('class', 'center');
			            }
					});

					

				}
				else if ($(this).is('.fixedHeaderColReorder'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
				       	"sDom": "R<'clear'><'row separator bottom'<'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				       	"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
				       	"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
					    	var t = this;
					    	setTimeout(function(){
					    		new FixedHeader( t );
					    	}, 1000);
				        }
					});
				}
				// default initialization
				else
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"sDom": "<'row separator bottom'<'col-md-5'T><'col-md-3'l><'col-md-4'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
						"oLanguage": {
							"sLengthMenu": "_MENU_ par page"
						},
						"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
			});
		}
	});
	
})(jQuery, window);