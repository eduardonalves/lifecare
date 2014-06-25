$(document).ready(function(){

/*** EXPANDIR DADOS DA OPERAÇÃO ***************************/
	var expandirOperacao = false;
	
	$('label[for="filterStatusOperacao"]').css('display','none');
	$('#filterStatusOperacao').css('display','none');

	$('label[for="filterFormaPagamento"]').css('display','none');
	$('#filterFormaPagamento').css('display','none');
	

	$('.some').css('display','none');

	$('#bt-expandirOperacao').css('top','160px');
	
	$('#bt-expandirOperacao').click(function(){
		
		if(!expandirOperacao){
			expandirOperacao = true;
			
			$('label[for="filterStatusOperacao"]').css('display','initial');
			$('#filterStatusOperacao').css('display','initial');
			
			$('label[for="filterFormaPagamento"]').css('display','initial');
			$('#filterFormaPagamento').css('display','initial');
			
			$('.some').css('display','initial');
			
			$('#bt-expandirOperacao').css('top','240px');
			
			$('#bt-expandirOperacao').css('transform','rotate(180deg)');
			$('#bt-expandirOperacao').css('-ms-transform','rotate(180deg)');
			$('#bt-expandirOperacao').css('-webkit-transform','rotate(180deg)');
		}else{
			expandirOperacao = false;
			
			$('label[for="filterStatusOperacao"]').css('display','none');
			$('#filterStatusOperacao').css('display','none');
				
			$('label[for="filterFormaPagamento"]').css('display','none');
			$('#filterFormaPagamento').css('display','none');
			
			$('.some').css('display','none');
			
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
		if(datavencimentoInicio != ''){
			iniano = datavencimentoInicio.substr(0,4);
			inimes = datavencimentoInicio.substr(5,2);
			inidia = datavencimentoInicio.substr(8,2);
			dataInicio = inidia+'/'+inimes+'/'+iniano;

			//alert(dataInicio);

			$('#filterDataInici').val(dataInicio);
		}
	}

	datavencimentoFim = $('#filterDataInici-between').attr('value');
	if(datavencimentoFim != undefined){
		if(datavencimentoFim != ''){
			fimano = datavencimentoFim.substr(0,4);
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

	function TrocaConsulta(param){
		var opConsulta = "";
		
		if(param == 'op'){
			opConsulta = $("#checkop").val();
		}
		
		else if(param == 'prod'){
			opConsulta = $("#checkproduto").val();
		}
		
		else if(param == 'for'){
			opConsulta = $("#checkfor").val();
		}

        switch(opConsulta){
            case('produtos'):
				window.open(urlPadrao+"&parametro=produtos"+limit,"_self");
                break;
            case('fornecedores'):
				window.open(urlPadrao+"&parametro=fornecedores"+limit,"_self");
                break;
            case('operacoes'):
					window.open(urlPadrao+"&parametro=operacoes"+limit,"_self");
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
		$("#checkop").prop('checked', true);
		$("#checkproduto").prop('checked', false);
		$("#checkparceiro").prop('checked', false);
	}else if(parametro == 'produtos'){
		$("#checkproduto").attr('checked', true);
		$("#checkop").attr('checked', false);
		$("#checkfor").attr('checked', false);
	}else if(parametro == 'fornecedores'){
		$("#checkfor").attr('checked', true);
		$("#checkproduto").attr('checked', false);
		$("#checkop").attr('checked', false);
	}

	$('#checkproduto').on('click', function(){
		TrocaConsulta('prod');
	});
	
	$('#checkfor').on('click', function(){
		TrocaConsulta('for');
	});
	
	$('#checkop').on('click', function(){
		TrocaConsulta('op');
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
				$('#filterTipoOperacao').val('PEDIDO');
			}
			else{
				$('#filterTipoOperacao').val(' ');
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

/************* Inicio Seta de Ordenação da tabela *****************/
	$(".colunaES a.asc + div").addClass("seta-cima");
	$(".colunaES a.desc + div").addClass("seta-baixo");
	$(".colunaParcela a.asc + div").addClass("seta-cima");
	$(".colunaParcela a.desc + div").addClass("seta-baixo");
	
	var idcol = $(".colunaES a.asc , .colunaES a.desc").parent().attr('id');
	var idcol = $(".colunaParcela a.asc , .colunaParcela a.desc").parent().attr('id');
	$("td."+idcol).addClass("highlight");
	
	$(".setaOrdena a.asc + div").addClass("seta-cima");
	$(".setaOrdena a.desc + div").addClass("seta-baixo");
	
	var idcol = $(".setaOrdena a.asc , .setaOrdena a.desc").parent().attr('id');
	$("td."+idcol).addClass("highlight");

/*** Efeito Habilitado/Desabilitado de filtros ************************/
/*
	if($("#checkop").prop("checked")){
		$("#filtro-produto").css({"background-color":"#ebebeb","border-color":"#ccc"});
		$("#filtro-parceiro").css({"background-color":"#ebebeb","border-color":"#ccc"});
		
		$("#filtro-produto input[type=text]").prop('disabled', true);
		$("#filtro-produto .custom-combobox-input").prop('disabled', true);
		$("#filtro-produto select").prop('disabled', true);
		
		$("#filtro-produto").mouseenter(function() {
			$('#msgFiltroProduto').css('display','inherit');
		}).mouseleave(function() {
			$('#msgFiltroProduto').css('display','none');
		});
		
		$("#filtro-parceiro .custom-combobox-input").prop('disabled', true);
		$("#filtro-parceiro select").prop('disabled', true);
		
		$("#filtro-parceiro").mouseenter(function() {
			$('#msgFiltroParceiro').css('display','inherit');
		}).mouseleave(function() {
			$('#msgFiltroParceiro').css('display','none');
		});
		
	}else if($("#checkproduto").prop("checked")){
		$("#filtro-operacao").css({"background-color":"#ebebeb","border-color":"#ccc"});
		$("#filtro-parceiro").css({"background-color":"#ebebeb","border-color":"#ccc"});
		
		$("#QuicklinkNomeCOTACAO").prop('disabled', true);
		$("#QuicklinkNomePEDIDO").prop('disabled', true);
		$("#filtro-operacao input[type=text]").prop('disabled', true);
		$("#filtro-operacao select").prop('disabled', true);
		
		$("#filtro-operacao").mouseenter(function() {
			$('#msgFiltroOperacao').css('display','inherit');
		}).mouseleave(function() {
			$('#msgFiltroOperacao').css('display','none');
		});
		
		$("#filtro-parceiro .custom-combobox-input").prop('disabled', true);
		$("#filtro-parceiro select").prop('disabled', true);
		
		$("#filtro-parceiro").mouseenter(function() {
			$('#msgFiltroParceiro').css('display','inherit');
		}).mouseleave(function() {
			$('#msgFiltroParceiro').css('display','none');
		});
		
	}else if($("#checkfor").prop("checked")){
		$("#filtro-operacao").css({"background-color":"#ebebeb","border-color":"#ccc"});
		$("#filtro-produto").css({"background-color":"#ebebeb","border-color":"#ccc"});
	
		$("#QuicklinkNomeCOTACAO").prop('disabled', true);
		$("#QuicklinkNomePEDIDO").prop('disabled', true);
		$("#filtro-operacao input[type=text]").prop('disabled', true);
		$("#filtro-operacao select").prop('disabled', true);
		
		$("#filtro-operacao").mouseenter(function() {
			$('#msgFiltroOperacao').css('display','inherit');
		}).mouseleave(function() {
			$('#msgFiltroOperacao').css('display','none');
		});
		
		$("#filtro-produto input[type=text]").prop('disabled', true);
		$("#filtro-produto .custom-combobox-input").prop('disabled', true);
		$("#filtro-produto select").prop('disabled', true);
		
		$("#filtro-produto").mouseenter(function() {
			$('#msgFiltroProduto').css('display','inherit');
		}).mouseleave(function() {
			$('#msgFiltroProduto').css('display','none');
		});
	}
	*/
/** Placeholder Data **************************************************/
	$('.inputData').attr('placeholder','dd/mm/aaaa');
	
});
