$(document).ready(function(){

/*** AJUSTAR CAMPOS AO CARREGAR PÁGINA ***************************/
	datavencimentoInicio = $('#filterDataInici').attr('value');
	if(datavencimentoInicio != undefined){
		if(datavencimentoInicio !=''){
			iniano = datavencimentoInicio.substr(0, 4);
			inimes = datavencimentoInicio.substr(5,2);
			inidia = datavencimentoInicio.substr(8,2);
			dataInicio = inidia+'/'+inimes+'/'+iniano;
			$('#filterDataInici').val(dataInicio);
		}
	}
	
	datavencimentoFim = $('#filterDataInici-between').attr('value');
	if(datavencimentoFim != undefined){
		if(datavencimentoFim != ''){
			
			fimano = datavencimentoFim.substr(0, 4);
			fimmes = datavencimentoFim.substr(5,2);
			fimdia = datavencimentoFim.substr(8,2);
			dataFim = fimdia+'/'+fimmes+'/'+fimano;
			$('#filterDataInici-between').val(dataFim);
		}
	}
	
	datavencimentoInicio = $('#filterDataFim').attr('value');
	if(datavencimentoInicio != undefined){
		if(datavencimentoInicio !=''){
			iniano = datavencimentoInicio.substr(0, 4);
			inimes = datavencimentoInicio.substr(5,2);
			inidia = datavencimentoInicio.substr(8,2);
			dataInicio = inidia+'/'+inimes+'/'+iniano;
			$('#filterDataFim').val(dataInicio);
		}
	}
	
	datavencimentoFim = $('#filterDataFim-between').attr('value');
	if(datavencimentoFim != undefined){
		if(datavencimentoFim != ''){
			
			fimano = datavencimentoFim.substr(0, 4);
			fimmes = datavencimentoFim.substr(5,2);
			fimdia = datavencimentoFim.substr(8,2);
			dataFim = fimdia+'/'+fimmes+'/'+fimano;
			$('#filterDataFim-between').val(dataFim);
		}
	}
	
	datavencimentoInicio = $('#filterDataResposta').attr('value');
	if(datavencimentoInicio != undefined){
		if(datavencimentoInicio !=''){
			iniano = datavencimentoInicio.substr(0, 4);
			inimes = datavencimentoInicio.substr(5,2);
			inidia = datavencimentoInicio.substr(8,2);
			dataInicio = inidia+'/'+inimes+'/'+iniano;
			$('#filterDataResposta').val(dataInicio);
		}
	}
	
	datavencimentoFim = $('#filterDataResposta-between').attr('value');
	if(datavencimentoFim != undefined){
		if(datavencimentoFim != ''){
			
			fimano = datavencimentoFim.substr(0, 4);
			fimmes = datavencimentoFim.substr(5,2);
			fimdia = datavencimentoFim.substr(8,2);
			dataFim = fimdia+'/'+fimmes+'/'+fimano;
			$('#filterDataResposta-between').val(dataFim);
		}
	}

/*** SUBMITAR FILTRO CONSULTA ***************************/
$("#quick-filtrar-compras").click(function(e){
	e.preventDefault();

	if($("#filterValor").val() == "0,00" && $("#filterValor-between").val() == "0,00"){
		$("#filterValor").val("");
		$("#filterValor-between").val("");
	}

	
	if($('#filterDataInici').val()!='' && $('#filterDataInici-between').val()==''){
	    $('#filterDataInici-between').addClass('shadow-vermelho').after('<span id="vazioDataInici" class="DinamicaMsg Msg-tooltipDireita">Preencha o campo para filtrar</span>');
	}else if($('#filterDataFim').val()!='' && $('#filterDataFim-between').val()==''){
	    $('#filterDataFim-between').addClass('shadow-vermelho').after('<span id="vazioDataFim" class="DinamicaMsg Msg-tooltipDireita">Preencha o campo para filtrar</span>');
	}else if($('#filterValor').val()!='' && $('#filterValor-between').val()==''){
	    $('#filterValor-between').addClass('shadow-vermelho').after('<span id="vazioFilterValor" class="DinamicaMsg Msg-tooltipDireita">Preencha o campo para filtrar</span>');
	}else{
	    var usoInicioPhp = '<?php' ;
	    var usoFinalPhp ='?>';
	    var usoGet = '$_GET["ql"]=0';

	    $('section').attr(usoInicioPhp+' '+usoGet+' '+usoFinalPhp);

	    valAux=$('#filterValor').val();
	    valAuxBet=$('#filterValor-between').val();

	    $('#filterValor').val(valAux.split('.').join('').replace(',','.'));
	    $('#filterValor-between').val(valAuxBet.split('.').join('').replace(',','.'));

	    
	    $('#form-filter-results').submit();
	}
});


/*** VALIDAR FILTROS DE CONSULTO ***************************/
	

});
