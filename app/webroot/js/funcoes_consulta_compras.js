$(document).ready(function(){
	
/*** EXPANDIR DADOS DA OPERAÇÃO ***************************/
	var expandirOperacao = false;
	
	$('label[for="filterStatusOperacao"]').css('display','none');
	$('#filterStatusOperacao').css('display','none');

	$('label[for="filterFormaPagamento"]').css('display','none');
	$('#filterFormaPagamento').css('display','none');

	$('#bt-expandirOperacao').css('top','160px');
	
	$('#bt-expandirOperacao').click(function(){
		
		if(!expandirOperacao){
			expandirOperacao = true;
			
			$('label[for="filterStatusOperacao"]').css('display','initial');
			$('#filterStatusOperacao').css('display','initial');
			
			$('label[for="filterFormaPagamento"]').css('display','initial');
			$('#filterFormaPagamento').css('display','initial');
			
			$('#bt-expandirOperacao').css('top','180px');
			
			$('#bt-expandirOperacao').css('transform','rotate(180deg)');
			$('#bt-expandirOperacao').css('-ms-transform','rotate(180deg)');
			$('#bt-expandirOperacao').css('-webkit-transform','rotate(180deg)');
		}else{
			expandirOperacao = false;
			
			$('label[for="filterStatusOperacao"]').css('display','none');
			$('#filterStatusOperacao').css('display','none');
				
			$('label[for="filterFormaPagamento"]').css('display','none');
			$('#filterFormaPagamento').css('display','none');
				
			$('#bt-expandirOperacao').css('top','160px');
			
			$('#bt-expandirOperacao').css('transform','initial');
			$('#bt-expandirOperacao').css('-ms-transform','initial');
			$('#bt-expandirOperacao').css('-webkit-transform','initial');
		}
	});
	

/*** AJUSTAR CAMPOS AO CARREGAR PÁGINA ***************************/
	$(".inputSearchNome .custom-combobox .custom-combobox-input").addClass("tamanho-medio");
	
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
	
	//~ var expandido = false;
	//~ 
	//~ $('label[for="filterNomeCentroCusto"]').css('display','none');
	//~ $('#filterNomeCentroCusto').css('display','none');
	//~ 
	//~ $('label[for="filterNomeTipodeconta"]').css('display','none');
	//~ $('#filterNomeTipodeconta').css('display','none');
	//~ 
	//~ $('label[for="filterDescricao"]').css('display','none');
	//~ $('#filterDescricao').css('display','none');
	//~ 
	//~ $('#bt-expandir').css('top','160px');
	//~ 
	//~ $('#bt-expandir').click(function(){
		//~ 
		//~ if(!expandido){
			//~ expandido = true;
			//~ 
			//~ $('label[for="filterNomeCentroCusto"]').css('display','initial');
			//~ $('#filterNomeCentroCusto').css('display','initial');
			//~ 
			//~ $('label[for="filterNomeTipodeconta"]').css('display','initial');
			//~ $('#filterNomeTipodeconta').css('display','initial');
			//~ 
			//~ $('label[for="filterDescricao"]').css('display','initial');
			//~ $('#filterDescricao').css('display','initial');
			//~ 
			//~ $('#bt-expandir').css('top','215px');
			//~ 
			//~ $('#bt-expandir').css('transform','rotate(180deg)');
			//~ $('#bt-expandir').css('-ms-transform','rotate(180deg)');
			//~ $('#bt-expandir').css('-webkit-transform','rotate(180deg)');
		//~ }else{
			//~ expandido = false;
			//~ 
			//~ $('label[for="filterNomeCentroCusto"]').css('display','none');
			//~ $('#filterNomeCentroCusto').css('display','none');
			//~ 
			//~ $('label[for="filterNomeTipodeconta"]').css('display','none');
			//~ $('#filterNomeTipodeconta').css('display','none');
			//~ 
			//~ $('label[for="filterDescricao"]').css('display','none');
			//~ $('#filterDescricao').css('display','none');
				//~ 
			//~ $('#bt-expandir').css('top','160px');
			//~ 
			//~ $('#bt-expandir').css('transform','initial');
			//~ $('#bt-expandir').css('-ms-transform','initial');
			//~ $('#bt-expandir').css('-webkit-transform','initial');
		//~ }
	//~ });


/*** CONSULTA *********************************************************/
	function get(){
		var get = new Object();
		var parameters = window.location.toString().split("?").pop().split("&");

		for (var i in parameters){
			var parts = parameters[i].split("=");

			get[""+parts[0]+""] = parts[1];
		}

		return get;
	}

	function TrocaConsulta(){
		var opConsulta = "";
		
		if($("#checkresposta").prop("checked")){
			opConsulta = opConsulta.concat($("#checkresposta").val());
		}
		
		if($("#checkproduto").prop("checked")){
			opConsulta = opConsulta.concat($("#checkproduto").val());
		}

        switch(opConsulta){
            case('respostas'):
				window.open(urlPadrao+"&parametro=respostas"+limit,"_self");
                break;
            case('produtos'):
				window.open(urlPadrao+"&parametro=produtos"+limit,"_self");
                break;
            case('respostasprodutos'):
					window.open(urlPadrao+"&parametro=respostasprodutos"+limit,"_self");
                break;
            case (''):
                window.open(urlPadrao+"&parametro=operacoes"+limit,"_self");
                break;
        }
	};

	var get = get();
	var parametro = get.parametro;

	var urlPadrao = urlInicio+"comoperacaos/index/?";
	var limit = get.limit;

	if(String(limit) != String('') && String(limit) != String('undefined')) { limit = '&limit=' + limit; } else { limit=''; }

	if(parametro == 'operacoes'){

		$("#filtro-produto").css({"background-color":"#ebebeb","border-color":"#ccc"});
		
		$(".informacoesProduto input").prop('disabled', true);
		$(".informacoesProduto  select").prop('disabled', true);
		
		$("#checkproduto").prop('checked', false);
		$('#filtro-produto').click(false);

		$("#filtro-produto").mouseenter(function() {
			$('#msgFiltroProduto').css('display','inherit');
		}).mouseleave(function() {
			$('#msgFiltroProduto').css('display','none');
		});
		
	}else if(parametro == 'produtos'){
		$("#checkproduto").attr('checked', true);
		
		$(".informacoesProduto input, select").prop('disabled',false);		
		
	}else if(parametro == 'respostasprodutos'){
		$("#checkproduto").attr('checked', true);
		$("#checkresposta").attr('checked', true);
	}
	

	$('#checkproduto').on('click', function(){
		TrocaConsulta();
	});
	
/***************************Checkboxes COTACAO E PEDIDO***********/
var valorAux=$('#filterTipoOperacao').val();
	if(valorAux != undefined){
		var valorEntrada=valorAux.substr(0,7);
		var valorSaida2 =valorAux.substr(8,5);
	}

	if(valorEntrada == 'COTACAO'){
		$('#QuicklinkNomeCOTACAO').attr('checked', true);
	}else if(valorEntrada == 'PEDIDO'){
		$('#QuicklinkNomePEDIDO').attr('checked', true);
	}else if(valorEntrada == 'RESPONDIDO'){
		$('#QuicklinkNomeRESPONDIDO').attr('checked', true);
	}
	
	if(valorSaida2 != ''){
		$('#QuicklinkNomePEDIDO').attr('checked', true);
		$('#QuicklinkNomeCOTACAO').attr('checked', true);
	}

	$("#QuicklinkNomeCOTACAO, #QuicklinkNomePEDIDO").bind('click', function(){
		if($('#QuicklinkNomeCOTACAO').is(':checked')){
			if($('#QuicklinkNomePEDIDO').is(':checked')){
				$('#filterTipoOperacao').val('PEDIDO COTACAO');
			}else{
				$('#filterTipoOperacao').val('COTACAO');
			}
		}else if($('#QuicklinkNomePEDIDO').is(':checked')){
			if($('#QuicklinkNomePEDIDO').is(':checked')){
				$('#filterTipoOperacao').val('PEDIDO');
			}else{
				$('#filterTipoOperacao').val(' ');
			}
		}
	});

	$("#QuicklinkNomeRESPONDIDO").bind('click', function(){
		if($('#QuicklinkNomeRESPONDIDO').is(':checked')){
			$("#QuicklinkNomeCOTACAO").prop('disabled', true);
			$("#QuicklinkNomePEDIDO").prop('disabled', true);
			$("#dataEntrega input").prop('disabled', true);
			$('#QuicklinkNomePEDIDO').attr('checked', false);
			$('#QuicklinkNomeCOTACAO').attr('checked', false);
			$('#filterTipoOperacao').val('RESPONDIDO');
			$('#dataEntrega').show();
		}else{
			$("#QuicklinkNomeCOTACAO").prop('disabled', false);
			$("#QuicklinkNomePEDIDO").prop('disabled', false);
			$("#dataEntrega input").prop('disabled', false);
			$('#dataEntrega').hide();
		}
	});

/*** SALVAR QUICKLINK *************************************************/
    $("#bt-salvar-quicklink").click(function(event){
		event.preventDefault();
		
		nomequick = $('.nome-quicklink').val();
		
		if(nomequick != ''){
			$("#formCadQuicklink").submit();
			$("#quick-select").val(nomequick);
			$('#quick-select').find('option[text="'+nomequick+'"]').val();
		}else{
			$('#QuicklinkNome').focus();
			$('#spanQuicklink').show();
		}
    });

});
