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
			
			$('#bt-expandirOperacao').css('top','260px');
			$('.btVenda').css('top','175px');
			
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

	dataEntrega = $('#filterDataEntrega').attr('value');
	if(dataEntrega != undefined){
		if(dataEntrega !=''){
			iniano = dataEntrega.substr(0, 4);
			inimes = dataEntrega.substr(5,2);
			inidia = dataEntrega.substr(8,2);
			dataEntrega = inidia+'/'+inimes+'/'+iniano;
			$('#filterDataEntrega').val(dataEntrega);
		}
	}

	dataEntregabetween = $('#filterDataEntrega-between').attr('value');
	if(dataEntregabetween != undefined){
		if(dataEntregabetween != ''){
			fimano = dataEntregabetween.substr(0, 4);
			fimmes = dataEntregabetween.substr(5,2);
			fimdia = dataEntregabetween.substr(8,2);
			dataEntregabetween = fimdia+'/'+fimmes+'/'+fimano;
			$('#filterDataEntrega-between').val(dataEntregabetween);
		}
	}
	
	// Não sei porquê, mas essa parte funciona normalmente sem converter. Provavelmente está definido em outro arquivo.
	
	//~ dataRecebimento = $('#filterRecebimento').attr('value');
	//~ if(dataRecebimento != undefined){
		//~ if(dataRecebimento !=''){
			//~ iniano = dataRecebimento.substr(0, 4);
			//~ inimes = dataRecebimento.substr(5,2);
			//~ inidia = dataRecebimento.substr(8,2);
			//~ dataRecebimento = inidia+'/'+inimes+'/'+iniano;
			//~ $('#filterRecebimento').val(dataRecebimento);
		//~ }
	//~ }

	dataRecebimentobetween = $('#filterRecebimento-between').attr('value');
	if(dataRecebimentobetween != undefined){
		if(dataRecebimentobetween != ''){
			fimano = dataRecebimentobetween.substr(0, 4);
			fimmes = dataRecebimentobetween.substr(5,2);
			fimdia = dataRecebimentobetween.substr(8,2);
			dataRecebimentobetween = fimdia+'/'+fimmes+'/'+fimano;
			$('#filterRecebimento-between').val(dataRecebimentobetween);
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
		}else if($('#filterRecebimento').val()!='' && $('#filterRecebimento-between').val()==''){
			$('#filterRecebimento-between').addClass('shadow-vermelho').after('<span id="vazioDataFim" class="DinamicaMsg Msg-tooltipDireita">Preencha o campo para filtrar</span>');
		}else if($('#filterDataEntrega').val()!='' && $('#filterDataEntrega-between').val()==''){
			$('#filterDataEntrega-between').addClass('shadow-vermelho').after('<span id="vazioDataFim" class="DinamicaMsg Msg-tooltipDireita">Preencha o campo para filtrar</span>');
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

/*** INICIO SETA DE ORDENAÇÃO DA TABELA *******************************/

	$(".colunaES a.asc + div, .colunaParcela a.asc + div, .colunaConta a.asc + div").addClass("seta-cima");
	$(".colunaES a.asc + div, .colunaParcela a.asc + div, .colunaConta a.desc + div").addClass("seta-baixo");

	var idcol = $(".colunaES a.asc, .colunaParcela a.asc, .colunaConta a.asc ,  .colunaES a.desc, .colunaParcela a.desc, .colunaConta a.desc").parent().attr('id');

	$("td."+idcol).addClass("highlight");
	
	$(".setaOrdena a.asc + div").addClass("seta-cima");
	$(".setaOrdena a.desc + div").addClass("seta-baixo");
	
	var idcol = $(".setaOrdena a.asc ,  .setaOrdena a.desc").parent().attr('id');
	$("td."+idcol).addClass("highlight");	

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
	
	$('#filterRecebimento').addClass('inputData');
	$('#filterRecebimento-between').addClass('inputData');
	$('#filterDataEntrega').addClass('inputData');
	$('#filterDataEntrega-between').addClass('inputData');
	

/** Placeholder Data **************************************************/

	$('.inputData').attr('placeholder','dd/mm/aaaa');
	$('.inputData').mask('99/99/9999');
	
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
	
	
/** Ajuste de input ***************************************************/
	$('.custom-combobox-input').addClass("tamanho-medio");
  
/** FUNÇÕES ASSOCIAR PARCEIRO AO PRODUTO MODAL TABELA PRODUTOS ***************************************************/
	var cont_fornecedor = 0; //Contador de fonecedores adicionado
	var existente = 0;	//Verificação para evitar repetição de fornecedor
	$('body').on('click','.associaFornecedor',function(){
		id = $(this).attr('id');
		nId = id.substring(12);
		
		if(!$('#ass_fornecedor'+nId).val()){
			alert('Por favor, selecione um fornecedor.');
		}else{
			
			parc_nome = $('#ass_fornecedor'+nId+' option:selected').attr('id');
			
			$('.adicionados'+nId).each(function(){
				if($(this).text() == parc_nome){
					existente++;
				}
			});
			
			if(existente != 0){
				alert('Esse fornecedor já foi adicionado à tabela!');
				existente = 0;
			}else{	
				
				parc_cpf = $('#ass_fornecedor'+nId+' option:selected').attr('class');
				parc_status = $('#ass_fornecedor'+nId+' option:selected').attr('rel');
				parc_id = $('#ass_fornecedor'+nId+' option:selected').val();
				prod_id = $('#idProd'+nId).val();
				
				if(!parc_status){
					status = '--';
				}else{
					status = "<img src='/lifecare/img/semaforo-"+parc_status.toLowerCase()+"-12x12.png'/>";
				}
				
				//Adiciona na Tabela do Modal
				$('#tbl_associa'+nId+' tbody').prepend(
					"<tr id='linhaAssocia"+cont_fornecedor+"'>"+
						"<td class='adicionados"+nId+"'>"+parc_nome+"</td>"+
						"<td>"+parc_cpf+"</td>"+
						"<td>"+ status +"</td>"+
						"<td><img title='Remover' alt='Remover' src='/lifecare/img/lixeira.png' id='excluirF_"+nId+"' data-hide='"+cont_fornecedor+"' class='bt-removeForne'/>  </td>"+
					"</tr>"	
				);
				
				//Adiciona a input hidden para salvar
				$('#formAssocia'+nId).append(
					"<div id='hiddenAssocia"+cont_fornecedor+"'><input name='data[ProdutosParceirodenegocio]["+cont_fornecedor+"][produto_id]' type='hidden' value='"+prod_id+"'/>"+
					"<input name='data[ProdutosParceirodenegocio]["+cont_fornecedor+"][parceirodenegocio_id]' type='hidden' value='"+parc_id+"' /></div>"
				);
								
				cont_fornecedor++;
				existente = 0;
				$('#ass_fornecedor'+nId).val('');
				$('#bt-salvarAssociar'+nId).show();
			}
		}
	});
	
	//REMOVE O FORNECEDOR DA LISTA DO PRODUTO
	$('body').on('click','.bt-removeForne',function(){
		id = $(this).attr('id');
		nId = id.substring(9);
		hide = $(this).attr('data-hide');
	
		$('#tbl_associa'+nId+' #linhaAssocia'+hide).remove();
		$('#formAssocia'+nId+' #hiddenAssocia'+hide).remove();
		cont_fornecedor--;
		
		if(cont_fornecedor == 0){
			$('#bt-salvarAssociar'+nId).hide();
		}		
	});
	
	//SUBMITA O FORMULARIO QUE FAZ A ASSOCIAÇÃO
	$('.associSalvar').click(function(){
		id = $(this).attr('id');
		nId = id.substring(17);
		
		$('#formAssocia'+nId).submit();
		
	});
	
	//CAPTURA A ID DO PRODUTO PARA ADICIONAR UM NOVO FORNECEDOR ASSOCIADO
	$('body').on('click','.addNovoParceiro',function(){
		id = $(this).attr('id');
		nId = id.substring(7);
		
		id_prod_novo = $('#idProdAdd'+nId).val();
		
		//SETA O VALOR PARA DENTRO DO MODAL
		$('#idProdutoLinha').val(id_prod_novo);
		
	});
	
	
});
