$(document).ready(function() {

/***Input text com datePicker Para datas no estilo " De X a Z**/	
    $(".inputSearchData input[id*='between']").before("<span>a</span>");
    
    $(".inputSearchData input[type='text']").datepicker({
	    dateFormat: 'dd/mm/yy',
	    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
	    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
	    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
	    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
	    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
	    nextText: 'Próximo',
	    prevText: 'Anterior'
    });
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


/*** Validação de Datas Consultas ****************************************/

    $("[id*='filterData']").addClass('validaConFinan');
    
    $(".validaConFinan").change(function(){
	    
	    var data_inicial = $("#filterDataEmissao").datepicker('getDate');
	    var data_final = $("#filterDataEmissao-between").datepicker('getDate');
	    
	    //var Compara01 = parseInt(data_inicial.split("/")[2].toString() + data_inicial.split("/")[1].toString() + data_inicial.split("/")[0].toString());
	    //var Compara02 = parseInt(data_final.split("/")[2].toString() + data_final.split("/")[1].toString() + data_final.split("/")[0].toString());

	    var daysNota = (data_final - data_inicial) / 1000 / 60 / 60 / 24;
	    
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
    
    
    $(".validaConFinan").change(function(){
	    
	    var data_inicial = $("#filterDataQuitacao").datepicker('getDate');
	    var data_final = $("#filterDataQuitacao-between").datepicker('getDate');
	    
	    //var Compara01 = parseInt(data_inicial.split("/")[2].toString() + data_inicial.split("/")[1].toString() + data_inicial.split("/")[0].toString());
	    //var Compara02 = parseInt(data_final.split("/")[2].toString() + data_final.split("/")[1].toString() + data_final.split("/")[0].toString());

	    var daysNota = (data_final - data_inicial) / 1000 / 60 / 60 / 24;
	    
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
    
    $(".validaConFinan").change(function(){
	    
	    var data_inicial = $("#filterDataVencimento").datepicker('getDate');
	    var data_final = $("#filterDataVencimento-between").datepicker('getDate');
	    
	    //var Compara01 = parseInt(data_inicial.split("/")[2].toString() + data_inicial.split("/")[1].toString() + data_inicial.split("/")[0].toString());
	    //var Compara02 = parseInt(data_final.split("/")[2].toString() + data_final.split("/")[1].toString() + data_final.split("/")[0].toString());

	    var daysNota = (data_final - data_inicial) / 1000 / 60 / 60 / 24;
	    
	    if(daysNota < 0){
		if(data_final != null){ 
		    $("#filterDataVencimento, #filterDataVencimento-between").val("");
		    $("#filterDataVencimento-between").addClass("shadow-vermelho");
		    $('<span id="spanDataFinalParc" class="DinamicaMsg Msg-tooltipAbaixo">A data Final não pode ser menor que a inicial</span>').insertAfter('input[id="filterDataEmissao-between"]');
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

    $('#ContasreceberDataEmissao,#dataVencimento-receber,#ContaspagarDataEmissao,#ContaspagarDataVencimento').addClass('validaDataContas');
    
    $(".validaDataContas").change(function(){
	    
	    var data_inicial = $("input[id*='DataEmissao']").datepicker('getDate');
	    var data_final = $("input[id*='Vencimento']").datepicker('getDate');
	    
	    //var Compara01 = parseInt(data_inicial.split("/")[2].toString() + data_inicial.split("/")[1].toString() + data_inicial.split("/")[0].toString());
	    //var Compara02 = parseInt(data_final.split("/")[2].toString() + data_final.split("/")[1].toString() + data_final.split("/")[0].toString());

	    var daysNota = (data_final - data_inicial) / 1000 / 60 / 60 / 24;

	    if(daysNota < 0){
		if(data_final != null){
		    $("[id*='Vencimento']").val("");
		    $("input[id*='Vencimento']").addClass("shadow-vermelho");
		    $('<span id="spanDataFinalEmi" class="DinamicaMsg Msg-tooltipDireita">A data vencimento não pode ser menor que a emissão</span>').insertAfter('input[id*="Vencimento"]');
		}     
	    }else{
		$("#filterDataEmissao-between").removeClass("shadow-vermelho");
	    }			
    });
    
/***Input Search Para valores *****************************************/
    $(".inputSearchValor input[id*='between']").before("<span>a</span>").priceFormat({
										prefix: '',
										centsSeparator: ',',
										thousandsSeparator: '.'
	});



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
	
	//alert($("#quick-select option:selected").val());

	//$("#quick-filtrar").click(function(){
	  
	 ///* 
		//var urlQuickLink = $(this).children('option:selected').attr('data-url').val();

		//$("#quick-editar").css("display", "none");
		
		//if(urlQuickLink!='')
		//{
		    //window.location.href=urlQuickLink;
		//}
	//*/
	//});
/********** Avançar tela de resultado Contas ****************/


    $('.bt-confirmar').click(function(e){
	e.preventDefault();

	var temclasvalbtconf = $('tr').hasClass('valbtconfimar');
	dataEmissao = $('[id*="DataEmissao"]').val();
	CpfCnpj = $('[id*="CpfCnpj"]').val();
	
	if(dataEmissao == ''){
	   // $('<span id="msgDataEmissao" class="Msg-tooltipDireita">Preencha o campo Data de Emissão</span>').insertAfter('[id*="DataEmissao"]');
	    $('#msgDataEmissao').css('display','block');
	    $('[id*="DataEmissao"]').addClass('shadow-vermelho').focus();
	    $('html, body').animate({scrollTop:0}, 'slow');
	    
	}else if(CpfCnpj ==''){
	   // $('<span id="msgAutoComplete" class="Msg tooltipMensagemErroTopo">Preencha o campo Fornecedor</span>').insertAfter('.ui-widget');
	    $('#msgAutoComplete').css('display','block');
	    $('.ui-autocomplete-input').addClass('shadow-vermelho').focus();
	    $('html, body').animate({scrollTop:0}, 'slow');
	    
	}else if(!temclasvalbtconf){
	  //  $('<span id="msgCpfCnpj" class="Msg-tooltipDireita">Adicione parcelas a tabela</span>').insertAfter('.bt-direita');
	    $('#msgCpfCnpj').css('display','block');
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
	}
    });
/****************** Marca em vermelho o campo ***********/
    $('[class*="obrigatorio"]').focusin(function(){
	$(this).attr('required','required');
	
    }).focusout(function(){
	if($(this).val()==''){
	    $(this).removeAttr('required','required');
	}
    });

    $('[class*="autocomplete"]').click(function(){
	$('.contas .ui-widget').attr('required',true);
	
    }).focusout(function(){
	if($('input[class*="ui-widget"]').val()==''){
	    $('.ui-widget').removeAttr('required');
	    
	}
    });

    $('input').focusin(function(){
	valrInput=$('input').val();
	if(valrInput!=''){
	    $('input').removeClass('shadow-vermelho');
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
    //$("#filterCpfCnpj").mask("99.999.999/9999-99");

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

/******************** Mensagem extensão *********************************/
    $( "#valorUpload, #bt-buscar" ).hover(function(){
	    $(this).after('<span id="msgExtensoes" class="DinamicaMsg Msg-tooltipAbaixo">Extensões válidas: png, jpeg e jpg.<br/>Tamanho máximo permitido 2mb.<br/>Resolução mímima 700px x 700px.<br/>Resolução máxima 2200px x 2200px.</span>');
	},function(){
	    $('#msgExtensoes').remove();
	}
    );


/****************** Mascara Data *************************/

    $('input[id*=Data],input[id*=data]').mask('99/99/9999');
    
    /**************************Autocomplete consulta************************************/
  $( "#filterNome" ).combobox();

 });
