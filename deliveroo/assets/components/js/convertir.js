function convertir_k(){
	var  k =  document.getElementById('metre');

	if(!isNaN(k.value)){

		var resM = k.value/1000;

		var classA = document.getElementById('moinsKm');
		var classB = document.getElementById('plusKm');

		classA.classList.remove("hidden");
		classA.classList.add("btn");
		classA.classList.add("btn-info");
		classA.classList.add("pull-right");
		classA.classList.add("action-btn");
		classB.classList.remove("hidden");
		classB.classList.add("btn");
		classB.classList.add("btn-info");
		classB.classList.add("pull-right");
		classB.classList.add("action-btn");

		document.getElementById('kilometre').value = resM;
		document.getElementById('kilometre2').value = resM;
		document.getElementById('metre2').value = k.value;

		$("#distance").empty();
		$("#distance").append(k.value +" ");
		$("#distance2").empty();
		$("#distance2").append(k.value +" ");

		if(resM == 0){
			$("#distance").empty();
			$("#distance").append(" ... ");	
			$("#distance2").empty();
			$("#distance2").append(" ... ");			
		}else{
			if(resM <= 5){
				classB.setAttribute("class", "hidden");
			}else if(resM > 5){
				classA.setAttribute("class", "hidden");
			}
		}
	}else{
		document.getElementById('kilometre').value = "Entrer des valeurs numérique";
	}
}


function convertir_m(){
	var  m =  document.getElementById('kilometre2');

	if(!isNaN(m.value)){

		var resK = m.value*1000;

		var classA = document.getElementById('moinsKm');
		var classB = document.getElementById('plusKm');

		classA.classList.remove("hidden");
		classA.classList.add("btn");
		classA.classList.add("btn-info");
		classA.classList.add("pull-right");
		classA.classList.add("action-btn");
		classB.classList.remove("hidden");
		classB.classList.add("btn");
		classB.classList.add("btn-info");
		classB.classList.add("pull-right");
		classB.classList.add("action-btn");

		document.getElementById('metre2').value = resK;
		document.getElementById('metre').value = resK;
		document.getElementById('kilometre').value = m.value;

		$("#distance").empty();
		$("#distance").append(resK +" ");
		$("#distance2").empty();
		$("#distance2").append(resK +" ");

		if(resK == 0){
			$("#distance").empty();
			$("#distance").append(" ... ");
			$("#distance2").empty();
			$("#distance2").append(" ... ");			
		}else{
			if(resK <= 5000){
				classB.setAttribute("class", "hidden");
			}else if(resK > 5000){
				classA.setAttribute("class", "hidden");
			}
		}
	}else{
		document.getElementById('metre2').value = "Entrer des valeurs numérique";
	}
}

