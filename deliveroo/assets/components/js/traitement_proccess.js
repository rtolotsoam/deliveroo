
/***** PROCESS 6 ******/

function traite_tel(){
	var  telbikerA =  document.getElementById('telbikerA');

	//alert(telbikerA.value);
	if(typeof telbikerA.value != null && typeof telbikerA.value != undefined && telbikerA.value != ''){
		$("#telbikerA_cp").empty();
		$("#telbikerA_cp").append(telbikerA.value+" ");
	}else{
		$("#telbikerA_cp").empty();
		$("#telbikerA_cp").append("...");	
	}
	
}



function traite_data(){
	var  commandeA =  document.getElementById('commandeA');
	var  nomA =  document.getElementById('nomA');
	var  adresseA =  document.getElementById('adresseA');
	var  numA =  document.getElementById('numA');

	var  commandeB =  document.getElementById('commandeB');
	var  nomB =  document.getElementById('nomB');
	var  adresseB =  document.getElementById('adresseB');
	var  numB =  document.getElementById('numB');

	var  num1 =  document.getElementById('num1');
	var  num2 =  document.getElementById('num2');
	var  num3 =  document.getElementById('num3');
	var  num4 =  document.getElementById('num4');

	var  telbikerB =  document.getElementById('telbikerB');

	if(typeof nomA.value != undefined && typeof nomA.value != null && nomA.value != ''){
		$("#nomA_cp").empty();
		$("#nomA_cp").append(nomA.value+" ");
	}else{
		$("#nomA_cp").empty();
		$("#nomA_cp").append("...");
	}

	if(typeof commandeA.value != undefined && typeof commandeA.value != null && commandeA.value != ''){
		$("#commandeA_cp").empty();
		$("#commandeA_cp").append(commandeA.value+" ");
	}else{
		$("#commandeA_cp").empty();
		$("#commandeA_cp").append("...");
	}

	if(typeof adresseA.value != undefined && typeof adresseA.value != null && adresseA.value != ''){
		$("#adresseA_cp").empty();
		$("#adresseA_cp").append(adresseA.value+" ");
	}else{
		$("#adresseA_cp").empty();
		$("#adresseA_cp").append("...");
	}

	if(typeof numA.value != undefined && typeof numA.value != null && numA.value != ''){
		$("#numA_cp").empty();
		$("#numA_cp").append(numA.value+" ");
	}else{
		$("#numA_cp").empty();
		$("#numA_cp").append("...");
	}


	if(typeof nomB.value != undefined && typeof nomB.value != null && nomB.value != ''){
		$("#nomB_cp").empty();
		$("#nomB_cp").append(nomB.value+" ");
	}else{
		$("#nomB_cp").empty();
		$("#nomB_cp").append("...");
	}

	if(typeof commandeB.value != undefined && typeof commandeB.value != null && commandeB.value != ''){
		$("#commandeB_cp").empty();
		$("#commandeB_cp").append(commandeB.value+" ");
	}else{
		$("#commandeB_cp").empty();
		$("#commandeB_cp").append("...");
	}

	if(typeof adresseB.value != undefined && typeof adresseB.value != null && adresseB.value != ''){
		$("#adresseB_cp").empty();
		$("#adresseB_cp").append(adresseB.value+" ");
	}else{
		$("#adresseB_cp").empty();
		$("#adresseB_cp").append("...");
	}

	if(typeof numB.value != undefined && typeof numB.value != null && numB.value != ''){
		$("#numB_cp").empty();
		$("#numB_cp").append(numB.value+" ");
	}else{
		$("#numB_cp").empty();
		$("#numB_cp").append("...");
	}

	if(typeof num1.value != undefined && typeof num1.value != null && num1.value != ''){
		$("#num1_cp").empty();
		$("#num1_cp").append(num1.value+" ");
	}else{
		$("#num1_cp").empty();
		$("#num1_cp").append("...");
	}

	if(typeof num2.value != undefined && typeof num2.value != null && num2.value != ''){
		$("#num2_cp").empty();
		$("#num2_cp").append(num2.value+" ");
	}else{
		$("#num2_cp").empty();
		$("#num2_cp").append("...");
	}

	if(typeof num3.value != undefined && typeof num3.value != null && num3.value != ''){
		$("#num3_cp").empty();
		$("#num3_cp").append(num3.value+" ");
	}else{
		$("#num3_cp").empty();
		$("#num3_cp").append("...");
	}

	if(typeof num4.value != undefined && typeof num4.value != null && num4.value != ''){
		$("#num4_cp").empty();
		$("#num4_cp").append(num4.value+" ");
	}else{
		$("#num4_cp").empty();
		$("#num4_cp").append("...");
	}

	if(typeof telbikerB.value != undefined && typeof telbikerB.value != null && telbikerB.value != ''){
		$("#telbikerB_cp").empty();
		$("#telbikerB_cp").append(telbikerB.value+" ");
	}else{
		$("#telbikerB_cp").empty();
		$("#telbikerB_cp").append("...");
	}
	
}



