function traiter(idtraitement, itab){
	
	var pont_data = {
			id_traitement : idtraitement,
			id_tab : itab,
			ajax : '1'
	};


	$.ajax({
		url: pont,
		type: 'POST',
		data: pont_data,
		success: function(data) {
			window.location.href = data;	
		}
	});

	return true;
}          