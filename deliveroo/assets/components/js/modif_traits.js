function modifier_categories(id, id_trait){

	// DONNEES DU FORMULAIRE
	var form_data = {
		id_cat_modif : id,
		libelle_cat_modif : $('#libelle_cat_modif_'+id).val(),
		sous_cat_modif : $('#sous_cat_modif_'+id).val(),
		flag_cat_modif : $('#flag_cat_modif_'+id).val(),
		id_cat_trait : id_trait,
		ajax : '1'
	};
	
	// TRAITEMENT AJAX DU FORMULAIRE
	$.ajax({
		url: url_js_modif_cats,
		type: 'POST',
		data: form_data,
		success: function(data) {

			
			// TRAITEMENT DES ERREURS
			if(data == 'erreur'){
				
				$('#message_error_modif'+id).html('<div class="alert alert-danger" align="center">Veillez réessayer ulterieurement !</div>');

			}else if(data == 'success'){
				window.location.href = url_acc_cats;
			}else{

				$('#message_error_modif'+id).html(data);					
			}

		}
	});

	return true;
}



function modifier_cat_traitement(id){

	// DONNEES DU FORMULAIRE
	var form_data = {
		id_cat_modif : id,
		libelle_cat_trait_modif : $('#libelle_cat_trait_modif_'+id).val(),
		cont_cat_trait_modif : $('#cont_cat_trait_modif_'+id).val(),
		flag_cat_trait_modif : $('#flag_cat_trait_modif_'+id).val(),
		ajax : '1'
	};
	
	// TRAITEMENT AJAX DU FORMULAIRE
	$.ajax({
		url: url_js_modif_cat_trait,
		type: 'POST',
		data: form_data,
		success: function(data) {

			
			// TRAITEMENT DES ERREURS
			if(data == 'erreur'){
				
				$('#message_error_modif'+id).html('<div class="alert alert-danger" align="center">Veillez réessayer ulterieurement !</div>');
				$('#error_libelle_'+id).html('');
				$('#error_cont_'+id).html('');

			}else if(data == 'success'){
				window.location.href = url_acc_cats;
			}else{



				var str = data;
				var res = str.split(";");

				$('#error_libelle_'+id).html(res[0]);
				$('#error_cont_'+id).html(res[1]);

				$('#message_error_modif'+id).html(data);					
			}

		}
	});

	return true;
}