/***** PROCESS 2 ******/

function choix_DA(){
	var choix = document.getElementById("choix_da").value;

    if(choix == '2'){
    	$("#label_da").empty();
		$("#label_da").append("Noter le temps de retard ici :");
    	document.getElementById("temps_restantda").value = "00:00:00";
    	document.getElementById("delaida").value = "Délai de DA : 00 h 15 min 00 s";
    }else if(choix == '1'){
    	$("#label_da").empty();
		$("#label_da").append("Noter le temps restant : ");
    	document.getElementById("temps_restantda").value = "00:00:00";
    	document.getElementById("delaida").value = "Délai de DA : 00 h 15 min 00 s ";
    }
}


function traite_dataPro2(){
	var num_comP1 = document.getElementById("num_comP1").value;
	var nom_bikerP1 = document.getElementById("nom_bikerP1").value;
	var tel_clientP1 = document.getElementById("tel_clientP1").value;
	var adresseliv_clientP1 = document.getElementById("adresseliv_clientP1").value;
	var nom_clientP1 = document.getElementById("nom_clientP1").value;
	var adressemail_clientP1 = document.getElementById("adressemail_clientP1").value;
	var infocompl_clientP1 = document.getElementById("infocompl_clientP1").value;
	var nouv_infoP1 = document.getElementById("nouv_infoP1").value;

	if(typeof num_comP1 != undefined && typeof num_comP1 != null && num_comP1 != ''){
		
		$("#num_comP1_cp").empty();
		$("#num_comP1_cp").append(num_comP1+" ");

		$("#num_comP1_cp2").empty();
		$("#num_comP1_cp2").append(num_comP1+" ");

	}else{
		
		$("#num_comP1_cp").empty();
		$("#num_comP1_cp").append("...");

		$("#num_comP1_cp2").empty();
		$("#num_comP1_cp2").append("...");
	}

	if(typeof nom_bikerP1 != undefined && typeof nom_bikerP1 != null && nom_bikerP1 != ''){
		$("#nom_bikerP1_cp").empty();
		$("#nom_bikerP1_cp").append(nom_bikerP1+" ");

		$("#nom_bikerP1_cp2").empty();
		$("#nom_bikerP1_cp2").append(nom_bikerP1+" ");
	}else{
		$("#nom_bikerP1_cp").empty();
		$("#nom_bikerP1_cp").append("...");

		$("#nom_bikerP1_cp2").empty();
		$("#nom_bikerP1_cp2").append("...");
	}

	if(typeof tel_clientP1 != undefined && typeof tel_clientP1 != null && tel_clientP1 != ''){
		$("#tel_clientP1_cp").empty();
		$("#tel_clientP1_cp").append(tel_clientP1+" ");

		$("#tel_clientP1_cp2").empty();
		$("#tel_clientP1_cp2").append(tel_clientP1+" ");

		$("#tel_clientP1_cp3").empty();
		$("#tel_clientP1_cp3").append(tel_clientP1+" ");

		$("#tel_clientP1_cp4").empty();
		$("#tel_clientP1_cp4").append(tel_clientP1+" ");

		$("#tel_clientP1_cp5").empty();
		$("#tel_clientP1_cp5").append(tel_clientP1+" ");

		$("#tel_clientP1_cp6").empty();
		$("#tel_clientP1_cp6").append(tel_clientP1+" ");
	
	}else{
		$("#tel_clientP1_cp").empty();
		$("#tel_clientP1_cp").append("...");

		$("#tel_clientP1_cp2").empty();
		$("#tel_clientP1_cp2").append("...");

		$("#tel_clientP1_cp3").empty();
		$("#tel_clientP1_cp3").append("...");

		$("#tel_clientP1_cp4").empty();
		$("#tel_clientP1_cp4").append("...");

		$("#tel_clientP1_cp5").empty();
		$("#tel_clientP1_cp5").append("...");

		$("#tel_clientP1_cp6").empty();
		$("#tel_clientP1_cp6").append("... ");
	}


	if(typeof adresseliv_clientP1 != undefined && typeof adresseliv_clientP1 != null && adresseliv_clientP1 != ''){
		$("#adresseliv_clientP1_cp").empty();
		$("#adresseliv_clientP1_cp").append(adresseliv_clientP1+" ");

		$("#adresseliv_clientP1_cp2").empty();
		$("#adresseliv_clientP1_cp2").append(adresseliv_clientP1+" ");

		$("#adresseliv_clientP1_cp3").empty();
		$("#adresseliv_clientP1_cp3").append(adresseliv_clientP1+" ");

		$("#adresseliv_clientP1_cp4").empty();
		$("#adresseliv_clientP1_cp4").append(adresseliv_clientP1+" ");
	
	}else{
		$("#adresseliv_clientP1_cp").empty();
		$("#adresseliv_clientP1_cp").append("...");

		$("#adresseliv_clientP1_cp2").empty();
		$("#adresseliv_clientP1_cp2").append("...");

		$("#adresseliv_clientP1_cp3").empty();
		$("#adresseliv_clientP1_cp3").append("...");

		$("#adresseliv_clientP1_cp4").empty();
		$("#adresseliv_clientP1_cp4").append("...");
	}


	if(typeof nom_clientP1 != undefined && typeof nom_clientP1 != null && nom_clientP1 != ''){
		$("#nom_clientP1_cp").empty();
		$("#nom_clientP1_cp").append(nom_clientP1+" ");

		$("#nom_clientP1_cp2").empty();
		$("#nom_clientP1_cp2").append(nom_clientP1+" ");
	}else{
		$("#nom_clientP1_cp").empty();
		$("#nom_clientP1_cp").append("...");

		$("#nom_clientP1_cp2").empty();
		$("#nom_clientP1_cp2").append("...");
	}

	if(typeof adressemail_clientP1 != undefined && typeof adressemail_clientP1 != null && adressemail_clientP1 != ''){
		
		$("#adressemail_clientP1_cp").empty();
		$("#adressemail_clientP1_cp").append(adressemail_clientP1+" ");

	}else{
		
		$("#adressemail_clientP1_cp").empty();
		$("#adressemail_clientP1_cp").append("...");
	}


	if(typeof infocompl_clientP1 != undefined && typeof infocompl_clientP1 != null && infocompl_clientP1 != ''){
		
		$("#infocompl_clientP1_cp").empty();
		$("#infocompl_clientP1_cp").append(infocompl_clientP1+" ");

		$("#infocompl_clientP1_cp2").empty();
		$("#infocompl_clientP1_cp2").append(infocompl_clientP1+" ");

	}else{
		
		$("#infocompl_clientP1_cp").empty();
		$("#infocompl_clientP1_cp").append("...");

		$("#infocompl_clientP1_cp2").empty();
		$("#infocompl_clientP1_cp2").append("...");
	}

	if(typeof nouv_infoP1 != undefined && typeof nouv_infoP1 != null && nouv_infoP1 != ''){
		
		$("#nouv_infoP1_cp").empty();
		$("#nouv_infoP1_cp").append(nouv_infoP1+" ");

	}else{
		
		$("#nouv_infoP1_cp").empty();
		$("#nouv_infoP1_cp").append("...");

	}

}

