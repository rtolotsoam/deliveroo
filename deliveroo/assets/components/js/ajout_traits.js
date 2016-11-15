function ajout_traitement(){

	var libelle_traits = document.getElementById("libelle_traits").value;
	var libelle_sous_cat = document.getElementById("libelle_sous_cat").value;
	var cont_sous_cat = document.getElementById("cont_sous_cat").value;
	var sous_cat = document.getElementById("sous_cat").value;
	





	if((typeof libelle_traits != null && libelle_traits != '') && (typeof libelle_sous_cat != null && libelle_sous_cat != '') && (typeof cont_sous_cat != null && cont_sous_cat != '')){
		
		var form_data = {
			libelle_traits : libelle_traits,
			libelle_sous_cat : libelle_sous_cat,
			cont_cat_trait : cont_sous_cat,
			ajout_trait : '2',
			ajax : '1'
		};
		
		// TRAITEMENT AJAX DU FORMULAIRE
		$.ajax({
			url: url_js_traits,
			type: 'POST',
			data: form_data,
			success: function(data) {

				
				// TRAITEMENT DES ERREURS
				if(data == 'erreur'){
					
					$('#message_error').html('<div class="alert alert-danger" align="center">Veillez réessayer ulterieurement !</div>');

				}else if(data == 'success'){
					window.location.href = url_acc_traits;
				}else{

					$('#message_error').html(data);					
				}

			}
		});

	}else if((typeof libelle_traits != null && libelle_traits != '') && (libelle_sous_cat == '') && (cont_sous_cat == '')){
		
		var form_data = {
			libelle_traits : libelle_traits,
			sous_cat_traits : sous_cat,
			ajout_trait : '1',
			ajax : '1'
		};
		
		// TRAITEMENT AJAX DU FORMULAIRE
		$.ajax({
			url: url_js_traits,
			type: 'POST',
			data: form_data,
			success: function(data) {

				
				// TRAITEMENT DES ERREURS
				if(data == 'erreur'){
					
					$('#message_error').html('<div class="alert alert-danger" align="center">Veillez réessayer ulterieurement !</div>');

				}else if(data == 'success'){
					window.location.href = url_acc_traits;
				}else{

					$('#message_error').html(data);					
				}

			}
		});

	}else{
		$('#message_error').html('<div class="alert alert-danger" align="center">Le champ libelle traitement est obligatoires, les autres sont facultatives</div>');		
	}
	
	return true;
}