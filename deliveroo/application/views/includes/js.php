<script>

	var basePath = '',
		commonPath = '../assets/',
		rootPath = '../',
		DEV = false,
		componentsPath = '../assets/components/';
	
	var primaryColor = '#cb4040',
		dangerColor = '#b55151',
		infoColor = '#466baf',
		successColor = '#8baf46',
		warningColor = '#ab7a4b',
		inverseColor = '#45484d';
	
	var themerPrimaryColor = primaryColor;
	</script>
	<!-- END CONFIGURATION GOBAL -->
	

<!-- FICHIER JS-->
<script src="<?php echo js_url('library/bootstrap/js/bootstrap.min.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('plugins/nicescroll/jquery.nicescroll.min.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('plugins/breakpoints/breakpoints.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('core/js/animations.init.js?v=v1.2.3'); ?>"></script>

<script src="<?php echo js_url('modules/admin/tables/datatables/assets/lib/js/jquery.dataTables.min.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('modules/admin/tables/datatables/assets/lib/extras/TableTools/media/js/TableTools.min.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('modules/admin/tables/datatables/assets/lib/extras/ColVis/media/js/ColVis.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('modules/admin/tables/datatables/assets/custom/js/DT_bootstrap.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('modules/admin/tables/datatables/assets/custom/js/datatables.init.js?v=v1.2.3'); ?>"></script>

<script src="<?php echo js_url('modules/admin/forms/elements/bootstrap-select/assets/lib/js/bootstrap-select.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('modules/admin/forms/elements/bootstrap-select/assets/custom/js/bootstrap-select.init.js?v=v1.2.3'); ?>"></script>

<script src="<?php echo js_url('modules/admin/forms/elements/bootstrap-datepicker/assets/lib/js/bootstrap-datepicker.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('modules/admin/forms/elements/bootstrap-datepicker/assets/custom/js/bootstrap-datepicker.init.js?v=v1.2.3'); ?>"></script>

<script src="<?php echo js_url('modules/admin/forms/elements/bootstrap-timepicker/assets/lib/js/bootstrap-timepicker.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('modules/admin/forms/elements/bootstrap-timepicker/assets/custom/js/bootstrap-timepicker.init.js?v=v1.2.3'); ?>"></script>

<script src="<?php echo js_url('modules/admin/notifications/gritter/assets/lib/js/jquery.gritter.min.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('modules/admin/notifications/gritter/assets/custom/js/gritter.init.js?v=v1.2.3'); ?>"></script>


<script src="<?php echo js_url('modules/admin/notifications/notyfy/assets/lib/js/jquery.notyfy.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('modules/admin/notifications/notyfy/assets/custom/js/notyfy.init.js?v=v1.2.3'); ?>"></script>



<script src="<?php echo js_url('modules/admin/modals/assets/js/bootbox.min.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('modules/admin/modals/assets/js/modals.init.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('modules/admin/forms/wizards/assets/lib/jquery.bootstrap.wizard.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('modules/admin/forms/wizards/assets/custom/js/form-wizards.init.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('plugins/holder/holder.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('core/js/sidebar.main.init.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('core/js/sidebar.collapse.init.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('helpers/themer/assets/plugins/cookie/jquery.cookie.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('plugins/slimscroll/jquery.slimscroll.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('modules/admin/widgets/widget-scrollable/assets/js/widget-scrollable.init.js?v=v1.2.3'); ?>"></script>
<script src="<?php echo js_url('core/js/core.init.js?v=v1.2.3'); ?>"></script>
<!-- END FICHIER JS-->
<script type="text/javascript">
    all_alert_all_categ();
    all_alert_by_matr_idcat();
    setInterval("all_alert_all_categ()", 20000);
    setInterval("all_alert_by_matr_idcat()", 20000);
   
	
	
	function all_alert_all_categ()
	{
		var base_url = window.location.href.split('front');
		//var base_url2 = window.location.href.split('front').split('/');
		//
	
		if(base_url[1] !=undefined){
			var test_url = base_url[1].split('/');
			test_url = test_url[1];
		}
		
		
		if( test_url == 'accueil_categories')
		{
			$("#allcontent").hide();
			base_url = base_url[0]+'front/alert/front_all_categorie';
			$("#allcontent").show();
			$("#showcontent").hide();
			$("#hidecontent").hide();
			$.ajax({
		       url : base_url,
		       type : 'POST',
		       timeout:10000,
		       success : function(rslt, statut){
		         rslt = rslt.split('|sep|');
		         nres = rslt[1];
		         resinfo = rslt[0];
		       // nb_alert_acc_1
		       	console.log(base_url);
		         $('#info_alerte').html(resinfo);
		         $("#nb_alert_acc_1").text('('+nres+')');
		         $("#nb_alert_acc_2").text('('+nres+')');
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
		
	}
	
	function all_alert_by_matr_idcat()
	{
		var base_url = window.location.href.split('front');

		if(base_url[1] !=undefined){
			var test_url = base_url[1].split('/');
			test_url = test_url[1];
		}
		
		if(test_url == 'accueil_traitement')
		{
			$("#allcontent_tt").hide();
			base_url = base_url[0]+'front/alert/fron_by_cat_n_matricule';
			$("#allcontent_tt").show();
			$("#showcontent_tt").hide();
			$("#hidecontent_tt").hide();
			$.ajax({
		       url : base_url,
		       type : 'POST',
		       timeout:10000,
		       success : function(rslt, statut){
		         rslt = rslt.split('|sep|');
		         nres = rslt[1];
		         resinfo = rslt[0];
		       
		         $('#info_alerte_tt').html(resinfo);
		          //nb_alert_att_2
		           $("#nb_alert_att_1").text('('+nres+')');
		          $("#nb_alert_att_2").text('('+nres+')');
		          
		          
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
		
	}

	$("#alert_content").on('click',function(){//-
		
		$("#allcontent").hide();
		$("#showcontent").show();
		$("#hidecontent").show();//no data
	});
	$("#showcontent").on('click',function(){//+
		$("#showcontent").hide();
		$("#hidecontent").hide();
		$("#alert_content").show();
		$("#allcontent").show();
		
	});

	$("#alert_content_tt").on('click',function(){//-
		
		$("#allcontent_tt").hide();
		$("#showcontent_tt").show();
		$("#hidecontent_tt").show();//no data
	});
	$("#showcontent_tt").on('click',function(){//+
		$("#showcontent_tt").hide();
		$("#hidecontent_tt").hide();
		$("#alert_content_tt").show();
		$("#allcontent_tt").show();
		
	});

</script>
</body>
</html>