function traite_da(){
	var choix = document.getElementById("choix_da").value;
	var temp = document.getElementById("temps_restantda").value;

    if(choix == '2'){
		document.getElementById("delaida").value = "Délai de DA : 00 h 15 min 00 s";    	
    }else if(choix == '1'){
    	
		var str = temp;

		var times = str.split(":");

		var res = parseInt(times[1])+15;

		if(res > 60){
			var sec = res - 60;
			var h = parseInt(times[0])+1;
				
			times[0] = String(h);
			times[1] = String(sec);

		}else{
			times[1] = String(res);
		}
	
		document.getElementById("delaida").value = "Délai de DA : "+times[0]+" h "+times[1]+" min "+times[2]+" s"; 
	}
		    
}





/***** process9 *****/
function traite_dataPro9(){

	var forfait_Pro9 = document.getElementById("forfait_Pro9").value;
	
	if(typeof forfait_Pro9 != undefined && typeof forfait_Pro9 != null && forfait_Pro9 != ''){

		var calcul = parseInt(forfait_Pro9);

		if(!isNaN(calcul)){
			var res = calcul * 2;
			
			$("#forfait_Pro9_cp").empty();
			$("#forfait_Pro9_cp").append(res+" ");

		}else{

			$("#forfait_Pro9_cp").empty();
			$("#forfait_Pro9_cp").append("Entrer des valeurs numérique ");
		}
		
	}else{
		
		$("#forfait_Pro9_cp").empty();
		$("#forfait_Pro9_cp").append("...");
	}

}


