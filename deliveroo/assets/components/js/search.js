function search(id) {


	console.log(id);

	var search_text = $('#text_search').val();

	if(typeof search_text == null || typeof search_text == undefined || search_text == ''){
		$('#msg_search').click();
	}else{

			var form_data = {
				search_text : search_text,
				id_traitement : id,
				ajax : '1'
			};



			$.ajax({
				url: url_acc_search,
				type: 'POST',
				data: form_data,
				success: function(data) {
					
					//TRAITEMENT DES ERREURS
					if(data == 'erreur'){
						
						$('#msg_error').click();

					}else{
						window.location.href = url_acc_search;
					}

				}

			});
	}
}