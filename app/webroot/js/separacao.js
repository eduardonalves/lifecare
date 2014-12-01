$(document).ready(function(){
	
	/***Input text com datePicker Para datas no estilo " De X a Z**/	
    $(".inputSearchData input[id*='between']").before("<span>a</span>");
	
	$(".ui-autocomplete").addClass("overflowLista");
	$("#filtro-produto .ui-widget").addClass("borderRadius");
		

//CONVERTE O FORMATO DAS DATAS
	datavencimentoInicio = $('#filterDataInici').val();	
	if(datavencimentoInicio  != undefined){
		if(datavencimentoInicio !=''){
			iniano =  datavencimentoInicio.substr(0, 4);
			inimes = datavencimentoInicio.substr(5,2);
			inidia = datavencimentoInicio.substr(8,2);
			dataInicio =  inidia+'/'+inimes+'/'+iniano;
			$('#filterDataInici').val(dataInicio);
		}
	}
	
	datavencimentoFim = $('#filterDataInici-between').val();
	if(datavencimentoFim  != undefined){
		if(datavencimentoFim != ''){
			
			fimano =  datavencimentoFim.substr(0, 4);
			fimmes = datavencimentoFim.substr(5,2);
			fimdia = datavencimentoFim.substr(8,2);
			dataFim =  fimdia+'/'+fimmes+'/'+fimano;
			$('#filterDataInici-between').val(dataFim);
		}
	}
	
	datavencimentoInicio = $('#filterDataEntrega').val();	
	if(datavencimentoInicio  != undefined){
		if(datavencimentoInicio !=''){
			iniano =  datavencimentoInicio.substr(0, 4);
			inimes = datavencimentoInicio.substr(5,2);
			inidia = datavencimentoInicio.substr(8,2);
			dataInicio =  inidia+'/'+inimes+'/'+iniano;
			$('#filterDataEntrega').val(dataInicio);
		}
	}
	
	datavencimentoFim = $('#filterDataEntrega-between').val();
	if(datavencimentoFim  != undefined){
		if(datavencimentoFim != ''){
			
			fimano =  datavencimentoFim.substr(0, 4);
			fimmes = datavencimentoFim.substr(5,2);
			fimdia = datavencimentoFim.substr(8,2);
			dataFim =  fimdia+'/'+fimmes+'/'+fimano;
			$('#filterDataEntrega-between').val(dataFim);
		}
	}
	
/*** Validação de Datas Consultas *************************************/
	function compararData(idCampo){	
		var comparaAno = new Array($(idCampo).val().substring(6,11) ,$(idCampo +"-between").val().substring(6,11));
		var comparaMes = new Array($(idCampo).val().substring(3,5) ,$(idCampo +"-between").val().substring(3,5));
		var comparaDia = new Array($(idCampo).val().substring(0,2) ,$(idCampo +"-between").val().substring(0,2));

		if(comparaAno[0] > comparaAno[1]){
			return -1;
		}else if((comparaMes[0] > comparaMes[1]) && (comparaAno[0] <= comparaAno[1])){
			return -1;
		}else if((comparaDia[0] > comparaDia[1]) && (comparaMes[0] <= comparaMes[1]) && (comparaAno[0] <= comparaAno[1])){
			return -1;
		}
	}
	
	$("[id*='filterData']").addClass('inputData validaConFinan');
	
	$("#filterDataInici").mask('99/99/9999');
	$("#filterDataInici-between").mask('99/99/9999');	
		
	$("#filterDataEntrega").mask('99/99/9999');
	$("#filterDataEntrega-between").mask('99/99/9999');
	
	$('.inputData').on("keypress",function(event){
		var charCode = event.keyCode || event.which;

	    if (!((charCode > 47) && (charCode < 58) || (charCode == 8) || (charCode == 9))){return false;} else {return true}
    });
    
    $(".inputData").focusout(function(){
		var elemento = $(this).val();

		var dia = elemento.substring(0,2);
		var mes = elemento.substring(3,5);
		var ano = elemento.substring(6,11);

		if(ano.length == 1){
			$(this).val().slice(0,-1);
			$(this).val(dia +"/"+ mes +"/200"+ ano);
		}
		
		if(ano.length == 2){
			$(this).val().slice(0,-2);
			$(this).val(dia +"/"+ mes +"/20"+ ano);
		}
		
		if(ano.length == 3){
			$(this).val().slice(0,-3);
			$(this).val(dia +"/"+ mes +"/2"+ ano);
		}

		if(dia > 31){
			$(this).val("");
		}
		
		if(mes > 12){
			$(this).val("");
		}
		
		if((dia > 29) && (mes == 2)){
			$(this).val("");
		}
	});
	
	$("#filterDataInici-between").focusout(function(){
		var data_final = $("#filterDataInici-between").val();
		var daysNota;

		daysNota = compararData("#filterDataInici"); 

		if(daysNota < 0 && data_final != ''){
			if(data_final != null){
				$("#filterDataInici, #filterDataInici-between").val("");
				$("#filterDataInici-between").addClass("shadow-vermelho");
				$('<span id="spanDataFinalIni" class="DinamicaMsg Msg-tooltipAbaixo">A data Final não pode ser menor que a inicial</span>').insertAfter('input[id="filterDataInici-between"]');
			}
		}else if(data_final == ''){
			$("#filterDataInici, #filterDataInici-between").val("");
		}else{
			$("#filterDataInici-between").removeClass("shadow-vermelho");
		}		
	});
    
    $("#filterDataEntrega-between").focusout(function(){
		var data_final = $("#filterDataEntrega-between").val();
		var daysNota;

		daysNota = compararData("#filterDataEntrega"); 

		if(daysNota < 0 && data_final != ''){
			if(data_final != null){
				$("#filterDataEntrega, #filterDataEntrega-between").val("");
				$(" #filterDataEntrega-between").addClass("shadow-vermelho");
				$('<span id="spanDataFinalEntre" class="DinamicaMsg Msg-tooltipAbaixo">A data Final não pode ser menor que a inicial</span>').insertAfter('input[id="filterDataEntrega-between"]');
			}
		}else if(data_final == ''){
			$("#filterDataEntrega, #filterDataEntrega-between").val("");
		}else{
			$("#filterDataEntrega-between").removeClass("shadow-vermelho");
		}
    });
    

});
