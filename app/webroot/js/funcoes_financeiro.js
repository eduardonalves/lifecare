$(document).ready(function() {

    $(".ui-autocomplete-input").css({
		"border-bottom-right-radius": "4px",
		"border-top-right-radius":" 4px",
		"height":"17px"    
    });
    
    $("#filtro-produto .ui-widget").addClass("tamanho-medio");

/***Input text com datePicker Para datas no estilo " De X a Z**/	
    $(".inputSearchData input[id*='between']").before("<span>a</span>");
    
/*****************************Converte o formato das datas da consulta************************************************/
	datavencimentoInicio = $('#filterDataVencimento').val();
	
	if(datavencimentoInicio  != undefined){
		if(datavencimentoInicio !=''){
			iniano =  datavencimentoInicio.substr(0, 4);
			inimes = datavencimentoInicio.substr(5,2);
			inidia = datavencimentoInicio.substr(8,2);
			dataInicio =  inidia+'/'+inimes+'/'+iniano;
			$('#filterDataVencimento').val(dataInicio);
		}
	}
	
	datavencimentoFim = $('#filterDataVencimento-between').val();
	if(datavencimentoFim  != undefined){
		if(datavencimentoFim != ''){
			
			fimano =  datavencimentoFim.substr(0, 4);
			fimmes = datavencimentoFim.substr(5,2);
			fimdia = datavencimentoFim.substr(8,2);
			dataFim =  fimdia+'/'+fimmes+'/'+fimano;
			$('#filterDataVencimento-between').val(dataFim);
		}
	}
	
	datavencimentoInicio = $('#filterDataEmissao').val();
	
	if(datavencimentoInicio  != undefined){
		if(datavencimentoInicio !=''){
			iniano =  datavencimentoInicio.substr(0, 4);
			inimes = datavencimentoInicio.substr(5,2);
			inidia = datavencimentoInicio.substr(8,2);
			dataInicio =  inidia+'/'+inimes+'/'+iniano;
			$('#filterDataEmissao').val(dataInicio);
		}
	}
	
	datavencimentoFim = $('#filterDataEmissao-between').val();
	if(datavencimentoFim  != undefined){
		if(datavencimentoFim != ''){
			
			fimano =  datavencimentoFim.substr(0, 4);
			fimmes = datavencimentoFim.substr(5,2);
			fimdia = datavencimentoFim.substr(8,2);
			dataFim =  fimdia+'/'+fimmes+'/'+fimano;
			$('#filterDataEmissao-between').val(dataFim);
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
	
	$('#filterDataEmissao').mask('99/99/9999');
	$('#filterDataEmissao-between').mask('99/99/9999');
	
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
	
	$("#filterDataEmissao-between").focusout(function(){
		var data_final = $("#filterDataEmissao-between").val();
		var daysNota;

		daysNota = compararData("#filterDataEmissao"); 

		if(daysNota < 0){
			if(data_final != null){
				$("#filterDataEmissao, #filterDataEmissao-between").val("");
				$("#filterDataEmissao-between").addClass("shadow-vermelho");
				$('<span id="spanDataFinalEmi" class="DinamicaMsg Msg-tooltipAbaixo">A data Final não pode ser menor que a inicial</span>').insertAfter('input[id="filterDataEmissao-between"]');
			}
		}else{
			$("#filterDataEmissao-between").removeClass("shadow-vermelho");
		}		
	});
    
    $("#filterDataQuitacao-between").focusout(function(){
		var data_final = $("#filterDataQuitacao-between").val();
		var daysNota;

		daysNota = compararData("#filterDataQuitacao"); 

		if(daysNota < 0){
			if(data_final != null){
				$("#filterDataQuitacao, #filterDataQuitacao-between").val("");
				$(" #filterDataQuitacao-between").addClass("shadow-vermelho");
				$('<span id="spanDataFinalQui" class="DinamicaMsg Msg-tooltipAbaixo">A data Final não pode ser menor que a inicial</span>').insertAfter('input[id="filterDataEmissao-between"]');
			}
		}else{
			$("#filterDataQuitacao-between").removeClass("shadow-vermelho");
		}
    });
    
    $("#filterDataVencimento-between").focusout(function(){  
		var data_final = $("#filterDataVencimento-between").val();
		var daysNota;

		daysNota = compararData("#filterDataVencimento");

		if(daysNota < 0){
			if(data_final != null){
				$("#filterDataVencimento, #filterDataVencimento-between").val("");
				$("#filterDataVencimento-between").addClass("shadow-vermelho");
				$('<span id="spanDataFinalParc" class="DinamicaMsg Msg-tooltipDireita">A data Final não pode ser menor que a inicial</span>').insertAfter('input[id="filterDataEmissao-between"]');
			}
		}else{
			$("#filterDataVencimento-between").removeClass("shadow-vermelho");
		}
	});
    
    $("#filterValor-between").focusout(function(){
		var valor_inicial = $("#filterValor").val();
		var valor_final = $("#filterValor-between").val();

		if(valor_inicial > valor_final){
			$("#filterValor, #filterValor-between").val(' ');
			$("#filterValor, #filterValor-between").addClass("shadow-vermelho");
		}else{
			$("#filterValor, #filterValor-between").removeClass("shadow-vermelho");
		}
    });


/*** Validação de Datas Contas ****************************************/

    $('#ContasreceberDataEmissao,#dataVencimento-receber,#ContaspagarDataEmissao,#ContaspagarDataVencimento, #DadoscreditoValidadeLimite').addClass('validaDataContas');
    
    $(".validaDataContas").change(function(){
	    
	    var data_inicial = $("input[id*='DataEmissao']").datepicker('getDate');
	    var data_final = $("input[id*='Vencimento']").datepicker('getDate');
	    var daysNota = (data_final - data_inicial) / 1000 / 60 / 60 / 24;

	    if(daysNota < 0){
		if(data_final != null){
		    $("[id*='Vencimento']").val("");
		    $("input[id*='Vencimento']").addClass("shadow-vermelho");
		    $('<span id="spanDataFinalEmi" class="DinamicaMsg Msg-tooltipDireita">A data vencimento não pode ser menor que a emissão</span>').insertAfter('#ContaspagarDataVencimento');
		    $('<span id="spanDataFinalEmi" class="DinamicaMsg Msg-tooltipDireita">A data vencimento não pode ser menor que a emissão</span>').insertAfter('#dataVencimento-receber');
		}     
	    }else{
		$("#filterDataEmissao-between").removeClass("shadow-vermelho");
	    }			
    });
    
/***Input Search Para valores *****************************************/
    $(".inputSearchValor input[id*='between']").before("<span>a</span>").priceFormat({prefix: '',centsSeparator: ',',thousandsSeparator: '.'});


/******** Carregar filtro no select Quick link ***********************/
    $("#quick-select").change(function(){
	    var urlQuickLink = $(this).children('option:selected').attr('data-url')+'&ql='+$(this).children('option:selected').val();

	    $("#quick-editar").css("display", "none");
	    
	    if(urlQuickLink !='')
	    {
		window.location.href=urlQuickLink;
		$("#quick-select option").text($(this).children('option:selected').text());
	    }
    });

    $("#quick-filtrar").click(function(e){
	e.preventDefault();

	if($('#filterDataEmissao').val()!='' && $('#filterDataEmissao-between').val()==''){
	    $('#filterDataEmissao-between').addClass('shadow-vermelho').after('<span id="vazioDataEmissao" class="DinamicaMsg Msg-tooltipDireita">Preencha o campo para filtrar</span>');
	}else if($('#filterDataQuitacao').val()!='' && $('#filterDataQuitacao-between').val()==''){
	    $('#filterDataQuitacao-between').addClass('shadow-vermelho').after('<span id="vazioDataQuitacao" class="DinamicaMsg Msg-tooltipDireita">Preencha o campo para filtrar</span>');
	}else if($('#filterDataVencimento').val()!='' && $('#filterDataVencimento-between').val()==''){
	    $('#filterDataVencimento-between').addClass('shadow-vermelho').after('<span id="vazioDataVencimento" class="DinamicaMsg Msg-tooltipDireita">Preencha o campo para filtrar</span>');
	    
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
	
/************************ Salvar Quicklink******************************************/
    $("#bt-salvar-quicklink").click(function(event){
	event.preventDefault();
	
	nomequick = $('.nome-quicklink').val();
	
	if(nomequick  !=''){
		$("#formCadQuicklink").submit();
		$("#quick-select").val(nomequick);
		$('#quick-select').find('option[text="'+nomequick+'"]').val();
	}else{
		 $('#spanQuicklink').show();
	}
    });
    
/************************************ Limpa QuickLink *********************************/		
	$('input, select').on('focusin',function(){
	    $('#quick-select').val('');
	    $("#quick-editar").css("display", "none");
	   
	});


/********** Avançar tela de resultado Contas ****************/
    $('.bt-confirmar').click(function(e){
		e.preventDefault();

		var temclasvalbtconf = $('tr').hasClass('valbtconfimar');
		
		parceiro = $('.nomeParceiro').val();
		parceiroCpf = $('.cpfParceiro').val();

		
		if(parceiro ==''){
			$('#msgValidaParceiro').css('display','block');
			$('html, body').animate({scrollTop:0}, 'slow');
		}else if(!temclasvalbtconf){
			$('#msgValidaParcela').css('display','block');
			$('html, body').animate({scrollTop:0}, 'slow');
			
		}else{    	
			$('.tela-resultado, .tela-resultado-field').hide();
			$('.desabilita').attr({readonly:'readonly',onfocus:'this.blur()'}).addClass('borderZero').unbind();
			$('select[class*="desabilita"]').attr('disabled','disabled').css('display','none');
			$('.forma-data').attr('disabled','disabled');
			$('.ui-widget').attr('readonly','readonly').addClass('borderZero');
			$("[class*='ui-button']").css('display','none');
			$('html, body').animate({scrollTop:0}, 'slow');
			$('.bt-salvarConta').show();
			$('.bt-voltar').show();
			$('.bt-confirmar').hide();
			$('table td:nth-last-child(1), th:nth-last-child(1)').hide();

			//percorre as select e transforma em input
			$('select[class*="desabilita"]').each(function(){
			valorSelecionado = $(this).find('option:selected').text();
			id=$(this).attr('id');

			name=$(this).attr('name');
				
			//insere input depois do select
			$('<input id="'+id+'"" name="'+name+'" class="tamanho-medio borderZero" readonly="readonly" onfocus="this.blur()" value="'+valorSelecionado+'">').insertAfter($(this));
			});

			//substitui textarea por span
			valTextArea= $('textarea[id*="Descricao"]').val();

			$('.textAreaConta').hide();
			$('<span id="spanTextArea">'+valTextArea+'</span>').insertAfter('.textAreaConta');

			$('.forma-data').each(function(){
			valorFormaData=$(this).val();
			id=$(this).attr('id');

			name=$(this).attr('name');

			$('<input id="'+id+'" name="'+name+'" type="hidden" value="'+valorFormaData+'"/>').insertAfter($(this));
			});
		}    

    });
    
/********** Voltar tela de resultado Contas ****************/
    $('.bt-voltar').click(function(){
		$('.desabilita').removeAttr('readonly').removeAttr('onfocus').removeClass('borderZero');
		$('select[class*="desabilita"]').removeAttr('disabled','disabled').css('display','block');
		$('.forma-data').removeAttr('disabled','disabled')
		$('select[class*="desabilita"] + input ').remove();
		$('#spanTextArea').remove();
		$('.textAreaConta').show();
		$('.ui-widget').removeAttr('readonly','readonly').removeClass('borderZero');
		$("[class*='ui-button']").css('display','inherit');
		$('html, body').animate({scrollTop:0}, 'slow');
		$('.bt-salvarConta').hide();
		$('.bt-voltar').hide();
		$('.bt-confirmar').show();
		$('table td:nth-last-child(1), th:nth-last-child(1)').show();
		$('input').removeAttr('required');

	tipo_pagamento = $('#Pagamento0TipoPagamento').val();
	if(tipo_pagamento != 'CLIENTE'){
	    $('.tela-resultado-field').show();
	    $('.tela-resultado').show();
	}
    });

/*********************Checkbox A Pagar e a Receber***********************/
   
   	var valorAux= $('#filterTipoMovimentacao').val();
   	
	if(valorAux  != undefined){

		var valorEntrada=valorAux.substr(0,7);
		var valorSaida1=valorAux.substr(0,5);
		var valorSaida2 =valorAux.substr(8,5);
	}

	var statusEntrada = '';
	var statusSaida= '';
	var statusEntradaSaida='';
	

	if(valorEntrada =='RECEBER'){
		$('#NomeREECEBER').attr('checked', true);
	}
	
	if(valorSaida1 == 'PAGAR'){
		$('#NomePAGAR').attr('checked', true);
	}
	
	if(valorSaida2 == 'PAGAR'){
		$('#NomePAGAR').attr('checked', true);
	}
	$("#NomeREECEBER, #NomePAGAR").bind('click', function(){
		if($('#NomeREECEBER').is(':checked')){
			if($('#NomePAGAR').is(':checked')){
				$('#filterTipoMovimentacao').val('RECEBER PAGAR');
			}else{
				$('#filterTipoMovimentacao').val('RECEBER');
			}
		}else{
			if($('#NomePAGAR').is(':checked')){
				$('#filterTipoMovimentacao').val('PAGAR');
			}else{
				$('#filterTipoMovimentacao').val(' ');
			}
		}

	});

/*** Validar CPF ******************************************************/
    $("#cpf_cnpj").on("keypress",function(event){		
		var charCode = event.keyCode || event.which;

		if((charCode==8) || (charCode==9) || (charCode==37) || (charCode==39) || (charCode==46)){return true}
		if (!((charCode>47)&&(charCode<58))){return false;}
    });

    $('#inputcpf, #inputcnpj').attr("enabled","enabled");

    $('#inputcpf, #inputcnpj').click(function(){
	$("#cpf_cnpj").val('');

	valorCpfCnpj = $(this).attr('id'); 

	if(valorCpfCnpj == 'inputcpf'){
		$("#cpf_cnpj").removeAttr("disabled");
		$("#cpf_cnpj").css("background-color","#FFFFFF;");
		$("#cpf_cnpj").mask("999.999.999-99");//cpf
	}else{
		$("#cpf_cnpj").removeAttr("disabled");
		$("#cpf_cnpj").css("background-color","#FFFFFF;");
		$("#cpf_cnpj").mask("99.999.999/9999-99");//cnpj
	}
    });
    
/******************** Botão Upload *********************************/

    $('#doc_file').change(function(){
	arquivo = $('#doc_file').val();
	$('input[id="valorUpload"]').attr('value',"");
	
	if (navigator.userAgent.indexOf("Firefox") != -1){
	    $('input[id="valorUpload"]').attr('value',arquivo);
	}else if(navigator.userAgent.indexOf("AppleWebKit") != -1 || navigator.userAgent.indexOf("WebKit") != -1 ){
	    arquivoAux=arquivo.split('\\')[2];
	    $('input[id="valorUpload"]').attr('value',arquivoAux);
	}else if (navigator.userAgent.indexOf("MSIE") != -1){
	    $('input[id="valorUpload"]').attr('value',arquivo);	    
	}
	
    });

    $('input[id="valorUpload"]').on('focusout',function(){
	if($(this).val==''){
	    $('input[id="valorUpload"]').attr('value','');
	    $('input[id="doc_file"]').attr('value','');
	    
	}
    });

    $('.clickValor').mousedown(function(){
	return false;
    });

/******************** Mensagem extensão *********************************/
    $( "#valorUpload, #bt-buscar" ).hover(function(){
	    $(this).after('<span id="msgExtensoes" class="DinamicaMsg Msg-tooltipAbaixo">Extensões válidas: png, jpeg e jpg.<br/>Tamanho máximo permitido 2mb.<br/>Resolução mímima 700px x 700px.<br/>Resolução máxima 2200px x 2200px.</span>');
	},function(){
	  //  $('#msgExtensoes').remove();
	}
    );

    $( ".upload-fgv" ).hover(function(){
	    $(this).after('<span id="msgExtensoes" class="DinamicaMsg Msg-tooltipAbaixo" style="top: 150px;">Extensões válidas: xls.<br/>Tamanho máximo permitido 2mb.</span>');
	},function(){
	  //  $('#msgExtensoes').remove();
	}
    );

/****************** Mascara Data *************************/
    $('input[id*=Data],input[id*=data]').mask('99/99/9999');

/**************************Autocomplete consulta************************************/
    $( "#filterNome" ).combobox();

    i=0;

/********** substituir textarea Cobranca *********/    
    $('textarea').each(function(){
		valTextArea= $('#ObsCobranca'+i+'Obs').text();
		$('#ObsCobranca'+i+'Obs').hide();
		$('<span id="spanTextArea">'+valTextArea+'</span>').insertAfter('#ObsCobranca'+i+'Obs');
		i++;
    });

/*************** Negociação *********************/
    $('#negociacao').click(function(){
		contId=0;
		$('.checkClasse').each(function(){
			$('[id*="parcelasids"]').remove();
			if(this.checked) {
			parcelaId=$(this).attr('data-parcelaid');

			$('.fieldset').append('<input name="data[parcelasids]['+contId+'] step="any"  id="parcelasids'+contId+'parcelasids" value="'+parcelaId+'" type="hidden">');
			}
		});
    });

    $('.close').click(function(){
		$('[id*="parcelasids"]').remove();
    });


    $('.checkClasse').click(function(){
		var contCheck=0;
		
		$('.checkClasse').each(function(){
			if(this.checked) {
				contCheck =1;
			}
		});

		if(contCheck ==0) {
			$('#bt-negociacaoDesabilitado').show();
			$('#negociacao').hide();
		}else{
			$('#negociacao').show();
			$('#bt-negociacaoDesabilitado').hide();
		}
    });



    $( "#bt-negociacaoDesabilitado" ).hover(function(){
		$(this).after('<span id="msgNegociacaoDesabilitada" class="DinamicaMsg Msg-tooltipEsquerda">Escolha ao menos uma parcela para negociar.</span>');
    },function(){
		$('#msgNegociacaoDesabilitada').remove();
    });

});

/************************ Editar Obs ******************************************/
    $("#bt-editar-obs").click(function(event){
	event.preventDefault();

		$("#modal_editObs").submit();
    });
